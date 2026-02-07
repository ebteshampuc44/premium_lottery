<?php
session_start();
require_once 'conn.php';

$default_username = "admin";
$default_password = "admin123";

if(isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    if($username === $default_username && $password === $default_password) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin-dashboard.php');
        exit();
    } else {
        $error_message = "Username or password is incorrect!";
    }
}

if(isset($_SESSION['admin_logged_in'])) {
    header('Location: admin-dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - LottoElite</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%);
            min-height: 100vh;
        }
    </style>
</head>
<body class="font-sans">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-gray-800/50 backdrop-blur-lg rounded-2xl p-8 w-full max-w-md border border-gray-700/50">
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-lock text-white text-2xl"></i>
                </div>
                <h1 class="text-2xl font-bold text-white">Admin Login</h1>
                <p class="text-gray-400 mt-2">Access Lottery Dashboard</p>
            </div>
            
            <?php if(isset($error_message)): ?>
                <div class="bg-red-500/20 border border-red-500/50 text-red-300 p-3 rounded-lg mb-6">
                    <i class="fas fa-exclamation-circle mr-2"></i> <?php echo $error_message; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="space-y-4">
                    <div>
                        <label class="block text-gray-400 mb-2">Username</label>
                        <input type="text" name="username" required 
                               class="w-full bg-gray-900/50 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-500"
                               placeholder="Enter username">
                    </div>
                    
                    <div>
                        <label class="block text-gray-400 mb-2">Password</label>
                        <input type="password" name="password" required 
                               class="w-full bg-gray-900/50 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-500"
                               placeholder="Enter password">
                    </div>
                    
                    <div class="bg-gray-900/30 p-4 rounded-lg text-sm text-gray-400">
                        <p><i class="fas fa-info-circle mr-2"></i> Default Login:</p>
                        <p class="mt-1">Username: <span class="text-yellow-400">admin</span></p>
                        <p>Password: <span class="text-yellow-400">admin123</span></p>
                    </div>
                    
                    <button type="submit" name="login" 
                            class="w-full bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-gray-900 font-bold py-3 rounded-lg transition-all mt-2">
                        <i class="fas fa-sign-in-alt mr-2"></i> Login
                    </button>
                </div>
            </form>
            
            <div class="mt-6 text-center">
                <a href="index.php" class="text-gray-400 hover:text-yellow-400 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Main Site
                </a>
            </div>
        </div>
    </div>
</body>
</html>