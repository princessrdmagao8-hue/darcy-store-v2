<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-indigo-900 to-slate-900 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-white/10 backdrop-blur-lg border border-white/20 rounded-3xl shadow-2xl p-8 text-white relative overflow-hidden">
        <!-- Decorative blob -->
        <div class="absolute -top-10 -right-10 w-32 h-32 bg-purple-500 rounded-full mix-blend-multiply filter blur-2xl opacity-50"></div>
        <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-blue-500 rounded-full mix-blend-multiply filter blur-2xl opacity-50"></div>

        <div class="relative z-10">
            <div class="mb-8 text-center">
                <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-400">Welcome Back</h2>
                <p class="text-gray-300 text-sm mt-2">Sign in to access your dashboard.</p>
            </div>

            <?php if(session()->getFlashdata('msg')):?>
                <div class="bg-red-500/20 border border-red-500 text-red-200 text-sm p-3 rounded-lg mb-6 text-center">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif;?>

            <?php if(session()->getFlashdata('success')):?>
                <div class="bg-green-500/20 border border-green-500 text-green-200 text-sm p-3 rounded-lg mb-6 text-center">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif;?>

            <form action="/login/auth" method="post" class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Email Address</label>
                    <input type="email" name="email" class="w-full px-4 py-3 bg-white/5 border border-gray-500 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition text-white placeholder-gray-400" placeholder="john@example.com" required>
                </div>

                <div>
                    <div class="flex justify-between items-center mb-1">
                        <label class="block text-sm font-medium text-gray-300">Password</label>
                        <a href="#" class="text-xs text-purple-400 hover:text-purple-300">Forgot Password?</a>
                    </div>
                    <input type="password" name="password" class="w-full px-4 py-3 bg-white/5 border border-gray-500 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition text-white placeholder-gray-400" placeholder="••••••••" required>
                </div>

                <button type="submit" class="w-full py-3 px-4 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-semibold rounded-xl shadow-lg transform transition hover:scale-[1.02] focus:outline-none">
                    Sign In
                </button>
            </form>

            <p class="text-center text-sm text-gray-400 mt-6">
                New to the platform? <a href="/register" class="text-purple-400 hover:text-purple-300 font-medium transition">Create an account</a>
            </p>
        </div>
    </div>

</body>
</html>