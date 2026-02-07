<!-- login.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LottoElite</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#FF5A5F',
                        secondary: '#00A699',
                        accent: '#FFB400',
                        dark: '#0F172A',
                        light: '#F8FAFC',
                        purple: '#8B5CF6',
                        success: '#10B981',
                        card: 'rgba(255, 255, 255, 0.05)',
                    },
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                    backgroundImage: {
                        'gradient-primary': 'linear-gradient(135deg, #FF5A5F 0%, #FF8A9E 100%)',
                        'gradient-secondary': 'linear-gradient(135deg, #00A699 0%, #00D4AA 100%)',
                        'gradient-dark': 'linear-gradient(135deg, #0F172A 0%, #1E293B 100%)',
                    },
                    boxShadow: {
                        'card': '0 10px 30px rgba(0, 0, 0, 0.2)',
                        'button': '0 5px 15px rgba(255, 90, 95, 0.3)',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body class="bg-dark text-light min-h-screen flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-gradient-dark"></div>
    <div class="absolute top-1/4 left-1/4 w-72 h-72 bg-purple/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-primary/10 rounded-full blur-3xl"></div>
    
    <div class="relative z-10 w-full max-w-md">
        <!-- Back to Home -->
        <a href="index.php" class="absolute -top-16 left-0 text-gray-400 hover:text-accent transition-colors flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Back to Home
        </a>
        
        <!-- Login Card -->
        <div class="glass-effect rounded-2xl p-8 shadow-card">
            <!-- Logo -->
            <div class="text-center mb-8">
                <div class="w-16 h-16 rounded-xl bg-gradient-primary flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-crown text-white text-2xl"></i>
                </div>
                <h1 class="text-3xl font-bold text-white">Lotto<span class="text-accent">Elite</span></h1>
                <p class="text-gray-400 mt-2">Login to your account</p>
            </div>
            
            <!-- Login Form -->
            <form id="loginForm" class="space-y-6">
                <!-- Email -->
                <div>
                    <label for="email" class="block text-gray-300 mb-2">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-500"></i>
                        </div>
                        <input 
                            type="email" 
                            id="email" 
                            required
                            class="w-full pl-10 pr-4 py-3 bg-dark border border-gray-700 rounded-xl text-white focus:outline-none focus:border-primary transition-colors"
                            placeholder="you@example.com"
                        >
                    </div>
                </div>
                
                <!-- Password -->
                <div>
                    <label for="password" class="block text-gray-300 mb-2">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-500"></i>
                        </div>
                        <input 
                            type="password" 
                            id="password" 
                            required
                            class="w-full pl-10 pr-10 py-3 bg-dark border border-gray-700 rounded-xl text-white focus:outline-none focus:border-primary transition-colors"
                            placeholder="••••••••"
                        >
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <i class="fas fa-eye text-gray-500 hover:text-gray-300"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Remember & Forgot -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" class="h-4 w-4 text-primary rounded focus:ring-primary border-gray-700">
                        <label for="remember" class="ml-2 text-gray-400 text-sm">Remember me</label>
                    </div>
                    <a href="#" class="text-primary hover:text-primary/80 text-sm">Forgot password?</a>
                </div>
                
                <!-- Submit Button -->
                <button type="submit" class="w-full bg-gradient-primary text-white py-3 rounded-xl font-bold hover:opacity-90 transition-opacity shadow-button">
                    <i class="fas fa-sign-in-alt mr-2"></i> Login to Account
                </button>
                
                <!-- Divider -->
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-700"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-dark text-gray-500">Or continue with</span>
                    </div>
                </div>
                
                <!-- Social Login -->
                <div class="grid grid-cols-2 gap-3">
                    <button type="button" class="bg-dark border border-gray-700 text-white py-3 rounded-xl font-medium hover:bg-gray-800 transition-colors flex items-center justify-center">
                        <i class="fab fa-google text-red-500 mr-2"></i> Google
                    </button>
                    <button type="button" class="bg-dark border border-gray-700 text-white py-3 rounded-xl font-medium hover:bg-gray-800 transition-colors flex items-center justify-center">
                        <i class="fab fa-facebook text-blue-500 mr-2"></i> Facebook
                    </button>
                </div>
                
                <!-- Sign Up Link -->
                <div class="text-center pt-4 border-t border-gray-800">
                    <p class="text-gray-400">Don't have an account? 
                        <a href="signup.php" class="text-primary hover:text-primary/80 font-medium">Sign up now</a>
                    </p>
                </div>
            </form>
        </div>
        
        <!-- Demo Notice -->
        <div class="text-center mt-6 text-gray-500 text-sm">
            <p>Demo Account: demo@lottoelite.com / Password: demo123</p>
        </div>
    </div>

    <script>
        // Toggle Password Visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
        
        // Form Submission
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            // Demo validation
            if (email && password) {
                // Show loading state
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Logging in...';
                submitBtn.disabled = true;
                
                // Simulate API call
                setTimeout(() => {
                    alert('Login successful! Redirecting to dashboard...');
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                    
                    // In real app, you would redirect here
                    // window.location.href = 'dashboard.php';
                }, 1500);
            }
        });
        
        // Demo login auto-fill
        document.addEventListener('DOMContentLoaded', function() {
            // Optional: Auto-fill demo credentials
            // document.getElementById('email').value = 'demo@lottoelite.com';
            // document.getElementById('password').value = 'demo123';
        });
    </script>
</body>
</html>