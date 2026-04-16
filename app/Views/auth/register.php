<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-indigo-900 to-slate-900 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-white/10 backdrop-blur-lg border border-white/20 rounded-3xl shadow-2xl p-8 text-white">
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-400">Join Us</h2>
            <p class="text-gray-300 text-sm mt-2">Create your premium account today.</p>
        </div>

        <?php if(isset($validation)):?>
            <div class="bg-red-500/20 border border-red-500 text-red-200 text-sm p-3 rounded-lg mb-6">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif;?>

        <form action="/register/store" method="post" class="space-y-5">
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Full Name</label>
                <input type="text" name="name" value="<?= set_value('name') ?>" class="w-full px-4 py-3 bg-white/5 border border-gray-500 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition text-white placeholder-gray-400" placeholder="John Doe">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Email Address</label>
                <input type="email" name="email" value="<?= set_value('email') ?>" class="w-full px-4 py-3 bg-white/5 border border-gray-500 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition text-white placeholder-gray-400" placeholder="john@example.com">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                <input type="password" name="password" class="w-full px-4 py-3 bg-white/5 border border-gray-500 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition text-white placeholder-gray-400" placeholder="••••••••">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Confirm Password</label>
                <input type="password" name="confirmpassword" class="w-full px-4 py-3 bg-white/5 border border-gray-500 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition text-white placeholder-gray-400" placeholder="••••••••">
            </div>

            <button type="submit" class="w-full py-3 px-4 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-semibold rounded-xl shadow-lg transform transition hover:scale-[1.02] focus:outline-none">
                Create Account
            </button>
        </form>

        <p class="text-center text-sm text-gray-400 mt-6">
            Already have an account? <a href="/login" class="text-purple-400 hover:text-purple-300 font-medium transition">Sign in</a>
        </p>
    </div>

</body>
</html>