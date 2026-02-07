<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LottoElite - Premium Lottery Platform</title>
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
                        'gradient-accent': 'linear-gradient(135deg, #FFB400 0%, #FFD166 100%)',
                        'gradient-dark': 'linear-gradient(135deg, #0F172A 0%, #1E293B 100%)',
                        'gradient-purple': 'linear-gradient(135deg, #8B5CF6 0%, #A78BFA 100%)',
                        'gradient-gold': 'linear-gradient(135deg, #FFB400 0%, #FF5A5F 50%, #FFB400 100%)',
                    },
                    boxShadow: {
                        'card': '0 10px 30px rgba(0, 0, 0, 0.2)',
                        'card-hover': '0 20px 40px rgba(0, 0, 0, 0.3)',
                        'button': '0 5px 15px rgba(255, 90, 95, 0.3)',
                        'button-hover': '0 8px 25px rgba(255, 90, 95, 0.4)',
                        'glow': '0 0 20px rgba(255, 180, 0, 0.3)',
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-glow': 'pulse-glow 2s ease-in-out infinite',
                        'slide-in-right': 'slide-in-right 0.3s ease-out',
                        'slide-out-right': 'slide-out-right 0.3s ease-out',
                        'fade-in': 'fade-in 0.3s ease-out',
                    },
                    keyframes: {
                        'float': {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        'pulse-glow': {
                            '0%, 100%': { opacity: 1 },
                            '50%': { opacity: 0.7 },
                        },
                        'slide-in-right': {
                            '0%': { transform: 'translateX(100%)' },
                            '100%': { transform: 'translateX(0)' },
                        },
                        'slide-out-right': {
                            '0%': { transform: 'translateX(0)' },
                            '100%': { transform: 'translateX(100%)' },
                        },
                        'fade-in': {
                            '0%': { opacity: 0 },
                            '100%': { opacity: 1 },
                        },
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: #0F172A;
        }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #FF5A5F, #FFB400);
            border-radius: 5px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #FF8A9E, #FFD166);
        }
        
        /* Custom styles */
        .glass-effect {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .text-gradient {
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .mobile-menu {
            transition: all 0.3s ease;
            overflow: hidden;
        }
        
        /* Hide scrollbar for mobile menu */
        .mobile-menu::-webkit-scrollbar {
            display: none;
        }
        
        /* Overlay for mobile menu */
        .menu-overlay {
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(5px);
        }
        
        /* Ripple effect animation */
        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
        
        /* Smooth scrolling for the whole page */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="font-inter bg-dark text-light">
    <!-- Header/Navigation -->
    <header class="sticky top-0 z-50 glass-effect shadow-lg">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo - Left Side -->
                <a href="index.php" class="flex items-center space-x-3 hover:opacity-90 transition-opacity">
                    <div class="w-12 h-12 rounded-xl bg-gradient-primary flex items-center justify-center text-white">
                        <i class="fas fa-crown text-xl"></i>
                    </div>
                    <div class="hidden md:block">
                        <h1 class="text-2xl font-bold bg-gradient-primary text-gradient">Lotto<span class="text-accent">Elite</span></h1>
                        <p class="text-xs text-gray-400">Premium Lottery Platform</p>
                    </div>
                </a>
                
                <!-- Desktop Navigation (Hidden on Mobile) -->
                <nav class="hidden lg:flex items-center space-x-6">
                    <a href="#home" class="text-gray-300 hover:text-accent transition-colors font-medium">Home</a>
                    <a href="#lotteries" class="text-gray-300 hover:text-accent transition-colors font-medium">Lotteries</a>
                    <a href="#jackpot" class="text-gray-300 hover:text-accent transition-colors font-medium">Jackpot</a>
                    <a href="#winners" class="text-gray-300 hover:text-accent transition-colors font-medium">Winners</a>
                    <a href="#how-to-play" class="text-gray-300 hover:text-accent transition-colors font-medium">How to Play</a>
                </nav>
                
                <!-- Desktop Login (Hidden on Mobile) -->
                <div class="hidden lg:flex items-center space-x-4">
                    <a href="login.php" class="bg-gradient-primary text-white px-6 py-2 rounded-full font-semibold hover:shadow-button-hover transition-all shadow-button">
                        <i class="fas fa-user mr-2"></i>Login
                    </a>
                    <a href="signup.php" class="glass-effect text-white px-6 py-2 rounded-full font-semibold hover:bg-white/10 transition-colors">
                        <i class="fas fa-user-plus mr-2"></i>Sign Up
                    </a>
                </div>
                
                <!-- Hamburger Menu Button (Mobile Only) -->
                <button id="menu-toggle" class="lg:hidden text-gray-300 hover:text-accent transition-colors">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Menu (Hidden by default) - Now comes from RIGHT side -->
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
                            <i class="fas fa-crown text-xl"></i>
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
                    <a href="#home" class="flex items-center justify-between p-4 rounded-xl hover:bg-gray-800 transition-colors group">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-lg bg-gradient-primary/20 flex items-center justify-center group-hover:bg-gradient-primary transition-colors">
                                <i class="fas fa-home text-primary group-hover:text-white"></i>
                            </div>
                            <span class="font-medium">Home</span>
                        </div>
                        <i class="fas fa-chevron-left text-gray-500"></i>
                    </a>
                    
                    <a href="#lotteries" class="flex items-center justify-between p-4 rounded-xl hover:bg-gray-800 transition-colors group">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-lg bg-gradient-secondary/20 flex items-center justify-center group-hover:bg-gradient-secondary transition-colors">
                                <i class="fas fa-ticket-alt text-secondary group-hover:text-white"></i>
                            </div>
                            <span class="font-medium">Lotteries</span>
                        </div>
                        <i class="fas fa-chevron-left text-gray-500"></i>
                    </a>
                    
                    <a href="#jackpot" class="flex items-center justify-between p-4 rounded-xl hover:bg-gray-800 transition-colors group">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-lg bg-gradient-accent/20 flex items-center justify-center group-hover:bg-gradient-accent transition-colors">
                                <i class="fas fa-gem text-accent group-hover:text-dark"></i>
                            </div>
                            <span class="font-medium">Jackpot</span>
                        </div>
                        <i class="fas fa-chevron-left text-gray-500"></i>
                    </a>
                    
                    <a href="#winners" class="flex items-center justify-between p-4 rounded-xl hover:bg-gray-800 transition-colors group">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-lg bg-gradient-purple/20 flex items-center justify-center group-hover:bg-gradient-purple transition-colors">
                                <i class="fas fa-trophy text-purple group-hover:text-white"></i>
                            </div>
                            <span class="font-medium">Winners</span>
                        </div>
                        <i class="fas fa-chevron-left text-gray-500"></i>
                    </a>
                    
                    <a href="#how-to-play" class="flex items-center justify-between p-4 rounded-xl hover:bg-gray-800 transition-colors group">
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
                <div class="mb-8">
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

    <!-- Hero Section -->
    <section id="home" class="relative overflow-hidden pt-16 pb-32">
        <!-- Background effects -->
        <div class="absolute inset-0 bg-gradient-dark"></div>
        <div class="absolute top-1/4 left-1/4 w-72 h-72 bg-purple/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-primary/10 rounded-full blur-3xl"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-7xl font-black mb-6 bg-gradient-gold text-gradient leading-tight">
                    Win Big With <span class="block">LottoElite</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-300 mb-10 max-w-2xl mx-auto">
                    Join millions of players worldwide. The biggest jackpots, fairest draws, and instant payouts. Your dream life is just a ticket away!
                </p>
                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                    <a href="signup.php" class="bg-gradient-accent text-dark px-8 py-4 rounded-full font-bold text-lg hover:scale-105 transition-transform shadow-glow buy-ticket-btn inline-block text-center">
                        <i class="fas fa-ticket-alt mr-2"></i> Get Started Free
                    </a>
                    <a href="#how-to-play" class="glass-effect px-8 py-4 rounded-full font-semibold text-lg hover:bg-white/10 transition-colors how-to-play-btn inline-block text-center">
                        <i class="fas fa-play-circle mr-2"></i> How to Play
                    </a>
                </div>
            </div>
            
            <!-- Stats Section -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 mt-16 max-w-4xl mx-auto">
                <div class="glass-effect rounded-2xl p-4 md:p-6 text-center">
                    <div class="text-2xl md:text-3xl font-bold text-accent mb-2">৳ 2.5B+</div>
                    <div class="text-gray-400 text-sm md:text-base">Total Won</div>
                </div>
                <div class="glass-effect rounded-2xl p-4 md:p-6 text-center">
                    <div class="text-2xl md:text-3xl font-bold text-secondary mb-2">500K+</div>
                    <div class="text-gray-400 text-sm md:text-base">Happy Winners</div>
                </div>
                <div class="glass-effect rounded-2xl p-4 md:p-6 text-center">
                    <div class="text-2xl md:text-3xl font-bold text-primary mb-2">99.8%</div>
                    <div class="text-gray-400 text-sm md:text-base">Payout Rate</div>
                </div>
                <div class="glass-effect rounded-2xl p-4 md:p-6 text-center">
                    <div class="text-2xl md:text-3xl font-bold text-purple mb-2">24/7</div>
                    <div class="text-gray-400 text-sm md:text-base">Support</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Lotteries Section -->
    <section id="lotteries" class="py-16 md:py-20 bg-gradient-dark">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-3xl md:text-5xl font-bold mb-4 bg-gradient-primary text-gradient">Choose Your Lottery</h2>
                <p class="text-lg md:text-xl text-gray-400 max-w-2xl mx-auto">Select from our variety of lottery games with different jackpots and odds</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                <!-- Card 1 - Bronze Lottery -->
                <div class="lottery-card glass-effect rounded-2xl overflow-hidden hover:shadow-card-hover transition-all duration-300">
                    <div class="bg-gradient-to-r from-amber-700 to-amber-900 p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl md:text-2xl font-bold text-white">Bronze Lottery</h3>
                            <div class="card-icon w-12 h-12 md:w-14 md:h-14 rounded-full bg-white/20 flex items-center justify-center">
                                <i class="fas fa-award text-white text-xl md:text-2xl"></i>
                            </div>
                        </div>
                        <div class="text-3xl md:text-4xl font-black text-white mb-2">৳ 30</div>
                        <p class="text-white/80">Per Ticket</p>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-3 md:space-y-4 mb-6 md:mb-8">
                            <li class="flex items-center">
                                <div class="w-6 h-6 md:w-8 md:h-8 rounded-full bg-green-500/20 flex items-center justify-center mr-3">
                                    <i class="fas fa-check text-green-500 text-xs md:text-sm"></i>
                                </div>
                                <span class="text-sm md:text-base">Prize: <span class="font-bold text-amber-400">৳ 30,000</span></span>
                            </li>
                            <li class="flex items-center">
                                <div class="w-6 h-6 md:w-8 md:h-8 rounded-full bg-green-500/20 flex items-center justify-center mr-3">
                                    <i class="fas fa-check text-green-500 text-xs md:text-sm"></i>
                                </div>
                                <span class="text-sm md:text-base">Draw Every Friday</span>
                            </li>
                            <li class="flex items-center">
                                <div class="w-6 h-6 md:w-8 md:h-8 rounded-full bg-green-500/20 flex items-center justify-center mr-3">
                                    <i class="fas fa-check text-green-500 text-xs md:text-sm"></i>
                                </div>
                                <span class="text-sm md:text-base">10 Winner Prizes</span>
                            </li>
                            <li class="flex items-center">
                                <div class="w-6 h-6 md:w-8 md:h-8 rounded-full bg-green-500/20 flex items-center justify-center mr-3">
                                    <i class="fas fa-check text-green-500 text-xs md:text-sm"></i>
                                </div>
                                <span class="text-sm md:text-base">Odds: 1 in 1,000</span>
                            </li>
                        </ul>
                       <a href="bronze-lottery.php" class="block w-full bg-gradient-to-r from-amber-700 to-amber-900 text-white py-3 rounded-xl font-bold hover:opacity-90 transition-opacity buy-weekly-btn text-center">
    <i class="fas fa-shopping-cart mr-2"></i> Buy Bronze Ticket
</a>
                    </div>
                </div>
                
                <!-- Card 2 - Silver Lottery (Featured) -->
                <div class="lottery-card glass-effect rounded-2xl overflow-hidden hover:shadow-card-hover transition-all duration-300 transform md:-translate-y-4 border-2 border-gray-300/30">
                    <div class="relative">
                        <div class="absolute -top-3 left-1/2 transform -translate-x-1/2">
                            <div class="bg-gradient-to-r from-gray-300 to-gray-500 text-dark px-3 py-1 rounded-full font-bold text-xs md:text-sm">
                                MOST POPULAR
                            </div>
                        </div>
                        <div class="bg-gradient-to-r from-gray-500 to-gray-700 p-6">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-xl md:text-2xl font-bold text-white">Silver Lottery</h3>
                                <div class="card-icon w-12 h-12 md:w-14 md:h-14 rounded-full bg-white/20 flex items-center justify-center">
                                    <i class="fas fa-medal text-white text-xl md:text-2xl"></i>
                                </div>
                            </div>
                            <div class="text-3xl md:text-4xl font-black text-white mb-2">৳ 50</div>
                            <p class="text-white/80">Per Ticket</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-3 md:space-y-4 mb-6 md:mb-8">
                            <li class="flex items-center">
                                <div class="w-6 h-6 md:w-8 md:h-8 rounded-full bg-green-500/20 flex items-center justify-center mr-3">
                                    <i class="fas fa-check text-green-500 text-xs md:text-sm"></i>
                                </div>
                                <span class="text-sm md:text-base">Prize: <span class="font-bold text-gray-300">৳ 50,000</span></span>
                            </li>
                            <li class="flex items-center">
                                <div class="w-6 h-6 md:w-8 md:h-8 rounded-full bg-green-500/20 flex items-center justify-center mr-3">
                                    <i class="fas fa-check text-green-500 text-xs md:text-sm"></i>
                                </div>
                                <span class="text-sm md:text-base">Weekly Draw</span>
                            </li>
                            <li class="flex items-center">
                                <div class="w-6 h-6 md:w-8 md:h-8 rounded-full bg-green-500/20 flex items-center justify-center mr-3">
                                    <i class="fas fa-check text-green-500 text-xs md:text-sm"></i>
                                </div>
                                <span class="text-sm md:text-base">15 Winner Prizes</span>
                            </li>
                            <li class="flex items-center">
                                <div class="w-6 h-6 md:w-8 md:h-8 rounded-full bg-green-500/20 flex items-center justify-center mr-3">
                                    <i class="fas fa-check text-green-500 text-xs md:text-sm"></i>
                                </div>
                                <span class="text-sm md:text-base">Odds: 1 in 1,500</span>
                            </li>
                        </ul>
                     <!-- Silver Lottery Card এর Buy Button -->
<a href="silver-lottery.php" class="block w-full bg-gradient-to-r from-gray-500 to-gray-700 text-white py-3 rounded-xl font-bold hover:opacity-90 transition-opacity buy-mega-btn text-center">
    <i class="fas fa-bolt mr-2"></i> Buy Silver Ticket
</a>
                    </div>
                </div>
                
                <!-- Card 3 - Gold Lottery -->
                <div class="lottery-card glass-effect rounded-2xl overflow-hidden hover:shadow-card-hover transition-all duration-300">
                    <div class="bg-gradient-to-r from-yellow-600 to-amber-700 p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl md:text-2xl font-bold text-white">Gold Lottery</h3>
                            <div class="card-icon w-12 h-12 md:w-14 md:h-14 rounded-full bg-white/20 flex items-center justify-center">
                                <i class="fas fa-crown text-white text-xl md:text-2xl"></i>
                            </div>
                        </div>
                        <div class="text-3xl md:text-4xl font-black text-white mb-2">৳ 100</div>
                        <p class="text-white/80">Per Ticket</p>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-3 md:space-y-4 mb-6 md:mb-8">
                            <li class="flex items-center">
                                <div class="w-6 h-6 md:w-8 md:h-8 rounded-full bg-green-500/20 flex items-center justify-center mr-3">
                                    <i class="fas fa-check text-green-500 text-xs md:text-sm"></i>
                                </div>
                                <span class="text-sm md:text-base">Prize: <span class="font-bold text-yellow-400">৳ 1,00,000</span></span>
                            </li>
                            <li class="flex items-center">
                                <div class="w-6 h-6 md:w-8 md:h-8 rounded-full bg-green-500/20 flex items-center justify-center mr-3">
                                    <i class="fas fa-check text-green-500 text-xs md:text-sm"></i>
                                </div>
                                <span class="text-sm md:text-base">Monthly Draw</span>
                            </li>
                            <li class="flex items-center">
                                <div class="w-6 h-6 md:w-8 md:h-8 rounded-full bg-green-500/20 flex items-center justify-center mr-3">
                                    <i class="fas fa-check text-green-500 text-xs md:text-sm"></i>
                                </div>
                                <span class="text-sm md:text-base">25 Winner Prizes</span>
                            </li>
                            <li class="flex items-center">
                                <div class="w-6 h-6 md:w-8 md:h-8 rounded-full bg-green-500/20 flex items-center justify-center mr-3">
                                    <i class="fas fa-check text-green-500 text-xs md:text-sm"></i>
                                </div>
                                <span class="text-sm md:text-base">Odds: 1 in 2,000</span>
                            </li>
                        </ul>
                      <a href="gold-lottery.php" class="block w-full bg-gradient-to-r from-yellow-600 to-amber-700 text-white py-3 rounded-xl font-bold hover:opacity-90 transition-opacity buy-special-btn text-center">
    <i class="fas fa-gift mr-2"></i> Buy Gold Ticket
</a>
                    </div>
                </div>
            </div>
            
            <!-- Login CTA -->
            <div class="text-center mt-12">
                <p class="text-gray-400 mb-4">Already have an account? <a href="login.php" class="text-primary hover:text-primary/80 font-medium">Login to buy tickets</a></p>
            </div>
        </div>
    </section>

    <!-- Jackpot Section -->
    <section id="jackpot" class="py-16 md:py-20 bg-gradient-dark relative overflow-hidden">
        <div class="absolute top-10 right-10 w-64 h-64 bg-accent/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 left-10 w-80 h-80 bg-purple/10 rounded-full blur-3xl"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-3xl md:text-5xl font-bold mb-4 bg-gradient-gold text-gradient">Current Jackpot</h2>
                <p class="text-lg md:text-xl text-gray-400 max-w-2xl mx-auto">The biggest prize pool ever! Don't miss your chance to become a millionaire</p>
            </div>
            
            <div class="glass-effect rounded-3xl p-8 md:p-12 max-w-4xl mx-auto border border-accent/20">
                <div class="flex flex-col md:flex-row items-center justify-between mb-10">
                    <div class="mb-8 md:mb-0 text-center md:text-left">
                        <div class="text-sm md:text-base text-gray-400 mb-2">Current Prize Pool</div>
                        <div class="text-4xl md:text-6xl font-black text-accent mb-2 animate-pulse">৳ 5,00,00,000</div>
                        <div class="text-lg md:text-xl text-gray-300">Gold Lottery Mega Jackpot</div>
                    </div>
                    
                    <div class="bg-gradient-dark rounded-2xl p-6 text-center border border-accent/20">
                        <div class="text-sm md:text-base text-gray-400 mb-2">Next Draw In</div>
                        <div class="flex space-x-2 md:space-x-4 justify-center mb-4">
                            <div class="text-center">
                                <div class="bg-dark rounded-xl p-3 md:p-4 w-16 md:w-20">
                                    <div id="days" class="text-2xl md:text-3xl font-bold text-white">07</div>
                                </div>
                                <div class="text-xs md:text-sm text-gray-400 mt-2">Days</div>
                            </div>
                            <div class="text-2xl md:text-3xl font-bold text-accent pt-3 md:pt-4">:</div>
                            <div class="text-center">
                                <div class="bg-dark rounded-xl p-3 md:p-4 w-16 md:w-20">
                                    <div id="hours" class="text-2xl md:text-3xl font-bold text-white">18</div>
                                </div>
                                <div class="text-xs md:text-sm text-gray-400 mt-2">Hours</div>
                            </div>
                            <div class="text-2xl md:text-3xl font-bold text-accent pt-3 md:pt-4">:</div>
                            <div class="text-center">
                                <div class="bg-dark rounded-xl p-3 md:p-4 w-16 md:w-20">
                                    <div id="minutes" class="text-2xl md:text-3xl font-bold text-white">42</div>
                                </div>
                                <div class="text-xs md:text-sm text-gray-400 mt-2">Minutes</div>
                            </div>
                            <div class="text-2xl md:text-3xl font-bold text-accent pt-3 md:pt-4">:</div>
                            <div class="text-center">
                                <div class="bg-dark rounded-xl p-3 md:p-4 w-16 md:w-20">
                                    <div id="seconds" class="text-2xl md:text-3xl font-bold text-white">15</div>
                                </div>
                                <div class="text-xs md:text-sm text-gray-400 mt-2">Seconds</div>
                            </div>
                        </div>
                        <div class="text-sm text-gray-500">Draw Date: December 31, 2023</div>
                    </div>
                </div>
                
                <div class="mb-8">
                    <h3 class="text-xl md:text-2xl font-bold mb-4 text-white">How to Win</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
                        <div class="bg-card rounded-xl p-4 md:p-6 text-center">
                            <div class="w-12 h-12 md:w-16 md:h-16 rounded-full bg-gradient-primary flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-ticket-alt text-white text-xl md:text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-white mb-2">1. Buy Ticket</h4>
                            <p class="text-gray-400 text-sm md:text-base">Purchase your Gold Lottery ticket for only ৳100</p>
                        </div>
                        <div class="bg-card rounded-xl p-4 md:p-6 text-center">
                            <div class="w-12 h-12 md:w-16 md:h-16 rounded-full bg-gradient-secondary flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-calendar-day text-white text-xl md:text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-white mb-2">2. Wait for Draw</h4>
                            <p class="text-gray-400 text-sm md:text-base">Monthly draw happens on the last day of each month</p>
                        </div>
                        <div class="bg-card rounded-xl p-4 md:p-6 text-center">
                            <div class="w-12 h-12 md:w-16 md:h-16 rounded-full bg-gradient-accent flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-trophy text-dark text-xl md:text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-white mb-2">3. Claim Prize</h4>
                            <p class="text-gray-400 text-sm md:text-base">If you win, claim your prize within 30 days</p>
                        </div>
                    </div>
                </div>
                
                <div class="text-center">
                    <a href="signup.php" class="inline-block bg-gradient-gold text-dark px-8 py-4 rounded-full font-bold text-lg hover:scale-105 transition-transform shadow-glow">
                        <i class="fas fa-crown mr-2"></i> Join Now to Play
                    </a>
                    <p class="text-gray-500 text-sm mt-4">Already registered? <a href="login.php" class="text-primary hover:text-primary/80">Login here</a></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Winners Section -->
    <section id="winners" class="py-16 md:py-20 bg-dark">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-3xl md:text-5xl font-bold mb-4 bg-gradient-primary text-gradient">Recent Winners</h2>
                <p class="text-lg md:text-xl text-gray-400 max-w-2xl mx-auto">Meet our lucky winners who changed their lives with LottoElite</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
                <!-- Winner 1 -->
                <div class="glass-effect rounded-2xl p-6 text-center hover:shadow-card-hover transition-all duration-300">
                    <div class="w-20 h-20 md:w-24 md:h-24 rounded-full bg-gradient-primary flex items-center justify-center mx-auto mb-4">
                        <span class="text-white text-xl md:text-2xl font-bold">MR</span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Mohammad Rahman</h3>
                    <div class="text-accent text-lg font-bold mb-2">৳ 50,00,000</div>
                    <p class="text-gray-400 text-sm mb-4">Gold Lottery Winner</p>
                    <div class="text-gray-500 text-sm italic">"I couldn't believe when I won! LottoElite changed my life completely."</div>
                </div>
                
                <!-- Winner 2 -->
                <div class="glass-effect rounded-2xl p-6 text-center hover:shadow-card-hover transition-all duration-300">
                    <div class="w-20 h-20 md:w-24 md:h-24 rounded-full bg-gradient-secondary flex items-center justify-center mx-auto mb-4">
                        <span class="text-white text-xl md:text-2xl font-bold">SA</span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Sadia Ahmed</h3>
                    <div class="text-accent text-lg font-bold mb-2">৳ 25,00,000</div>
                    <p class="text-gray-400 text-sm mb-4">Silver Lottery Winner</p>
                    <div class="text-gray-500 text-sm italic">"With this money, I started my own business. Thank you LottoElite!"</div>
                </div>
                
                <!-- Winner 3 -->
                <div class="glass-effect rounded-2xl p-6 text-center hover:shadow-card-hover transition-all duration-300">
                    <div class="w-20 h-20 md:w-24 md:h-24 rounded-full bg-gradient-accent flex items-center justify-center mx-auto mb-4">
                        <span class="text-dark text-xl md:text-2xl font-bold">KH</span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Kamal Hossain</h3>
                    <div class="text-accent text-lg font-bold mb-2">৳ 10,00,000</div>
                    <p class="text-gray-400 text-sm mb-4">Bronze Lottery Winner</p>
                    <div class="text-gray-500 text-sm italic">"I've been playing for 3 months and finally won! The process was so easy."</div>
                </div>
                
                <!-- Winner 4 -->
                <div class="glass-effect rounded-2xl p-6 text-center hover:shadow-card-hover transition-all duration-300">
                    <div class="w-20 h-20 md:w-24 md:h-24 rounded-full bg-gradient-purple flex items-center justify-center mx-auto mb-4">
                        <span class="text-white text-xl md:text-2xl font-bold">FA</span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Fatima Akter</h3>
                    <div class="text-accent text-lg font-bold mb-2">৳ 5,00,000</div>
                    <p class="text-gray-400 text-sm mb-4">Special Draw Winner</p>
                    <div class="text-gray-500 text-sm italic">"I won on my first try! The customer service helped me claim my prize easily."</div>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <a href="signup.php" class="inline-block glass-effect text-white px-8 py-3 rounded-full font-semibold hover:bg-white/10 transition-colors">
                    <i class="fas fa-trophy mr-2"></i> Join & Be Next Winner
                </a>
                <p class="text-gray-500 text-sm mt-4">Have an account? <a href="login.php" class="text-primary hover:text-primary/80">Login to check your tickets</a></p>
            </div>
        </div>
    </section>

    <!-- How to Play Section -->
    <section id="how-to-play" class="py-16 md:py-20 bg-gradient-dark">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-3xl md:text-5xl font-bold mb-4 bg-gradient-secondary text-gradient">How to Play</h2>
                <p class="text-lg md:text-xl text-gray-400 max-w-2xl mx-auto">Follow these simple steps to participate and win big with LottoElite</p>
            </div>
            
            <div class="max-w-4xl mx-auto">
                <!-- Step 1 -->
                <div class="flex flex-col md:flex-row items-center mb-12 md:mb-16">
                    <div class="md:w-1/3 mb-6 md:mb-0">
                        <div class="w-24 h-24 md:w-32 md:h-32 rounded-full bg-gradient-primary flex items-center justify-center mx-auto">
                            <div class="text-3xl md:text-4xl font-bold text-white">1</div>
                        </div>
                    </div>
                    <div class="md:w-2/3">
                        <h3 class="text-2xl md:text-3xl font-bold text-white mb-4">Create Your Account</h3>
                        <p class="text-gray-400 mb-4">Sign up for a free LottoElite account. It takes less than 2 minutes! You'll need to provide basic information and verify your email address.</p>
                        <ul class="space-y-2 text-gray-300">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Register with your email or phone number</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Complete your profile information</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Verify your account for security</span>
                            </li>
                        </ul>
                        <div class="mt-6">
                            <a href="signup.php" class="inline-block bg-gradient-primary text-white px-6 py-2 rounded-full font-semibold hover:opacity-90 transition-opacity">
                                <i class="fas fa-user-plus mr-2"></i> Create Account Now
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Step 2 -->
                <div class="flex flex-col md:flex-row items-center mb-12 md:mb-16">
                    <div class="md:w-1/3 order-2 md:order-1">
                        <div class="w-24 h-24 md:w-32 md:h-32 rounded-full bg-gradient-secondary flex items-center justify-center mx-auto">
                            <div class="text-3xl md:text-4xl font-bold text-white">2</div>
                        </div>
                    </div>
                    <div class="md:w-2/3 order-1 md:order-2 mb-6 md:mb-0">
                        <h3 class="text-2xl md:text-3xl font-bold text-white mb-4">Choose & Purchase Tickets</h3>
                        <p class="text-gray-400 mb-4">Select from our Bronze, Silver, or Gold lotteries. Each has different ticket prices and prize amounts. You can buy multiple tickets for better chances!</p>
                        <ul class="space-y-2 text-gray-300">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Select your preferred lottery type</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Choose number of tickets to purchase</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Pay securely with multiple payment options</span>
                            </li>
                        </ul>
                        <div class="mt-6">
                            <a href="#lotteries" class="inline-block glass-effect text-white px-6 py-2 rounded-full font-semibold hover:bg-white/10 transition-colors">
                                <i class="fas fa-ticket-alt mr-2"></i> View All Lotteries
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Step 3 -->
                <div class="flex flex-col md:flex-row items-center">
                    <div class="md:w-1/3 mb-6 md:mb-0">
                        <div class="w-24 h-24 md:w-32 md:h-32 rounded-full bg-gradient-accent flex items-center justify-center mx-auto">
                            <div class="text-3xl md:text-4xl font-bold text-dark">3</div>
                        </div>
                    </div>
                    <div class="md:w-2/3">
                        <h3 class="text-2xl md:text-3xl font-bold text-white mb-4">Wait for Draw & Claim Prize</h3>
                        <p class="text-gray-400 mb-4">Once you have your tickets, wait for the draw date. We conduct transparent live draws and notify all winners immediately.</p>
                        <ul class="space-y-2 text-gray-300">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Check draw schedule for your lottery</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>Watch live draws or check results afterwards</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                <span>If you win, claim your prize within 30 days</span>
                            </li>
                        </ul>
                        <div class="mt-6">
                            <a href="login.php" class="inline-block bg-gradient-accent text-dark px-6 py-2 rounded-full font-semibold hover:opacity-90 transition-opacity">
                                <i class="fas fa-play-circle mr-2"></i> Login to Play Now
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-12 pt-8 border-t border-gray-800">
                    <p class="text-gray-400 mb-6">Ready to start your winning journey?</p>
                    <a href="signup.php" class="inline-block bg-gradient-primary text-white px-8 py-4 rounded-full font-bold text-lg hover:scale-105 transition-transform">
                        <i class="fas fa-play-circle mr-2"></i> Start Playing Now
                    </a>
                    <p class="text-gray-500 text-sm mt-4">Already have an account? <a href="login.php" class="text-primary hover:text-primary/80">Login here</a></p>
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
                        <li><a href="index.php#home" class="text-gray-400 hover:text-accent transition-colors text-sm md:text-base">Home</a></li>
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
        // Mobile Menu Toggle
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuClose = document.getElementById('menu-close');
        const menuOverlay = document.getElementById('menu-overlay');
        
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
        
        // Countdown Timer
        function updateCountdown() {
            const daysEl = document.getElementById('days');
            const hoursEl = document.getElementById('hours');
            const minutesEl = document.getElementById('minutes');
            const secondsEl = document.getElementById('seconds');
            
            // Set target date (7 days from now)
            const targetDate = new Date();
            targetDate.setDate(targetDate.getDate() + 7);
            targetDate.setHours(15, 42, 18, 0);
            
            const now = new Date();
            const diff = targetDate - now;
            
            if (diff > 0) {
                const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((diff % (1000 * 60)) / 1000);
                
                daysEl.textContent = days.toString().padStart(2, '0');
                hoursEl.textContent = hours.toString().padStart(2, '0');
                minutesEl.textContent = minutes.toString().padStart(2, '0');
                secondsEl.textContent = seconds.toString().padStart(2, '0');
            }
        }
        
        // Update countdown every second
        setInterval(updateCountdown, 1000);
        updateCountdown(); // Initial call
        
        // Enhanced smooth scrolling for anchor links with offset
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    // Calculate offset based on header height
                    const headerHeight = document.querySelector('header').offsetHeight;
                    const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;
                    const offsetPosition = targetPosition - headerHeight;
                    
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Add ripple effect to buttons
        function addRippleEffect(button) {
            button.addEventListener('click', function(e) {
                // Create ripple element
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.cssText = `
                    position: absolute;
                    border-radius: 50%;
                    background: rgba(255, 255, 255, 0.7);
                    transform: scale(0);
                    animation: ripple 0.6s linear;
                    width: ${size}px;
                    height: ${size}px;
                    top: ${y}px;
                    left: ${x}px;
                    pointer-events: none;
                `;
                
                this.style.position = 'relative';
                this.style.overflow = 'hidden';
                this.appendChild(ripple);
                
                // Remove ripple after animation
                setTimeout(() => {
                    ripple.remove();
                }, 600);
                
                // Demo message for button clicks (only for non-link buttons)
                if (this.tagName === 'BUTTON' && !this.hasAttribute('href')) {
                    const buttonText = this.textContent.trim();
                    let message = '';
                    
                    if (buttonText.includes('Login')) {
                        message = 'Redirecting to login page...';
                    } else if (buttonText.includes('Create Account')) {
                        message = 'Redirecting to registration page...';
                    } else if (buttonText.includes('Buy')) {
                        message = 'Please login or sign up first to purchase tickets';
                    } else if (buttonText.includes('How to Play')) {
                        message = 'Scrolling to How to Play section...';
                    } else if (buttonText.includes('View All Winners')) {
                        message = 'Redirecting to winners page...';
                    } else if (buttonText.includes('Start Playing Now')) {
                        message = 'Redirecting to sign up page...';
                    }
                    
                    if (message) {
                        setTimeout(() => {
                            alert(message);
                        }, 300);
                    }
                }
            });
        }
        
        // Apply ripple effect to all buttons except menu toggle/close and links
        document.querySelectorAll('button').forEach(button => {
            if (!button.id.includes('menu') && !button.closest('a')) {
                addRippleEffect(button);
            }
        });
        
        // Keyboard shortcut to open menu (Alt+M)
        document.addEventListener('keydown', (e) => {
            if (e.altKey && e.key === 'm') {
                menuToggle.click();
            }
        });
        
        // Add scroll animation to sections
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in');
                }
            });
        }, observerOptions);
        
        // Observe all sections
        document.querySelectorAll('section').forEach(section => {
            observer.observe(section);
        });
        
        // Add active class to current page in footer
        const currentPage = window.location.pathname.split('/').pop();
        if (currentPage === 'index.php' || currentPage === '') {
            document.querySelectorAll('footer a').forEach(link => {
                if (link.getAttribute('href') === 'index.php' || link.getAttribute('href') === '#home') {
                    link.classList.add('text-accent');
                }
            });
        }
    </script>
</body>
</html>