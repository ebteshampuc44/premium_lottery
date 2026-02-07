// firebase-config.js

// Your web app's Firebase configuration
const firebaseConfig = {
    apiKey: "AIzaSyDQhuCLaKZ3SAr_X0kEcq2oBs6mq_9R15M",
    authDomain: "lottoelite-911a8.firebaseapp.com",
    projectId: "lottoelite-911a8",
    storageBucket: "lottoelite-911a8.firebasestorage.app",
    messagingSenderId: "457694339359",
    appId: "1:457694339359:web:46df2a974ff3731dc3d02a",
    measurementId: "G-3JKBYZN72R"
};

// Firebase initialization
try {
    if (!firebase.apps.length) {
        firebase.initializeApp(firebaseConfig);
    }
} catch (error) {
    console.error("Firebase initialization error:", error);
}

// Get Firebase auth instance
const auth = firebase.auth();

// User state observer
auth.onAuthStateChanged((user) => {
    if (user) {
        // User is signed in
        console.log("User is signed in:", user.email);
        
        // Save user info to localStorage
        const userData = {
            uid: user.uid,
            email: user.email,
            displayName: user.displayName,
            emailVerified: user.emailVerified,
            photoURL: user.photoURL
        };
        
        localStorage.setItem('lottoUser', JSON.stringify(userData));
        
        // Update UI if on login/signup page
        if (window.location.pathname.includes('login.php') || 
            window.location.pathname.includes('signup.php')) {
            setTimeout(() => {
                window.location.href = 'index.php';
            }, 1500);
        }
        
        // Update UI for logged in user
        updateUIForLoggedInUser(user);
    } else {
        // User is signed out
        console.log("User is signed out");
        localStorage.removeItem('lottoUser');
        
        // Update UI for logged out user
        updateUIForLoggedOutUser();
    }
});

// Update UI for logged in user
function updateUIForLoggedInUser(user) {
    // Check if we're on index.php to update the header
    if (window.location.pathname.includes('index.php')) {
        // Change login button to user profile
        const loginBtn = document.querySelector('a[href="login.php"]');
        if (loginBtn) {
            loginBtn.innerHTML = `<i class="fas fa-user mr-2"></i>${user.displayName || user.email.split('@')[0]}`;
            loginBtn.href = "#";
            loginBtn.onclick = showUserMenu;
        }
        
        // Add logout button next to it
        const headerActions = document.querySelector('header .flex.items-center.space-x-4');
        if (headerActions) {
            const logoutBtn = document.createElement('a');
            logoutBtn.href = "#";
            logoutBtn.className = "bg-red-600 text-white px-4 py-2 rounded-full font-semibold hover:bg-red-700 transition-colors";
            logoutBtn.innerHTML = '<i class="fas fa-sign-out-alt mr-2"></i>Logout';
            logoutBtn.onclick = logoutUser;
            headerActions.appendChild(logoutBtn);
        }
    }
}

// Update UI for logged out user
function updateUIForLoggedOutUser() {
    if (window.location.pathname.includes('index.php')) {
        // Reset login button
        const loginBtn = document.querySelector('a.bg-gradient-primary');
        if (loginBtn && loginBtn.innerHTML.includes('Login')) {
            loginBtn.innerHTML = '<i class="fas fa-user mr-2"></i>Login';
            loginBtn.href = "login.php";
            loginBtn.onclick = null;
        }
        
        // Remove logout button if exists
        const logoutBtn = document.querySelector('a.bg-red-600');
        if (logoutBtn) {
            logoutBtn.remove();
        }
    }
}

// Logout function
function logoutUser(e) {
    if (e) e.preventDefault();
    
    auth.signOut().then(() => {
        alert("Logged out successfully!");
        window.location.href = 'index.php';
    }).catch((error) => {
        alert("Logout error: " + error.message);
    });
}

// Show user menu
function showUserMenu(e) {
    e.preventDefault();
    
    const user = auth.currentUser;
    if (!user) return;
    
    // Create user menu
    const menu = `
        <div class="absolute top-16 right-4 bg-gray-800 rounded-xl p-4 min-w-48 shadow-lg z-50 border border-gray-700">
            <div class="mb-3 pb-3 border-b border-gray-700">
                <p class="text-white font-semibold">${user.displayName || 'User'}</p>
                <p class="text-gray-400 text-sm">${user.email}</p>
                ${user.emailVerified ? 
                    '<span class="text-green-500 text-xs mt-1 inline-block"><i class="fas fa-check-circle mr-1"></i>Verified</span>' : 
                    '<span class="text-yellow-500 text-xs mt-1 inline-block"><i class="fas fa-exclamation-circle mr-1"></i>Not Verified</span>'
                }
            </div>
            <a href="#" class="block text-gray-300 hover:text-white py-2 px-2 rounded hover:bg-gray-700">
                <i class="fas fa-user mr-2"></i>Profile
            </a>
            <a href="#" class="block text-gray-300 hover:text-white py-2 px-2 rounded hover:bg-gray-700">
                <i class="fas fa-ticket-alt mr-2"></i>My Tickets
            </a>
            <a href="#" class="block text-gray-300 hover:text-white py-2 px-2 rounded hover:bg-gray-700">
                <i class="fas fa-trophy mr-2"></i>My Winnings
            </a>
            <div class="pt-2 mt-2 border-t border-gray-700">
                <button onclick="logoutUser(event)" class="w-full text-red-400 hover:text-red-300 py-2 px-2 rounded hover:bg-red-900/20 text-left">
                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                </button>
            </div>
        </div>
    `;
    
    // Remove existing menu if any
    const existingMenu = document.querySelector('.user-menu');
    if (existingMenu) {
        existingMenu.remove();
        return;
    }
    
    // Add new menu
    const menuDiv = document.createElement('div');
    menuDiv.className = 'user-menu';
    menuDiv.innerHTML = menu;
    document.body.appendChild(menuDiv);
    
    // Close menu when clicking outside
    setTimeout(() => {
        document.addEventListener('click', function closeMenu(e) {
            if (!e.target.closest('.user-menu') && !e.target.closest('a[href="#"]')) {
                menuDiv.remove();
                document.removeEventListener('click', closeMenu);
            }
        });
    }, 100);
}

// Send verification email
function sendVerificationEmail() {
    const user = auth.currentUser;
    if (user) {
        user.sendEmailVerification()
            .then(() => {
                alert(`Verification email sent to ${user.email}`);
            })
            .catch((error) => {
                alert("Error sending verification email: " + error.message);
            });
    }
}

// Reset password
function resetPassword(email) {
    return auth.sendPasswordResetEmail(email);
}

// Check if user is logged in
function isUserLoggedIn() {
    return auth.currentUser !== null;
}

// Get current user
function getCurrentUser() {
    return auth.currentUser;
}

// Save user to database function
async function saveUserToDatabase(userData) {
    try {
        const response = await fetch('save-user.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(userData)
        });
        
        const result = await response.json();
        return result;
    } catch (error) {
        console.error("Error saving user to database:", error);
        return { success: false, message: error.message };
    }
}

// Load user from localStorage on page load
window.addEventListener('DOMContentLoaded', function() {
    const savedUser = localStorage.getItem('lottoUser');
    if (savedUser) {
        const user = JSON.parse(savedUser);
        updateUIForLoggedInUser(user);
    }
});