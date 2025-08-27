<?php
session_start();

// If already logged in, redirect to home
if (isset($_SESSION["auth"]) && $_SESSION["auth"]) {
    header('Location: /');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - My Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full mx-4">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <header class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Login</h1>
                <p class="text-gray-600">Access your blog administration</p>
            </header>

            <?php if (isset($_GET['error'])): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    Invalid username or password
                </div>
            <?php endif; ?>

            <form action="core/auth.php" method="POST" class="space-y-6">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                    <input type="text" id="username" name="username" required 
                           placeholder="Enter your username..." 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password" id="password" name="password" required 
                           placeholder="Enter your password..." 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <input type="submit" value="Login" 
                           class="w-full bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 cursor-pointer font-medium">
                </div>
            </form>

            <div class="mt-6 text-center">
                <a href="/" class="text-blue-600 hover:text-blue-800 hover:underline">← Back to Blog</a>
            </div>
        </div>
    </div>
</body>
</html>