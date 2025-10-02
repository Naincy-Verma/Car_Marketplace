<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoVis - Seller Dashboard</title>
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

        /* Card styling */
        .dashboard-card {
            transition: all 0.3s ease;
        }

        .dashboard-card:hover {
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }

        /* Listing card */
        .listing-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .listing-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
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
                    <a href="dashboard.html" class="hidden md:flex text-white hover:text-emerald-400 transition-colors items-center font-medium">
                        <i class="fas fa-user mr-2"></i>
                        Dashboard
                    </a>
                    <a href="/car/post-car" class="bg-emerald-400 hover:bg-emerald-500 text-white px-6 py-2 rounded-full transition-colors font-semibold">
                        Post Car
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Seller Dashboard -->
    <section class="min-h-screen pt-24 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-gray-800 mb-8 animate-slide-in-left">Seller Dashboard</h2>

            <!-- Profile Section -->
            <div class="dashboard-card bg-white rounded-2xl shadow-lg p-8 mb-8 animate-fade-in-up">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-bold text-gray-800 flex items-center">
                        <i class="fas fa-user-circle text-emerald-400 mr-3"></i>
                        Profile
                    </h3>
                    <a href="/car/profile" class="bg-emerald-400 hover:bg-emerald-500 text-white px-6 py-2 rounded-full transition-colors font-semibold">
                        Edit Profile
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-sm text-gray-600">Name</p>
                        <p class="font-semibold text-gray-800">John Doe</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">User Type</p>
                        <p class="font-semibold text-gray-800">Individual</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Business Name (if applicable)</p>
                        <p class="font-semibold text-gray-800">N/A</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Email</p>
                        <p class="font-semibold text-gray-800">john.doe@example.com</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">WhatsApp Number</p>
                        <p class="font-semibold text-gray-800">+91 98765 43210</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Telegram Number</p>
                        <p class="font-semibold text-gray-800">+91 98765 43211</p>
                    </div>
                </div>
                <div class="mt-6">
                    <button class="text-emerald-400 hover:text-emerald-500 transition-colors font-semibold">
                        Change Password
                    </button>
                </div>
            </div>

            <!-- Car Listings Section -->
            <div class="dashboard-card bg-white rounded-2xl shadow-lg p-8 mb-8 animate-fade-in-up">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-bold text-gray-800 flex items-center">
                        <i class="fas fa-car text-emerald-400 mr-3"></i>
                        My Car Listings
                    </h3>
                    <a href="/car/post-car" class="bg-emerald-400 hover:bg-emerald-500 text-white px-6 py-2 rounded-full transition-colors font-semibold">
                        Post New Car
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Listing 1 -->
                    <div class="listing-card bg-gray-50 rounded-xl overflow-hidden shadow-md">
                        <img src="https://images.unsplash.com/photo-1617531653332-bd46c24f2068?w=600&h=400&q=80" 
                             alt="BMW M4" 
                             class="w-full h-48 object-cover">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-3">
                                <h4 class="text-lg font-bold text-gray-800">BMW M4 Competition</h4>
                                <span class="text-xl font-bold text-emerald-500">₹45.5L</span>
                            </div>
                            <p class="text-gray-600 text-sm mb-2">Status: <span class="text-green-600">Active</span></p>
                            <p class="text-gray-600 text-sm mb-4 flex items-center">
                                <i class="fas fa-map-marker-alt mr-2 text-emerald-400"></i>
                                Mumbai, Maharashtra
                            </p>
                            <div class="flex gap-2">
                                <button class="flex-1 bg-emerald-400 text-white py-2 rounded-lg hover:bg-emerald-500 transition font-semibold">
                                    Edit
                                </button>
                                <button class="flex-1 bg-red-400 text-white py-2 rounded-lg hover:bg-red-500 transition font-semibold">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Listing 2 -->
                    <div class="listing-card bg-gray-50 rounded-xl overflow-hidden shadow-md">
                        <img src="https://images.unsplash.com/photo-1605559424843-9e4c228bf1c2?w=600&h=400&q=80" 
                             alt="Mercedes C-Class" 
                             class="w-full h-48 object-cover">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-3">
                                <h4 class="text-lg font-bold text-gray-800">Mercedes C-Class</h4>
                                <span class="text-xl font-bold text-emerald-500">₹38.2L</span>
                            </div>
                            <p class="text-gray-600 text-sm mb-2">Status: <span class="text-yellow-600">Pending Approval</span></p>
                            <p class="text-gray-600 text-sm mb-4 flex items-center">
                                <i class="fas fa-map-marker-alt mr-2 text-emerald-400"></i>
                                Delhi NCR
                            </p>
                            <div class="flex gap-2">
                                <button class="flex-1 bg-emerald-400 text-white py-2 rounded-lg hover:bg-emerald-500 transition font-semibold">
                                    Edit
                                </button>
                                <button class="flex-1 bg-red-400 text-white py-2 rounded-lg hover:bg-red-500 transition font-semibold">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Inquiries Section -->
            <div class="dashboard-card bg-white rounded-2xl shadow-lg p-8 animate-fade-in-up">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <i class="fas fa-envelope text-emerald-400 mr-3"></i>
                    Inquiries
                </h3>
                <p class="text-gray-600 mb-4">Receive and respond to inquiries via WhatsApp or Telegram.</p>
                <div class="bg-gray-100 p-4 rounded-lg text-center">
                    <p class="text-gray-600">No inquiries yet. Buyers will contact you via WhatsApp or Telegram.</p>
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