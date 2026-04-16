<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cash Flow</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex h-screen bg-slate-50">
    <?= $this->include('theme/sidebar') ?>
    <main class="flex-1 p-8 overflow-y-auto">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Manual Cash Flow</h2>

        <div class="bg-white p-6 rounded-2xl shadow-sm mb-8 border-t-4 border-yellow-500">
            <form action="/cash/store" method="post" class="flex gap-4">
                <select name="type" required class="w-40 px-4 py-2 border rounded-xl bg-gray-50">
                    <option value="in">Cash IN (+)</option>
                    <option value="out">Cash OUT (-)</option>
                </select>
                <input type="number" step="0.01" name="amount" placeholder="Amount ($)" required class="w-40 px-4 py-2 border rounded-xl">
                <input type="text" name="description" placeholder="Description / Reason" required class="flex-1 px-4 py-2 border rounded-xl">
                <button type="submit" class="bg-yellow-500 text-white px-8 py-2 rounded-xl font-bold shadow-lg hover:bg-yellow-600">Record</button>
            </form>
        </div>

        <table class="w-full bg-white rounded-2xl shadow-sm text-left">
            <thead><tr class="bg-gray-100 text-gray-600"><th class="p-4">Type</th><th class="p-4">Amount</th><th class="p-4">Description</th><th class="p-4">Date</th></tr></thead>
            <tbody>
                <?php foreach($cash_flows as $c): ?>
                <tr class="border-b">
                    <td class="p-4">
                        <span class="bg-<?= $c['type']=='in'?'green':'red' ?>-100 text-<?= $c['type']=='in'?'green':'red' ?>-700 px-3 py-1 rounded-full text-xs font-bold uppercase"><?= $c['type'] ?></span>
                    </td>
                    <td class="p-4 font-bold text-gray-700">$<?= number_format($c['amount'], 2) ?></td>
                    <td class="p-4 text-gray-500"><?= $c['description'] ?></td>
                    <td class="p-4 text-gray-400 text-sm"><?= $c['created_at'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>