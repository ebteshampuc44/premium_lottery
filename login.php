<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LottoElite</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Firebase SDK -->
    <script src="https://www.gstatic.com/firebasejs/10.0.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.0.0/firebase-auth-compat.js"></script>
    
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
                    <a href="#" id="forgotPassword" class="text-primary hover:text-primary/80 text-sm">Forgot password?</a>
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
                    <button type="button" id="googleLogin" class="bg-dark border border-gray-700 text-white py-3 rounded-xl font-medium hover:bg-gray-800 transition-colors flex items-center justify-center">
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
        // Firebase Configuration
        const firebaseConfig = {
            apiKey: "AIzaSyDQhuCLaKZ3SAr_X0kEcq2oBs6mq_9R15M",
            authDomain: "lottoelite-911a8.firebaseapp.com",
            projectId: "lottoelite-911a8",
            storageBucket: "lottoelite-911a8.firebasestorage.app",
            messagingSenderId: "457694339359",
            appId: "1:457694339359:web:46df2a974ff3731dc3d02a",
            measurementId: "G-3JKBYZN72R"
        };

        // Initialize Firebase
        if (!firebase.apps.length) {
            firebase.initializeApp(firebaseConfig);
        }
        const auth = firebase.auth();
        
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
        document.getElementById('loginForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const remember = document.getElementById('remember').checked;
            
            // Show loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Logging in...';
            submitBtn.disabled = true;
            
            try {
                // Firebase email/password login
                const userCredential = await auth.signInWithEmailAndPassword(email, password);
                const user = userCredential.user;
                
                // Check if email is verified
                if (!user.emailVerified) {
                    const resend = confirm(
                        `⚠️ Email not verified!\n\nEmail: ${user.email}\n\nYou need to verify your email before logging in.\n\nWould you like us to send a new verification email?`
                    );
                    
                    if (resend) {
                        await user.sendEmailVerification();
                        alert(`✅ New verification email sent to:\n${user.email}\n\nPlease check your inbox and verify your email.`);
                    }
                    
                    await auth.signOut();
                    return;
                }
                
                // Save user data
                const userData = {
                    uid: user.uid,
                    fullName: user.displayName || email.split('@')[0],
                    email: user.email,
                    emailVerified: user.emailVerified,
                    photoURL: user.photoURL
                };
                
                localStorage.setItem('lottoUser', JSON.stringify(userData));
                
                // Show success message
                alert(`🎉 Login successful!\n\nWelcome back ${user.displayName || email.split('@')[0]}!\n\nRedirecting to home page...`);
                
                // Redirect to home page
                setTimeout(() => {
                    window.location.href = 'index.php';
                }, 2000);
                
            } catch (error) {
                let errorMessage = "Login failed.";
                
                switch(error.code) {
                    case 'auth/user-not-found':
                        errorMessage = '❌ No account found with this email!\n\nPlease sign up first or check your email address.';
                        break;
                    case 'auth/wrong-password':
                        errorMessage = '❌ Incorrect password!\n\nPlease check your password and try again.';
                        break;
                    case 'auth/invalid-email':
                        errorMessage = '❌ Invalid email format!\n\nPlease enter a valid email address.';
                        break;
                    case 'auth/user-disabled':
                        errorMessage = '❌ Account disabled!\n\nThis account has been disabled. Please contact support.';
                        break;
                    case 'auth/too-many-requests':
                        errorMessage = '⚠️ Too many failed attempts!\n\nPlease try again later or reset your password.';
                        break;
                    case 'auth/network-request-failed':
                        errorMessage = '🌐 Network error!\n\nPlease check your internet connection.';
                        break;
                    default:
                        errorMessage = `❌ Error: ${error.message}`;
                }
                
                alert(errorMessage);
            } finally {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }
        });

        // Google Login
        document.getElementById('googleLogin').addEventListener('click', async function() {
            try {
                const provider = new firebase.auth.GoogleAuthProvider();
                const result = await auth.signInWithPopup(provider);
                const user = result.user;
                
                // Save user data
                const userData = {
                    uid: user.uid,
                    fullName: user.displayName,
                    email: user.email,
                    emailVerified: user.emailVerified,
                    photoURL: user.photoURL
                };
                
                localStorage.setItem('lottoUser', JSON.stringify(userData));
                
                alert(`🎉 Welcome ${user.displayName}!\n\n✅ Google login successful.\n\nRedirecting to home page...`);
                
                // Redirect to home
                setTimeout(() => {
                    window.location.href = 'index.php';
                }, 2000);
                
            } catch (error) {
                let errorMessage = "Google login failed.";
                
                if (error.code === 'auth/popup-blocked') {
                    errorMessage = 'Popup was blocked by your browser!\n\nPlease allow popups for this site.';
                } else if (error.code === 'auth/popup-closed-by-user') {
                    errorMessage = 'Popup was closed!\n\nPlease try again.';
                } else {
                    errorMessage = `❌ Error: ${error.message}`;
                }
                
                alert(errorMessage);
            }
        });

        // Forgot Password
        document.getElementById('forgotPassword').addEventListener('click', async function(e) {
            e.preventDefault();
            
            const email = prompt("Enter your email address to reset password:");
            if (!email) return;
            
            if (!email.includes('@')) {
                alert("Please enter a valid email address.");
                return;
            }
            
            try {
                await auth.sendPasswordResetEmail(email);
                alert(`✅ Password reset email sent to:\n${email}\n\nPlease check your inbox and follow the instructions.`);
            } catch (error) {
                alert(`❌ Error: ${error.message}`);
            }
        });
    </script>
</body>
</html>