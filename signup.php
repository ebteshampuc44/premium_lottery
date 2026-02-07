
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - LottoElite</title>
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
        .password-strength {
            height: 4px;
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="bg-dark text-light min-h-screen flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-gradient-dark"></div>
    <div class="absolute top-1/4 right-1/4 w-72 h-72 bg-purple/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-1/4 left-1/4 w-96 h-96 bg-secondary/10 rounded-full blur-3xl"></div>
    
    <div class="relative z-10 w-full max-w-md">
        <!-- Back to Home -->
        <a href="index.php" class="absolute -top-16 left-0 text-gray-400 hover:text-accent transition-colors flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Back to Home
        </a>
        
        <!-- Sign Up Card -->
        <div class="glass-effect rounded-2xl p-8 shadow-card">
            <!-- Logo -->
            <div class="text-center mb-8">
                <div class="w-16 h-16 rounded-xl bg-gradient-primary flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-crown text-white text-2xl"></i>
                </div>
                <h1 class="text-3xl font-bold text-white">Join Lotto<span class="text-accent">Elite</span></h1>
                <p class="text-gray-400 mt-2">Create your account in minutes</p>
            </div>
            
            <!-- Sign Up Form -->
            <form id="signupForm" class="space-y-6">
                <!-- Full Name -->
                <div>
                    <label for="fullName" class="block text-gray-300 mb-2">Full Name</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-500"></i>
                        </div>
                        <input 
                            type="text" 
                            id="fullName" 
                            required
                            class="w-full pl-10 pr-4 py-3 bg-dark border border-gray-700 rounded-xl text-white focus:outline-none focus:border-primary transition-colors"
                            placeholder="John Doe"
                        >
                    </div>
                </div>
                
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
                
                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-gray-300 mb-2">Phone Number</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-phone text-gray-500"></i>
                        </div>
                        <input 
                            type="tel" 
                            id="phone" 
                            required
                            class="w-full pl-10 pr-4 py-3 bg-dark border border-gray-700 rounded-xl text-white focus:outline-none focus:border-primary transition-colors"
                            placeholder="+880 1700-123456"
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
                    
                    <!-- Password Strength -->
                    <div class="mt-2">
                        <div class="flex justify-between text-xs text-gray-500 mb-1">
                            <span>Password strength:</span>
                            <span id="strengthText">Weak</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full overflow-hidden">
                            <div id="strengthBar" class="password-strength w-1/4 bg-red-500"></div>
                        </div>
                    </div>
                    
                    <!-- Password Requirements -->
                    <div class="mt-3 space-y-1">
                        <p class="text-xs text-gray-500">Password must contain:</p>
                        <div class="flex items-center">
                            <i id="lengthCheck" class="fas fa-times text-red-500 text-xs mr-2"></i>
                            <span class="text-xs text-gray-400">At least 8 characters</span>
                        </div>
                        <div class="flex items-center">
                            <i id="numberCheck" class="fas fa-times text-red-500 text-xs mr-2"></i>
                            <span class="text-xs text-gray-400">At least one number</span>
                        </div>
                        <div class="flex items-center">
                            <i id="specialCheck" class="fas fa-times text-red-500 text-xs mr-2"></i>
                            <span class="text-xs text-gray-400">At least one special character</span>
                        </div>
                    </div>
                </div>
                
                <!-- Confirm Password -->
                <div>
                    <label for="confirmPassword" class="block text-gray-300 mb-2">Confirm Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-500"></i>
                        </div>
                        <input 
                            type="password" 
                            id="confirmPassword" 
                            required
                            class="w-full pl-10 pr-4 py-3 bg-dark border border-gray-700 rounded-xl text-white focus:outline-none focus:border-primary transition-colors"
                            placeholder="••••••••"
                        >
                    </div>
                    <div id="passwordMatch" class="text-xs mt-1 hidden">
                        <i class="fas fa-check text-green-500 mr-1"></i>
                        <span class="text-green-500">Passwords match</span>
                    </div>
                    <div id="passwordMismatch" class="text-xs mt-1 hidden">
                        <i class="fas fa-times text-red-500 mr-1"></i>
                        <span class="text-red-500">Passwords do not match</span>
                    </div>
                </div>
                
                <!-- Terms & Conditions -->
                <div class="flex items-start">
                    <input type="checkbox" id="terms" required class="h-4 w-4 mt-1 text-primary rounded focus:ring-primary border-gray-700">
                    <label for="terms" class="ml-2 text-gray-400 text-sm">
                        I agree to the <a href="#" class="text-primary hover:text-primary/80">Terms & Conditions</a> and <a href="#" class="text-primary hover:text-primary/80">Privacy Policy</a>
                    </label>
                </div>
                
                <!-- Newsletter -->
                <div class="flex items-start">
                    <input type="checkbox" id="newsletter" class="h-4 w-4 mt-1 text-primary rounded focus:ring-primary border-gray-700">
                    <label for="newsletter" class="ml-2 text-gray-400 text-sm">
                        I want to receive lottery updates and promotional offers
                    </label>
                </div>
                
                <!-- Submit Button -->
                <button type="submit" class="w-full bg-gradient-secondary text-white py-3 rounded-xl font-bold hover:opacity-90 transition-opacity shadow-button">
                    <i class="fas fa-user-plus mr-2"></i> Create Account
                </button>
                
                <!-- Divider -->
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-700"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-dark text-gray-500">Or sign up with</span>
                    </div>
                </div>
                
                <!-- Social Sign Up -->
                <div class="grid grid-cols-2 gap-3">
                    <button type="button" class="bg-dark border border-gray-700 text-white py-3 rounded-xl font-medium hover:bg-gray-800 transition-colors flex items-center justify-center">
                        <i class="fab fa-google text-red-500 mr-2"></i> Google
                    </button>
                    <button type="button" class="bg-dark border border-gray-700 text-white py-3 rounded-xl font-medium hover:bg-gray-800 transition-colors flex items-center justify-center">
                        <i class="fab fa-facebook text-blue-500 mr-2"></i> Facebook
                    </button>
                </div>
                
                <!-- Login Link -->
                <div class="text-center pt-4 border-t border-gray-800">
                    <p class="text-gray-400">Already have an account? 
                        <a href="login.php" class="text-primary hover:text-primary/80 font-medium">Login here</a>
                    </p>
                </div>
            </form>
        </div>
        
        <!-- Bonus Notice -->
        <div class="text-center mt-6">
            <div class="inline-flex items-center bg-gradient-primary/20 border border-primary/30 rounded-full px-4 py-2">
                <i class="fas fa-gift text-primary mr-2"></i>
                <span class="text-sm text-white">Get ৳50 bonus on your first deposit!</span>
            </div>
        </div>
    </div>

    <script>
        // Password visibility toggle
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
        
        // Password strength checker
        function checkPasswordStrength(password) {
            let strength = 0;
            const lengthCheck = document.getElementById('lengthCheck');
            const numberCheck = document.getElementById('numberCheck');
            const specialCheck = document.getElementById('specialCheck');
            const strengthBar = document.getElementById('strengthBar');
            const strengthText = document.getElementById('strengthText');
            
            // Reset checks
            lengthCheck.className = 'fas fa-times text-red-500 text-xs mr-2';
            numberCheck.className = 'fas fa-times text-red-500 text-xs mr-2';
            specialCheck.className = 'fas fa-times text-red-500 text-xs mr-2';
            
            // Length check
            if (password.length >= 8) {
                strength += 1;
                lengthCheck.className = 'fas fa-check text-green-500 text-xs mr-2';
            }
            
            // Number check
            if (/\d/.test(password)) {
                strength += 1;
                numberCheck.className = 'fas fa-check text-green-500 text-xs mr-2';
            }
            
            // Special character check
            if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
                strength += 1;
                specialCheck.className = 'fas fa-check text-green-500 text-xs mr-2';
            }
            
            // Update strength bar and text
            if (password.length === 0) {
                strengthBar.style.width = '0%';
                strengthBar.className = 'password-strength bg-gray-500';
                strengthText.textContent = 'None';
            } else if (strength === 1) {
                strengthBar.style.width = '33%';
                strengthBar.className = 'password-strength bg-red-500';
                strengthText.textContent = 'Weak';
            } else if (strength === 2) {
                strengthBar.style.width = '66%';
                strengthBar.className = 'password-strength bg-yellow-500';
                strengthText.textContent = 'Medium';
            } else if (strength === 3) {
                strengthBar.style.width = '100%';
                strengthBar.className = 'password-strength bg-green-500';
                strengthText.textContent = 'Strong';
            }
        }
        
        // Password match checker
        function checkPasswordMatch() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            const matchDiv = document.getElementById('passwordMatch');
            const mismatchDiv = document.getElementById('passwordMismatch');
            
            if (confirmPassword.length === 0) {
                matchDiv.classList.add('hidden');
                mismatchDiv.classList.add('hidden');
                return false;
            }
            
            if (password === confirmPassword) {
                matchDiv.classList.remove('hidden');
                mismatchDiv.classList.add('hidden');
                return true;
            } else {
                matchDiv.classList.add('hidden');
                mismatchDiv.classList.remove('hidden');
                return false;
            }
        }
        
        // Event listeners for password fields
        document.getElementById('password').addEventListener('input', function() {
            checkPasswordStrength(this.value);
            checkPasswordMatch();
        });
        
        document.getElementById('confirmPassword').addEventListener('input', checkPasswordMatch);
        
        // Form submission
        document.getElementById('signupForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const fullName = document.getElementById('fullName').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            const terms = document.getElementById('terms').checked;
            
            // Validate passwords match
            if (!checkPasswordMatch()) {
                alert('Passwords do not match!');
                return;
            }
            
            // Validate password strength
            if (password.length < 8) {
                alert('Password must be at least 8 characters long!');
                return;
            }
            
            if (!terms) {
                alert('You must agree to the Terms & Conditions!');
                return;
            }
            
            // Show loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Creating Account...';
            submitBtn.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                alert(`Account created successfully!\nWelcome to LottoElite, ${fullName}!`);
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                
                // In real app, you would redirect here
                // window.location.href = 'login.php';
                // Or automatically log them in and redirect to dashboard
            }, 2000);
        });
        
        // Phone number formatting
        document.getElementById('phone').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            
            if (value.length > 0) {
                if (value.length <= 3) {
                    value = value;
                } else if (value.length <= 6) {
                    value = value.slice(0, 3) + '-' + value.slice(3);
                } else if (value.length <= 10) {
                    value = value.slice(0, 3) + '-' + value.slice(3, 6) + '-' + value.slice(6);
                } else {
                    value = value.slice(0, 3) + '-' + value.slice(3, 6) + '-' + value.slice(6, 10);
                }
            }
            
            e.target.value = value;
        });
    </script>
</body>
</html>