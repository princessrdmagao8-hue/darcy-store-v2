<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Users</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-gray-50 text-gray-800 flex h-screen overflow-hidden">
    <?= $this->include('theme/sidebar') ?>

    <main class="flex-1 flex flex-col bg-slate-50 h-screen overflow-y-auto">
        <header class="h-20 bg-white shadow-sm flex items-center justify-between px-8 flex-shrink-0">
            <h2 class="text-xl font-semibold text-gray-700">User Management Model</h2>
        </header>

        <div class="p-8">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-gray-800">Users List</h3>
                <a href="/users/create" class="px-5 py-2.5 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-xl shadow-md hover:scale-105 transition">
                    + Add New User
                </a>
            </div>

            <?php if(session()->getFlashdata('success')): ?>
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100 text-gray-500 text-sm uppercase tracking-wider">
                            <th class="py-4 px-6">ID</th>
                            <th class="py-4 px-6">Name</th>
                            <th class="py-4 px-6">Email</th>
                            <th class="py-4 px-6 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php foreach($users as $user): ?>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-4 px-6 text-gray-600 font-medium">#<?= $user['id'] ?></td>
                            <td class="py-4 px-6 font-semibold text-gray-800"><?= $user['name'] ?></td>
                            <td class="py-4 px-6 text-gray-500"><?= $user['email'] ?></td>
                            <td class="py-4 px-6 text-right space-x-2">
                                <a href="/users/edit/<?= $user['id'] ?>" class="px-3 py-1.5 bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200 transition text-sm font-medium">Edit</a>
                                <a href="/users/delete/<?= $user['id'] ?>" onclick="return confirm('Delete this user?')" class="px-3 py-1.5 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition text-sm font-medium">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>