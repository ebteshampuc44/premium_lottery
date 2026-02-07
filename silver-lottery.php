<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Silver Lottery - LottoElite</title>
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
                        silver: '#C0C0C0',
                        silverLight: '#E5E5E5',
                        silverDark: '#808080',
                    },
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                    backgroundImage: {
                        'gradient-silver': 'linear-gradient(135deg, #C0C0C0 0%, #E5E5E5 100%)',
                        'gradient-dark': 'linear-gradient(135deg, #0F172A 0%, #1E293B 100%)',
                    },
                    boxShadow: {
                        'silver-glow': '0 0 20px rgba(192, 192, 192, 0.3)',
                        'card': '0 10px 30px rgba(0, 0, 0, 0.2)',
                    }
                }
            }
        }
    </script>
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .silver-gradient-text {
            background: linear-gradient(135deg, #C0C0C0 0%, #E5E5E5 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .animate-slide-in-right {
            animation: slideInRight 0.3s ease-out;
        }
        .animate-slide-out-right {
            animation: slideOutRight 0.3s ease-out;
        }
        @keyframes slideInRight {
            from { transform: translateX(100%); }
            to { transform: translateX(0); }
        }
        @keyframes slideOutRight {
            from { transform: translateX(0); }
            to { transform: translateX(100%); }
        }
    </style>
</head>
<body class="font-inter bg-dark text-light min-h-screen">
    <!-- Header/Navigation -->
    <header class="sticky top-0 z-50 glass-effect shadow-lg">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <a href="index.php" class="flex items-center space-x-3 hover:opacity-90 transition-opacity">
                    <div class="w-12 h-12 rounded-xl bg-gradient-primary flex items-center justify-center text-white">
                        <i class="fas fa-medal text-xl"></i>
                    </div>
                    <div class="hidden md:block">
                        <h1 class="text-2xl font-bold bg-gradient-primary text-gradient">Lotto<span class="text-accent">Elite</span></h1>
                        <p class="text-xs text-gray-400">Silver Lottery</p>
                    </div>
                </a>
                
                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center space-x-6">
                    <a href="index.php" class="text-gray-300 hover:text-accent transition-colors font-medium">Home</a>
                    <a href="index.php#lotteries" class="text-gray-300 hover:text-accent transition-colors font-medium">Lotteries</a>
                    <a href="index.php#jackpot" class="text-gray-300 hover:text-accent transition-colors font-medium">Jackpot</a>
                    <a href="index.php#winners" class="text-gray-300 hover:text-accent transition-colors font-medium">Winners</a>
                    <a href="index.php#how-to-play" class="text-gray-300 hover:text-accent transition-colors font-medium">How to Play</a>
                </nav>
                
                <!-- Desktop Login/Signup -->
                <div class="hidden lg:flex items-center space-x-4" id="desktopAuthButtons">
                    <a href="login.php" class="bg-gradient-primary text-white px-6 py-2 rounded-full font-semibold hover:shadow-button-hover transition-all shadow-button login-btn">
                        <i class="fas fa-user mr-2"></i>Login
                    </a>
                    <a href="signup.php" class="glass-effect text-white px-6 py-2 rounded-full font-semibold hover:bg-white/10 transition-colors signup-btn">
                        <i class="fas fa-user-plus mr-2"></i>Sign Up
                    </a>
                </div>
                
                <!-- Mobile Menu Button -->
                <button id="menu-toggle" class="lg:hidden text-gray-300 hover:text-accent transition-colors">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="lg:hidden fixed inset-0 z-50 hidden">
        <!-- Overlay -->
        <div class="absolute inset-0 menu-overlay" id="menu-overlay"></div>
        
        <!-- Menu Content - Positioned on RIGHT side -->
        <div class="absolute top-0 right-0 h-full w-80 bg-dark border-l border-gray-800 overflow-y-auto mobile-menu">
            <div class="p-6">
                <!-- Menu Header -->
                <div class="flex justify-between items-center mb-8">
                    <a href="index.php" class="flex items-center space-x-3 hover:opacity-90 transition-opacity">
                        <div class="w-12 h-12 rounded-xl bg-gradient-primary flex items-center justify-center text-white">
                            <i class="fas fa-medal text-xl"></i>
                        </div>
                        <div>
                            <h1 class="text-xl font-bold text-white">Lotto<span class="text-accent">Elite</span></h1>
                            <p class="text-xs text-gray-400">Premium Lottery Platform</p>
                        </div>
                    </a>
                    <button id="menu-close" class="text-gray-400 hover:text-white text-2xl">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <!-- Navigation Links -->
                <div class="space-y-2 mb-8">
                    <a href="index.php" class="flex items-center justify-between p-4 rounded-xl hover:bg-gray-800 transition-colors group">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-lg bg-gradient-primary/20 flex items-center justify-center group-hover:bg-gradient-primary transition-colors">
                                <i class="fas fa-home text-primary group-hover:text-white"></i>
                            </div>
                            <span class="font-medium">Home</span>
                        </div>
                        <i class="fas fa-chevron-left text-gray-500"></i>
                    </a>
                    
                    <a href="index.php#lotteries" class="flex items-center justify-between p-4 rounded-xl hover:bg-gray-800 transition-colors group">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-lg bg-gradient-secondary/20 flex items-center justify-center group-hover:bg-gradient-secondary transition-colors">
                                <i class="fas fa-ticket-alt text-secondary group-hover:text-white"></i>
                            </div>
                            <span class="font-medium">Lotteries</span>
                        </div>
                        <i class="fas fa-chevron-left text-gray-500"></i>
                    </a>
                    
                    <a href="index.php#jackpot" class="flex items-center justify-between p-4 rounded-xl hover:bg-gray-800 transition-colors group">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-lg bg-gradient-accent/20 flex items-center justify-center group-hover:bg-gradient-accent transition-colors">
                                <i class="fas fa-gem text-accent group-hover:text-dark"></i>
                            </div>
                            <span class="font-medium">Jackpot</span>
                        </div>
                        <i class="fas fa-chevron-left text-gray-500"></i>
                    </a>
                    
                    <a href="index.php#winners" class="flex items-center justify-between p-4 rounded-xl hover:bg-gray-800 transition-colors group">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-lg bg-gradient-purple/20 flex items-center justify-center group-hover:bg-gradient-purple transition-colors">
                                <i class="fas fa-trophy text-purple group-hover:text-white"></i>
                            </div>
                            <span class="font-medium">Winners</span>
                        </div>
                        <i class="fas fa-chevron-left text-gray-500"></i>
                    </a>
                    
                    <a href="index.php#how-to-play" class="flex items-center justify-between p-4 rounded-xl hover:bg-gray-800 transition-colors group">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-lg bg-gradient-primary/20 flex items-center justify-center group-hover:bg-gradient-primary transition-colors">
                                <i class="fas fa-play-circle text-primary group-hover:text-white"></i>
                            </div>
                            <span class="font-medium">How to Play</span>
                        </div>
                        <i class="fas fa-chevron-left text-gray-500"></i>
                    </a>
                </div>
                
                <!-- Login & Sign Up Buttons -->
                <div class="mb-8" id="mobileAuthButtons">
                    <a href="login.php" class="block w-full bg-gradient-primary text-white py-3 rounded-xl font-bold text-lg mb-3 text-center login-btn">
                        <i class="fas fa-user mr-2"></i> Login to Account
                    </a>
                    <a href="signup.php" class="block w-full glass-effect text-white py-3 rounded-xl font-bold text-lg text-center register-btn">
                        <i class="fas fa-user-plus mr-2"></i> Create Account
                    </a>
                </div>
                
                <!-- Footer Info -->
                <div class="text-center text-gray-500 text-sm pt-4 border-t border-gray-800">
                    <p>© 2023 LottoElite</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Silver Lottery Content Area -->
    <?php
    require_once 'conn.php';
    
    $tickets = [];
    $query = "SELECT lt.* FROM lottery_tickets lt 
              JOIN lottery_types ltp ON lt.lottery_type_id = ltp.id 
              WHERE ltp.slug = 'silver-lottery' AND lt.is_active = 1 
              ORDER BY lt.prize_amount DESC";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($result)) {
        $tickets[] = $row;
    }
    ?>
    
    <section class="py-12 md:py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <?php if(empty($tickets)): ?>
                    <div class="text-center text-gray-400 py-12">
                        <i class="fas fa-ticket-alt text-6xl mb-6 text-silver"></i>
                        <h2 class="text-3xl font-bold text-white mb-4">Silver Lottery</h2>
                        <p class="text-xl mb-8">Tickets will be added soon!</p>
                        <a href="index.php#lotteries" class="inline-flex items-center text-silver hover:text-silverLight transition-colors">
                            <i class="fas fa-arrow-left mr-2"></i> Back to All Lotteries
                        </a>
                    </div>
                <?php else: ?>
                    <div class="text-center mb-10">
                        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Silver Lottery</h2>
                        <p class="text-gray-400 text-lg">Total <?php echo count($tickets); ?> Tickets Available</p>
                        <div class="flex justify-center items-center mt-4">
                            <div class="glass-effect rounded-lg px-4 py-2">
                                <span class="text-silver font-semibold">Ticket Price: ৳50</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach($tickets as $ticket): ?>
                            <div class="glass-effect rounded-xl p-6 hover:shadow-lg transition-shadow border border-silver/20">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <span class="text-sm text-gray-400">Ticket Number</span>
                                        <h3 class="text-xl font-bold font-mono text-silver"><?php echo $ticket['ticket_number']; ?></h3>
                                    </div>
                                    <div class="w-12 h-12 rounded-lg gradient-silver flex items-center justify-center">
                                        <i class="fas fa-ticket-alt text-gray-800"></i>
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <span class="text-sm text-gray-400">Prize Amount</span>
                                    <p class="text-2xl font-bold text-silver">
                                        ৳ <?php echo number_format($ticket['prize_amount'], 2); ?>
                                    </p>
                                </div>
                                
                                <?php if($ticket['prize_description']): ?>
                                    <div class="mb-4">
                                        <span class="text-sm text-gray-400">Description</span>
                                        <p class="text-lg text-gray-300"><?php echo $ticket['prize_description']; ?></p>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="mb-4">
                                    <span class="text-sm text-gray-400">Status</span>
                                    <span class="inline-block px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">
                                        <i class="fas fa-check-circle mr-1"></i> Available
                                    </span>
                                </div>
                                
                                <button onclick="buyTicket('silver', '<?php echo $ticket['ticket_number']; ?>', <?php echo $ticket['prize_amount']; ?>)" 
                                        class="w-full bg-gradient-to-r from-gray-500 to-gray-700 text-white py-3 rounded-xl font-bold hover:opacity-90 transition-opacity">
                                    <i class="fas fa-shopping-cart mr-2"></i> Buy This Ticket
                                </button>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <div class="text-center mt-10">
                    <a href="index.php#lotteries" class="inline-flex items-center text-silver hover:text-silverLight transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i> Back to All Lotteries
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark pt-12 pb-8 border-t border-gray-800">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8 mb-10 md:mb-12">
                <!-- Column 1 -->
                <div>
                    <a href="index.php" class="flex items-center space-x-3 mb-6 hover:opacity-90 transition-opacity">
                        <div class="w-10 h-10 rounded-xl bg-gradient-primary flex items-center justify-center">
                            <i class="fas fa-crown text-white"></i>
                        </div>
                        <h2 class="text-xl md:text-2xl font-bold text-white">LottoElite</h2>
                    </a>
                    <p class="text-gray-400 mb-6 text-sm md:text-base">Bangladesh's most trusted lottery platform with the biggest jackpots and fairest draws.</p>
                    <div class="flex space-x-3">
                        <a href="#" class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition-colors">
                            <i class="fab fa-facebook-f text-white"></i>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition-colors">
                            <i class="fab fa-twitter text-white"></i>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition-colors">
                            <i class="fab fa-instagram text-white"></i>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition-colors">
                            <i class="fab fa-youtube text-white"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Column 2 -->
                <div>
                    <h3 class="text-lg md:text-xl font-bold mb-6 text-white">Quick Links</h3>
                    <ul class="space-y-2 md:space-y-3">
                        <li><a href="index.php" class="text-gray-400 hover:text-accent transition-colors text-sm md:text-base">Home</a></li>
                        <li><a href="index.php#lotteries" class="text-gray-400 hover:text-accent transition-colors text-sm md:text-base">Lotteries</a></li>
                        <li><a href="index.php#jackpot" class="text-gray-400 hover:text-accent transition-colors text-sm md:text-base">Jackpot</a></li>
                        <li><a href="index.php#winners" class="text-gray-400 hover:text-accent transition-colors text-sm md:text-base">Winners</a></li>
                        <li><a href="index.php#how-to-play" class="text-gray-400 hover:text-accent transition-colors text-sm md:text-base">How to Play</a></li>
                    </ul>
                </div>
                
                <!-- Column 3 -->
                <div>
                    <h3 class="text-lg md:text-xl font-bold mb-6 text-white">Account</h3>
                    <ul class="space-y-2 md:space-y-3">
                        <li><a href="login.php" class="text-gray-400 hover:text-accent transition-colors text-sm md:text-base">Login</a></li>
                        <li><a href="signup.php" class="text-gray-400 hover:text-accent transition-colors text-sm md:text-base">Sign Up</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-accent transition-colors text-sm md:text-base">My Tickets</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-accent transition-colors text-sm md:text-base">My Winnings</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-accent transition-colors text-sm md:text-base">Account Settings</a></li>
                    </ul>
                </div>
                
                <!-- Column 4 -->
                <div>
                    <h3 class="text-lg md:text-xl font-bold mb-6 text-white">Contact Info</h3>
                    <ul class="space-y-3 md:space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt text-accent mt-1 mr-3"></i>
                            <span class="text-gray-400 text-sm md:text-base">123 Lottery Street, Dhaka 1212</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone text-accent mr-3"></i>
                            <span class="text-gray-400 text-sm md:text-base">+880 1700-123456</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope text-accent mr-3"></i>
                            <span class="text-gray-400 text-sm md:text-base">support@lottoelite.com</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-clock text-accent mr-3"></i>
                            <span class="text-gray-400 text-sm md:text-base">24/7 Customer Support</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Copyright -->
            <div class="pt-6 md:pt-8 border-t border-gray-800 text-center">
                <p class="text-gray-500 text-sm md:text-base">© 2023 LottoElite. All rights reserved. | <a href="#" class="text-gray-500 hover:text-accent transition-colors">Terms & Conditions</a> | <a href="#" class="text-gray-500 hover:text-accent transition-colors">Privacy Policy</a></p>
                <p class="text-gray-600 text-xs mt-2">Must be 18+ to play. Play responsibly.</p>
            </div>
        </div>
    </footer>

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

        // Check authentication state
        auth.onAuthStateChanged((user) => {
            if (user) {
                // User is signed in
                updateHeaderForLoggedInUser(user);
            } else {
                // User is signed out
                updateHeaderForLoggedOutUser();
            }
        });

        function updateHeaderForLoggedInUser(user) {
            // Update desktop login button
            const desktopLoginBtn = document.querySelector('#desktopAuthButtons .login-btn');
            if (desktopLoginBtn) {
                const userName = user.displayName || user.email.split('@')[0];
                desktopLoginBtn.innerHTML = `<i class="fas fa-user mr-2"></i>${userName}`;
                desktopLoginBtn.href = "#";
                desktopLoginBtn.onclick = function(e) {
                    e.preventDefault();
                    showUserMenu(user);
                };
                
                // Add desktop logout button if not exists
                if (!document.querySelector('#desktopAuthButtons .logout-btn')) {
                    const logoutBtn = document.createElement('a');
                    logoutBtn.href = "#";
                    logoutBtn.className = "logout-btn bg-red-600 text-white px-4 py-2 rounded-full font-semibold hover:bg-red-700 transition-colors";
                    logoutBtn.innerHTML = '<i class="fas fa-sign-out-alt mr-2"></i>Logout';
                    logoutBtn.onclick = function(e) {
                        e.preventDefault();
                        logoutUser();
                    };
                    document.querySelector('#desktopAuthButtons').appendChild(logoutBtn);
                    
                    // Hide signup button
                    const signupBtn = document.querySelector('#desktopAuthButtons .signup-btn');
                    if (signupBtn) signupBtn.style.display = 'none';
                }
            }
            
            // Update mobile login button
            const mobileLoginBtn = document.querySelector('#mobileAuthButtons .login-btn');
            if (mobileLoginBtn) {
                const userName = user.displayName || user.email.split('@')[0];
                mobileLoginBtn.innerHTML = `<i class="fas fa-user mr-2"></i>${userName}`;
                mobileLoginBtn.href = "#";
                mobileLoginBtn.onclick = function(e) {
                    e.preventDefault();
                    showUserMenu(user);
                    // Close mobile menu
                    document.getElementById('mobile-menu').classList.add('animate-slide-out-right');
                    setTimeout(() => {
                        document.getElementById('mobile-menu').classList.add('hidden');
                        document.getElementById('mobile-menu').classList.remove('animate-slide-out-right');
                    }, 300);
                };
                
                // Update mobile signup button to logout
                const mobileSignupBtn = document.querySelector('#mobileAuthButtons .register-btn');
                if (mobileSignupBtn) {
                    mobileSignupBtn.innerHTML = '<i class="fas fa-sign-out-alt mr-2"></i>Logout';
                    mobileSignupBtn.href = "#";
                    mobileSignupBtn.onclick = function(e) {
                        e.preventDefault();
                        logoutUser();
                        // Close mobile menu
                        document.getElementById('mobile-menu').classList.add('animate-slide-out-right');
                        setTimeout(() => {
                            document.getElementById('mobile-menu').classList.add('hidden');
                            document.getElementById('mobile-menu').classList.remove('animate-slide-out-right');
                        }, 300);
                    };
                }
            }
        }

        function updateHeaderForLoggedOutUser() {
            // Reset desktop buttons
            const desktopLoginBtn = document.querySelector('#desktopAuthButtons .login-btn');
            if (desktopLoginBtn) {
                desktopLoginBtn.innerHTML = '<i class="fas fa-user mr-2"></i>Login';
                desktopLoginBtn.href = "login.php";
                desktopLoginBtn.onclick = null;
                
                // Show signup button
                const signupBtn = document.querySelector('#desktopAuthButtons .signup-btn');
                if (signupBtn) signupBtn.style.display = 'block';
            }
            
            // Remove desktop logout button
            const desktopLogoutBtn = document.querySelector('#desktopAuthButtons .logout-btn');
            if (desktopLogoutBtn) {
                desktopLogoutBtn.remove();
            }
            
            // Reset mobile buttons
            const mobileLoginBtn = document.querySelector('#mobileAuthButtons .login-btn');
            if (mobileLoginBtn) {
                mobileLoginBtn.innerHTML = '<i class="fas fa-user mr-2"></i> Login to Account';
                mobileLoginBtn.href = "login.php";
                mobileLoginBtn.onclick = null;
            }
            
            const mobileSignupBtn = document.querySelector('#mobileAuthButtons .register-btn');
            if (mobileSignupBtn) {
                mobileSignupBtn.innerHTML = '<i class="fas fa-user-plus mr-2"></i> Create Account';
                mobileSignupBtn.href = "signup.php";
                mobileSignupBtn.onclick = null;
            }
        }

        function showUserMenu(user) {
            // Remove existing menu
            const existingMenu = document.querySelector('.user-menu-popup');
            if (existingMenu) {
                existingMenu.remove();
                return;
            }
            
            // Create user menu
            const menuHtml = `
                <div class="user-menu-popup fixed top-20 right-4 bg-gray-800 rounded-xl p-4 min-w-64 shadow-lg z-50 border border-gray-700">
                    <div class="mb-3 pb-3 border-b border-gray-700">
                        <p class="text-white font-semibold">${user.displayName || 'User'}</p>
                        <p class="text-gray-400 text-sm">${user.email}</p>
                        ${user.emailVerified ? 
                            '<span class="text-green-500 text-xs mt-1 inline-block"><i class="fas fa-check-circle mr-1"></i>Verified</span>' : 
                            '<span class="text-yellow-500 text-xs mt-1 inline-block"><i class="fas fa-exclamation-circle mr-1"></i>Not Verified</span>'
                        }
                    </div>
                    <a href="profile.php" class="block text-gray-300 hover:text-white py-2 px-2 rounded hover:bg-gray-700">
                        <i class="fas fa-user mr-2"></i>Profile
                    </a>
                    <a href="my-tickets.php" class="block text-gray-300 hover:text-white py-2 px-2 rounded hover:bg-gray-700">
                        <i class="fas fa-ticket-alt mr-2"></i>My Tickets
                    </a>
                    <a href="my-winnings.php" class="block text-gray-300 hover:text-white py-2 px-2 rounded hover:bg-gray-700">
                        <i class="fas fa-trophy mr-2"></i>My Winnings
                    </a>
                    <div class="pt-2 mt-2 border-t border-gray-700">
                        <button onclick="logoutUser()" class="w-full text-red-400 hover:text-red-300 py-2 px-2 rounded hover:bg-red-900/20 text-left">
                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                        </button>
                    </div>
                </div>
            `;
            
            const menuDiv = document.createElement('div');
            menuDiv.innerHTML = menuHtml;
            document.body.appendChild(menuDiv);
            
            // Close menu when clicking outside
            setTimeout(() => {
                const closeMenu = function(e) {
                    if (!e.target.closest('.user-menu-popup') && 
                        !e.target.closest('#desktopAuthButtons .login-btn') &&
                        !e.target.closest('#mobileAuthButtons .login-btn')) {
                        menuDiv.remove();
                        document.removeEventListener('click', closeMenu);
                    }
                };
                document.addEventListener('click', closeMenu);
            }, 100);
        }

        function logoutUser() {
            auth.signOut().then(() => {
                alert("Logged out successfully!");
                localStorage.removeItem('lottoUser');
                window.location.reload();
            }).catch((error) => {
                alert("Logout error: " + error.message);
            });
        }

        // Buy Ticket Function
        function buyTicket(lotteryType, ticketNumber, prizeAmount) {
            const user = auth.currentUser;
            
            if (!user) {
                alert("Please login first to purchase tickets!");
                window.location.href = 'login.php';
                return;
            }
            
            if (!user.emailVerified) {
                alert("Please verify your email before purchasing tickets!");
                return;
            }
            
            const ticketPrice = lotteryType === 'silver' ? 50 : 
                              lotteryType === 'gold' ? 100 : 30;
            
            const confirmPurchase = confirm(
                `Confirm Purchase:\n\n` +
                `Lottery: ${lotteryType.charAt(0).toUpperCase() + lotteryType.slice(1)} Lottery\n` +
                `Ticket: ${ticketNumber}\n` +
                `Ticket Price: ৳${ticketPrice}\n` +
                `Potential Prize: ৳${prizeAmount}\n\n` +
                `Do you want to proceed with the purchase?`
            );
            
            if (confirmPurchase) {
                alert(`✅ Ticket purchased successfully!\n\n` +
                      `Ticket: ${ticketNumber}\n` +
                      `Price: ৳${ticketPrice}\n\n` +
                      `Check your email for confirmation and ticket details.`);
                
                // Here you would typically make an API call to save the purchase
                // saveTicketPurchase(user.uid, lotteryType, ticketNumber, ticketPrice);
            }
        }

        // Check localStorage for user on page load
        document.addEventListener('DOMContentLoaded', function() {
            const savedUser = localStorage.getItem('lottoUser');
            if (savedUser) {
                const user = JSON.parse(savedUser);
                updateHeaderForLoggedInUser(user);
            }
            
            // Mobile Menu Toggle
            const menuToggle = document.getElementById('menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');
            const menuClose = document.getElementById('menu-close');
            const menuOverlay = document.getElementById('menu-overlay');
            
            if (menuToggle && mobileMenu) {
                menuToggle.addEventListener('click', () => {
                    mobileMenu.classList.remove('hidden');
                    mobileMenu.classList.add('animate-slide-in-right');
                });
                
                menuClose.addEventListener('click', () => {
                    mobileMenu.classList.add('animate-slide-out-right');
                    setTimeout(() => {
                        mobileMenu.classList.add('hidden');
                        mobileMenu.classList.remove('animate-slide-out-right');
                    }, 300);
                });
                
                menuOverlay.addEventListener('click', () => {
                    mobileMenu.classList.add('animate-slide-out-right');
                    setTimeout(() => {
                        mobileMenu.classList.add('hidden');
                        mobileMenu.classList.remove('animate-slide-out-right');
                    }, 300);
                });
                
                // Close menu when clicking on menu links
                document.querySelectorAll('#mobile-menu a').forEach(link => {
                    link.addEventListener('click', () => {
                        mobileMenu.classList.add('animate-slide-out-right');
                        setTimeout(() => {
                            mobileMenu.classList.add('hidden');
                            mobileMenu.classList.remove('animate-slide-out-right');
                        }, 300);
                    });
                });
            }
        });
    </script>
</body>
</html>