<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoVis - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-100px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .animate-slide-in-left {
            animation: slideInLeft 1s ease-out forwards;
        }

        /* Navbar scroll effect */
        .navbar-scrolled {
            background-color: rgba(0, 0, 0, 0.8) !important ;
            backdrop-filter: blur(10px);
        }

        /* Form styling */
        .form-container {
            transition: all 0.3s ease;
        }

        .form-container:hover {
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body class="overflow-x-hidden bg-gray-50">
    <!-- Navbar -->
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 bg-black/70
">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Mobile Menu Button -->
                <button class="lg:hidden p-2">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <!-- Logo -->
                <div class="flex items-center">
                    <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-4 py-2 rounded">
                        <span class="text-white text-2xl font-bold">AUTO<span class="text-emerald-400">VIS</span></span>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="index.html" class="text-white hover:text-emerald-400 transition-colors font-medium">Home</a>
                    <a href="index.html#listings" class="text-white hover:text-emerald-400 transition-colors font-medium">Browse Cars</a>
                    <a href="index.html#categories" class="text-white hover:text-emerald-400 transition-colors font-medium">Categories</a>
                    <a href="index.html#featured" class="text-white hover:text-emerald-400 transition-colors font-medium">Featured</a>
                    <a href="index.html#contact" class="text-white hover:text-emerald-400 transition-colors font-medium">Contact</a>
                </div>

                <!-- Right Side Actions -->
                <div class="flex items-center space-x-4">
                    <a href="#" class="hidden md:flex text-white hover:text-emerald-400 transition-colors items-center font-medium">
                        <i class="fas fa-user mr-2"></i>
                        Sign In
                    </a>
                    <a href="#" class="bg-emerald-400 hover:bg-emerald-500 text-white px-6 py-2 rounded-full transition-colors font-semibold">
                        Sell Car
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Login Section -->
    <section class="min-h-screen flex items-center justify-center pt-20">
        <div class="max-w-md w-full mx-auto px-4 sm:px-6 lg:px-8">
            <div class="form-container bg-white rounded-2xl shadow-lg p-8 animate-fade-in-up">
                <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center animate-slide-in-left">
                    Login to AutoVis
                </h2>
                <p class="text-gray-600 text-center mb-8">Access your account to browse and sell cars</p>

                <div>
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-envelope text-emerald-400 mr-2"></i>
                            Email or Username
                        </label>
                        <div class="relative">
                            <i class="fas fa-envelope absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            <input type="text" id="email" placeholder="Enter your email or username"
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-lock text-emerald-400 mr-2"></i>
                            Password
                        </label>
                        <div class="relative">
                            <i class="fas fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            <input type="password" id="password" placeholder="Enter your password"
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50">
                        </div>
                    </div>

                    <div class="flex items-center justify-between mb-6">
                        <label class="flex items-center text-sm text-gray-600">
                            <input type="checkbox" class="mr-2 accent-emerald-400">
                            Remember me
                        </label>
                        <a href="#" class="text-sm text-emerald-400 hover:text-emerald-500 transition-colors">
                            Forgot Password?
                        </a>
                    </div>

                    <button class="w-full bg-gradient-to-r from-emerald-400 to-emerald-500 hover:from-emerald-500 hover:to-emerald-600 text-white px-8 py-4 rounded-lg transition-all font-semibold text-lg shadow-lg hover:shadow-xl">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Login
                    </button>

                    <p class="text-center text-gray-600 mt-6">
                        Don't have an account? 
                        <a href="#" class="text-emerald-400 hover:text-emerald-500 transition-colors font-semibold">Sign Up</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript for Navbar Scroll Effect -->
    <script>
        // Get the navbar element
        const navbar = document.getElementById('navbar');

        // Add scroll event listener
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });
    </script>
</body>
</html>