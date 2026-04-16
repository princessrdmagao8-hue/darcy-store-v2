<!-- app/Views/theme/sidebar.php -->
<aside class="w-64 bg-slate-900 text-white flex flex-col shadow-2xl h-screen sticky top-0 flex-shrink-0">
    <!-- Brand Logo Section -->
    <div class="h-20 flex items-center justify-center border-b border-gray-800">
        <h1 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-400">
            Darcy Store
        </h1>
    </div>

    <!-- Navigation Links -->
    <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto custom-scrollbar">
        
        <!-- Dashboard -->
        <a href="/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group <?= (current_url(true)->getSegment(1) == 'dashboard') ? 'bg-blue-600/20 text-blue-400 shadow-inner' : 'text-gray-400 hover:bg-white/5 hover:text-white' ?>">
            <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            <span class="font-medium text-sm">Dashboard</span>
        </a>

        <!-- User Management -->
        <a href="/users" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group <?= (current_url(true)->getSegment(1) == 'users') ? 'bg-cyan-600/20 text-cyan-400 shadow-inner' : 'text-gray-400 hover:bg-white/5 hover:text-white' ?>">
            <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
            </svg>
            <span class="font-medium text-sm">Users Model</span>
        </a>

        <div class="pt-4 pb-2 px-4">
            <span class="text-[10px] uppercase tracking-widest text-gray-500 font-bold">Inventory & Sales</span>
        </div>

        <!-- Products -->
        <a href="/products" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group <?= (current_url(true)->getSegment(1) == 'products') ? 'bg-purple-600/20 text-purple-400 shadow-inner' : 'text-gray-400 hover:bg-white/5 hover:text-white' ?>">
            <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
            </svg>
            <span class="font-medium text-sm">Products</span>
        </a>

        <!-- Sales (POS) -->
        <a href="/sales" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group <?= (current_url(true)->getSegment(1) == 'sales') ? 'bg-green-600/20 text-green-400 shadow-inner' : 'text-gray-400 hover:bg-white/5 hover:text-white' ?>">
            <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
            <span class="font-medium text-sm">Sales (POS)</span>
        </a>

        <!-- Cash In/Out -->
        <a href="/cash" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group <?= (current_url(true)->getSegment(1) == 'cash') ? 'bg-yellow-600/20 text-yellow-400 shadow-inner' : 'text-gray-400 hover:bg-white/5 hover:text-white' ?>">
            <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="font-medium text-sm">Cash Flow</span>
        </a>

        <!-- Reports -->
        <a href="/reports" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group <?= (current_url(true)->getSegment(1) == 'reports') ? 'bg-red-600/20 text-red-400 shadow-inner' : 'text-gray-400 hover:bg-white/5 hover:text-white' ?>">
            <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
            </svg>
            <span class="font-medium text-sm">Reports</span>
        </a>

    </nav>

    <!-- Footer Logout Section -->
    <div class="p-4 border-t border-gray-800">
        <a href="/logout" class="flex items-center gap-3 text-red-400 hover:bg-red-500/10 px-4 py-3 rounded-xl transition-all duration-200 group">
            <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
            <span class="font-semibold text-sm">Logout Account</span>
        </a>
    </div>
</aside>

<style>
    /* Premium thin scrollbar for sidebar */
    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #1e293b;
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #334155;
    }
</style>