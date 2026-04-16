<!DOCTYPE html>
<html lang="en">
<head>
    <title>Products Inventory</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="flex h-screen bg-slate-50">
    <?= $this->include('theme/sidebar') ?>
    <main class="flex-1 p-8 overflow-y-auto">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Inventory & Products</h2>
        
        <div class="bg-white p-6 rounded-2xl shadow-sm mb-8">
            <h3 class="text-xl font-bold mb-4">Add New Product</h3>
            <form action="/products/store" method="post" class="flex gap-4">
                <input type="text" name="name" placeholder="Product Name" required class="flex-1 px-4 py-2 border rounded-xl">
                <input type="number" step="0.01" name="price" placeholder="Price ($)" required class="w-32 px-4 py-2 border rounded-xl">
                <input type="number" name="stock" placeholder="Qty" required class="w-24 px-4 py-2 border rounded-xl">
                <button type="submit" class="bg-purple-600 text-white px-6 py-2 rounded-xl">Save</button>
            </form>
        </div>

        <table class="w-full bg-white rounded-2xl shadow-sm text-left">
            <thead>
                <tr class="bg-gray-100 text-gray-600"><th class="p-4">ID</th><th class="p-4">Name</th><th class="p-4">Price</th><th class="p-4">Stock</th><th class="p-4">Action</th></tr>
            </thead>
            <tbody>
                <?php foreach($products as $p): ?>
                <tr class="border-b">
                    <td class="p-4">#<?= $p['id'] ?></td>
                    <td class="p-4 font-bold text-purple-700"><?= $p['name'] ?></td>
                    <td class="p-4">$<?= number_format($p['price'], 2) ?></td>
                    <td class="p-4"><span class="bg-<?= $p['stock']>0?'green':'red' ?>-100 text-<?= $p['stock']>0?'green':'red' ?>-700 px-3 py-1 rounded-full text-xs"><?= $p['stock'] ?> left</span></td>
                    <td class="p-4"><a href="/products/delete/<?= $p['id'] ?>" class="text-red-500 hover:underline">Delete</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>