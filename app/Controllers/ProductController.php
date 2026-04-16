<?php
namespace App\Controllers;
use App\Models\ProductModel;
use CodeIgniter\Controller;

class ProductController extends Controller {
    private function checkAuth() {
        if (!session()->get('isLoggedIn')) return false; return true;
    }

    public function index() {
        if (!$this->checkAuth()) return redirect()->to('/login');
        $model = new ProductModel();
        $data['products'] = $model->findAll();
        return view('store/products', $data);
    }

    public function store() {
        if (!$this->checkAuth()) return redirect()->to('/login');
        $model = new ProductModel();
        $model->save([
            'name'  => $this->request->getVar('name'),
            'price' => $this->request->getVar('price'),
            'stock' => $this->request->getVar('stock'),
        ]);
        return redirect()->to('/products')->with('success', 'Product added successfully!');
    }

    public function delete($id) {
        if (!$this->checkAuth()) return redirect()->to('/login');
        $model = new ProductModel();
        $model->delete($id);
        return redirect()->to('/products')->with('success', 'Product deleted!');
    }
}