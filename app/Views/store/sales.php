<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Darcy Store - Premium POS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-gray-50 text-gray-800 flex h-screen overflow-hidden">

    <!-- Include the Sidebar -->
    <?= $this->include('theme/sidebar') ?>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-screen overflow-y-auto">
        
        <!-- Header -->
        <header class="h-20 bg-white shadow-sm flex items-center justify-between px-8 flex-shrink-0 border-b border-gray-100 z-10">
            <div class="flex items-center gap-2">
                <div class="w-2 h-6 bg-blue-600 rounded-full"></div>
                <h2 class="text-xl font-bold text-gray-700">Point of Sale</h2>
            </div>
            <div class="flex items-center gap-4">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-widest"><?= date('l, d M Y') ?></span>
                <div class="h-8 w-px bg-gray-200"></div>
                <span class="text-sm font-medium text-blue-600 bg-blue-50 px-3 py-1 rounded-lg">Darcy Store Official</span>
            </div>
        </header>

        <div class="p-8">
            
            <!-- 1. DAILY PERFORMANCE CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-3xl p-6 text-white shadow-lg shadow-green-100">
                    <p class="text-green-100 text-xs font-bold uppercase tracking-wider mb-1">Today's Revenue</p>
                    <h3 class="text-3xl font-bold">$<?= number_format($today_revenue, 2) ?></h3>
                </div>
                
                <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-3xl p-6 text-white shadow-lg shadow-blue-100">
                    <p class="text-blue-100 text-xs font-bold uppercase tracking-wider mb-1">Items Sold Today</p>
                    <h3 class="text-3xl font-bold"><?= number_format($today_items_sold) ?> <span class="text-sm font-normal opacity-80">pcs</span></h3>
                </div>

                <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-xs font-bold uppercase tracking-wider mb-1">Store Status</p>
                        <h3 class="text-xl font-bold text-green-500 flex items-center gap-2">
                            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span> Open
                        </h3>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm">
                    <p class="text-gray-400 text-xs font-bold uppercase tracking-wider mb-1">POS Version</p>
                    <h3 class="text-xl font-bold text-gray-700">2.0 Premium</h3>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- 2. TRANSACTION FORM (LEFT) -->
                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-gray-100">
                        <h3 class="text-lg font-bold text-gray-800 mb-6">New Transaction</h3>
                        
                        <?php if(session()->getFlashdata('error')): ?>
                            <div class="bg-red-50 text-red-600 p-4 rounded-2xl mb-6 text-sm flex items-center gap-3 border border-red-100">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        <?php endif; ?>

                        <?php if(session()->getFlashdata('success')): ?>
                            <div class="bg-green-50 text-green-600 p-4 rounded-2xl mb-6 text-sm flex items-center gap-3 border border-green-100">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        <?php endif; ?>

                        <form action="/sales/store" method="post" class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <div class="md:col-span-3">
                                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 block ml-1">Product Selection</label>
                                    <select name="product_id" required class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition appearance-none">
                                        <option value="">Choose item...</option>
                                        <?php foreach($available_products as $p): ?>
                                            <option value="<?= $p['id'] ?>">
                                                <?= $p['name'] ?> — $<?= number_format($p['price'], 2) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div>
                                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 block ml-1">Quantity</label>
                                    <input type="number" name="quantity" value="1" min="1" required class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition">
                                </div>
                            </div>
                            <button type="submit" class="w-full py-5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-2xl shadow-xl shadow-blue-100 transition-all active:scale-[0.98] flex items-center justify-center gap-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                Process checkout
                            </button>
                        </form>
                    </div>

                    <!-- RECENT HISTORY TABLE -->
                    <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden">
                        <div class="p-6 border-b border-gray-50 flex justify-between items-center">
                            <h3 class="font-bold text-gray-700">Recent Transactions</h3>
                            <span class="px-3 py-1 bg-gray-100 text-gray-500 text-[10px] font-bold rounded-full uppercase tracking-tighter">Live Feed</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead class="bg-gray-50 text-gray-400 text-[10px] uppercase tracking-widest">
                                    <tr>
                                        <th class="p-5">Product Name</th>
                                        <th class="p-5 text-center">Qty</th>
                                        <th class="p-5">Total Sum</th>
                                        <th class="p-5">Time</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50">
                                    <?php foreach($sales_history as $s): ?>
                                    <tr class="hover:bg-blue-50/30 transition group">
                                        <td class="p-5">
                                            <p class="font-bold text-gray-700 group-hover:text-blue-600 transition"><?= $s['product_name'] ?></p>
                                        </td>
                                        <td class="p-5 text-center">
                                            <span class="px-2 py-1 bg-gray-100 rounded-lg text-xs font-bold text-gray-600"><?= $s['quantity'] ?></span>
                                        </td>
                                        <td class="p-5">
                                            <p class="font-bold text-green-600">$<?= number_format($s['total_price'], 2) ?></p>
                                        </td>
                                        <td class="p-5">
                                            <p class="text-gray-400 text-xs"><?= date('h:i A', strtotime($s['created_at'])) ?></p>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- 3. REAL-TIME STOCK STATUS SIDEBAR (RIGHT) -->
                <div class="space-y-6">
                    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="font-bold text-gray-800">Inventory Status</h3>
                            <a href="/products" class="text-[10px] font-bold text-blue-500 hover:underline uppercase">Edit All</a>
                        </div>
                        
                        <div class="space-y-4 max-h-[600px] overflow-y-auto pr-2 custom-scrollbar">
                            <?php foreach($all_products as $p): ?>
                                <div class="p-4 rounded-2xl border border-gray-50 hover:border-blue-100 hover:bg-blue-50/20 transition group">
                                    <div class="flex justify-between items-start mb-2">
                                        <div class="max-w-[120px]">
                                            <p class="font-bold text-sm text-gray-700 truncate"><?= $p['name'] ?></p>
                                            <p class="text-[10px] text-gray-400">$<?= number_format($p['price'], 2) ?> / unit</p>
                                        </div>
                                        <?php if($p['stock'] <= 0): ?>
                                            <span class="text-[9px] font-black text-white bg-red-500 px-2 py-1 rounded-md">OUT</span>
                                        <?php elseif($p['stock'] <= 5): ?>
                                            <span class="text-[9px] font-black text-white bg-orange-500 px-2 py-1 rounded-md animate-pulse">LOW</span>
                                        <?php else: ?>
                                            <span class="text-[9px] font-black text-white bg-green-500 px-2 py-1 rounded-md">SAFE</span>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <!-- Visual Stock Bar -->
                                    <div class="flex items-center gap-3">
                                        <div class="flex-1 h-1.5 bg-gray-100 rounded-full overflow-hidden">
                                            <?php 
                                                // Calculate width percentage (cap at 100)
                                                $width = min(($p['stock'] / 50) * 100, 100); 
                                                $barColor = ($p['stock'] <= 5) ? 'bg-orange-500' : (($p['stock'] <= 0) ? 'bg-red-500' : 'bg-blue-500');
                                            ?>
                                            <div class="<?= $barColor ?> h-full" style="width: <?= $width ?>%"></div>
                                        </div>
                                        <span class="text-xs font-bold text-gray-600"><?= $p['stock'] ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #e5e7eb; border-radius: 10px; }
    </style>
</body>
</html>