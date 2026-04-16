<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\SaleModel;
use App\Models\CashFlowModel;
use CodeIgniter\Controller;

class StoreController extends Controller
{
    /**
     * Manual Security Check
     */
    private function checkAuth()
    {
        if (!session()->get('isLoggedIn')) {
            session()->setFlashdata('msg', 'Please login to access the store system.');
            return false;
        }
        return true;
    }

    /**
     * --- SALES (POS) ---
     * Displaying performance stats and inventory status
     */
    public function sales()
    {
        if (!$this->checkAuth()) return redirect()->to('/login');

        $prodModel = new ProductModel();
        $db = \Config\Database::connect();

        // 1. Fetch Today's Date
        $today = date('Y-m-d');

        // 2. Performance Stats: Today's Revenue
        $data['today_revenue'] = $db->table('sales')
            ->selectSum('total_price')
            ->where('DATE(created_at)', $today)
            ->get()->getRow()->total_price ?? 0;

        // 3. Performance Stats: Today's Items Sold Count
        $data['today_items_sold'] = $db->table('sales')
            ->selectSum('quantity')
            ->where('DATE(created_at)', $today)
            ->get()->getRow()->quantity ?? 0;

        // 4. Products available for sale (Stock > 0)
        $data['available_products'] = $prodModel->where('stock >', 0)->findAll();

        // 5. All products for the "Real-Time Inventory Status" list
        $data['all_products'] = $prodModel->orderBy('stock', 'ASC')->findAll();

        // 6. Recent Sales History (Joined with products to get names)
        $data['sales_history'] = $db->table('sales')
            ->select('sales.*, products.name as product_name')
            ->join('products', 'products.id = sales.product_id')
            ->orderBy('sales.id', 'DESC')
            ->limit(10)
            ->get()->getResultArray();

        return view('store/sales', $data);
    }

    /**
     * Process Sale with Auto Stock Update & Cash Entry
     */
    public function storeSale()
    {
        if (!$this->checkAuth()) return redirect()->to('/login');

        $prodModel = new ProductModel();
        $saleModel = new SaleModel();
        $cashModel = new CashFlowModel();

        $productId = $this->request->getVar('product_id');
        $qty = (int)$this->request->getVar('quantity');

        // Validation
        if (empty($productId) || $qty <= 0) {
            return redirect()->to('/sales')->with('error', 'Please select a product and valid quantity.');
        }

        $product = $prodModel->find($productId);

        // Check if stock is sufficient
        if (!$product || $product['stock'] < $qty) {
            return redirect()->to('/sales')->with('error', 'Insufficient stock for ' . ($product['name'] ?? 'item'));
        }

        $totalPrice = $product['price'] * $qty;

        // --- DATABASE TRANSACTION START ---
        // This ensures that if any part fails, the whole process rolls back
        $db = \Config\Database::connect();
        $db->transStart();

        // 1. Save Sale Record
        $saleModel->save([
            'product_id'  => $productId,
            'quantity'    => $qty,
            'total_price' => $totalPrice
        ]);

        // 2. Update Product Stock (Deduct)
        $prodModel->update($productId, [
            'stock' => $product['stock'] - $qty
        ]);

        // 3. Auto Cash In Entry
        $cashModel->save([
            'type'        => 'in',
            'amount'      => $totalPrice,
            'description' => "POS Sale: {$product['name']} (x{$qty})"
        ]);

        $db->transComplete();
        // --- DATABASE TRANSACTION END ---

        if ($db->transStatus() === FALSE) {
            return redirect()->to('/sales')->with('error', 'Transaction Failed. Please try again.');
        }

        return redirect()->to('/sales')->with('success', "Sale successful! Sold $qty x {$product['name']}.");
    }

    /**
     * --- CASH IN / OUT ---
     */
    public function cash()
    {
        if (!$this->checkAuth()) return redirect()->to('/login');
        $cashModel = new CashFlowModel();
        $data['cash_flows'] = $cashModel->orderBy('id', 'DESC')->findAll();
        return view('store/cash', $data);
    }

    public function storeCash()
    {
        if (!$this->checkAuth()) return redirect()->to('/login');

        $cashModel = new CashFlowModel();
        $cashModel->save([
            'type'        => $this->request->getVar('type'),
            'amount'      => $this->request->getVar('amount'),
            'description' => $this->request->getVar('description')
        ]);

        return redirect()->to('/cash')->with('success', 'Cash transaction recorded successfully!');
    }

    /**
     * --- FINANCIAL REPORTS ---
     */
    public function reports()
    {
        if (!$this->checkAuth()) return redirect()->to('/login');
        
        $db = \Config\Database::connect();

        // Total Lifetime Sales Revenue
        $data['total_sales'] = $db->table('sales')
            ->selectSum('total_price')
            ->get()->getRow()->total_price ?? 0;

        // Total Cash In (Sales + Manual In)
        $cashIn = $db->table('cash_flows')
            ->selectSum('amount')
            ->where('type', 'in')
            ->get()->getRow()->amount ?? 0;

        // Total Cash Out (Expenses)
        $cashOut = $db->table('cash_flows')
            ->selectSum('amount')
            ->where('type', 'out')
            ->get()->getRow()->amount ?? 0;

        // Final Balance
        $data['net_cash'] = $cashIn - $cashOut;

        return view('store/reports', $data);
    }
}