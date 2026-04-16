<!-- app/Views/auth/dashboard.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Darcy Store - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-gray-50 text-gray-800 flex h-screen overflow-hidden">

    <!-- Include Sidebar from Theme -->
    <?= $this->include('theme/sidebar') ?>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col bg-slate-50 h-screen overflow-y-auto">
        <header class="h-20 bg-white shadow-sm flex items-center justify-between px-8 flex-shrink-0 z-10">
            <h2 class="text-xl font-semibold text-gray-700">Store Overview</h2>
            <div class="flex items-center gap-4">
                <span class="text-sm font-medium text-gray-500">Welcome, <span class="text-blue-600"><?= session()->get('name') ?></span></span>
                <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-400 to-purple-500 flex items-center justify-center text-white font-bold shadow-md">
                    <?= strtoupper(substr(session()->get('name'), 0, 1)) ?>
                </div>
            </div>
        </header>

        <div class="p-8 flex-1">
            <div class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-3xl p-8 text-white shadow-lg mb-8 relative overflow-hidden">
                <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl"></div>
                <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-32 h-32 bg-white opacity-10 rounded-full blur-xl"></div>
                
                <div class="relative z-10">
                    <h2 class="text-4xl font-bold mb-3">Welcome to Darcy Store! 🛍️</h2>
                    <p class="text-blue-100 max-w-2xl text-lg leading-relaxed">
                        Hello, <strong><?= session()->get('name') ?></strong>! You can now manage your store and configure the <strong>Users Model</strong> from the left sidebar.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Stat Cards -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
                    <div class="p-4 bg-blue-50 text-blue-500 rounded-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-400 font-medium">Total Users</p>
                        <h3 class="text-2xl font-bold text-gray-700">Manage Users via Sidebar</h3>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>