<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add User</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-gray-50 text-gray-800 flex h-screen overflow-hidden">
    <?= $this->include('theme/sidebar') ?>

    <main class="flex-1 flex flex-col bg-slate-50 h-screen overflow-y-auto">
        <header class="h-20 bg-white shadow-sm flex items-center justify-between px-8 flex-shrink-0">
            <h2 class="text-xl font-semibold text-gray-700">User Management</h2>
        </header>

        <div class="p-8 max-w-3xl">
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Create New User</h3>

                <?php if(isset($validation)): ?>
                    <div class="bg-red-100 text-red-600 p-4 rounded-lg mb-6 text-sm"><?= $validation->listErrors() ?></div>
                <?php endif; ?>

                <form action="/users/store" method="post" class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <input type="text" name="name" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input type="email" name="email" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" name="password" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
                    </div>
                    <div class="flex gap-4 pt-4">
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-xl shadow-md hover:scale-[1.02] transition font-medium">Save User</button>
                        <a href="/users" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-xl hover:bg-gray-300 transition font-medium">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>