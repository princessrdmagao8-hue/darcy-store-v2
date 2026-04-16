<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reports</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex h-screen bg-slate-50">
    <?= $this->include('theme/sidebar') ?>
    <main class="flex-1 p-8 overflow-y-auto">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Financial Reports</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-gradient-to-br from-green-500 to-emerald-600 p-8 rounded-3xl text-white shadow-xl">
                <h3 class="text-xl text-green-100 mb-2">Total Sales Revenue</h3>
                <h1 class="text-5xl font-bold">$<?= number_format($total_sales, 2) ?></h1>
                <p class="mt-4 text-sm bg-black/10 inline-block px-3 py-1 rounded-lg">Automatically updated from POS</p>
            </div>

            <div class="bg-gradient-to-br from-yellow-500 to-orange-600 p-8 rounded-3xl text-white shadow-xl">
                <h3 class="text-xl text-yellow-100 mb-2">Net Cash Balance</h3>
                <h1 class="text-5xl font-bold">$<?= number_format($net_cash, 2) ?></h1>
                <p class="mt-4 text-sm bg-black/10 inline-block px-3 py-1 rounded-lg">Cash In minus Cash Out</p>
            </div>
        </div>
    </main>
</body>
</html>