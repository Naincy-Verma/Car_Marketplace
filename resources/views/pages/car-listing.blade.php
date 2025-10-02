<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoVis - Car Listings</title>
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

        /* Car card styling */
        .car-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .car-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }

        .gradient-overlay {
            background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 100%);
        }
    </style>
</head>
<body class="overflow-x-hidden bg-gray-50">
    <!-- Navbar -->
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 bg-black/70
">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <button class="lg:hidden p-2">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <div class="flex items-center">
                    <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-4 py-2 rounded">
                        <span class="text-white text-2xl font-bold">AUTO<span class="text-emerald-400">VIS</span></span>
                    </div>
                </div>
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="index.html" class="text-white hover:text-emerald-400 transition-colors font-medium">Home</a>
                    <a href="car-listing.html" class="text-white hover:text-emerald-400 transition-colors font-medium">Browse Cars</a>
                    <a href="index.html#categories" class="text-white hover:text-emerald-400 transition-colors font-medium">Categories</a>
                    <a href="index.html#featured" class="text-white hover:text-emerald-400 transition-colors font-medium">Featured</a>
                    <a href="index.html#contact" class="text-white hover:text-emerald-400 transition-colors font-medium">Contact</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="dashboard.html" class="hidden md:flex text-white hover:text-emerald-400 transition-colors items-center font-medium">
                        <i class="fas fa-user mr-2"></i>
                        Dashboard
                    </a>
                    <a href="post-car.html" class="bg-emerald-400 hover:bg-emerald-500 text-white px-6 py-2 rounded-full transition-colors font-semibold">
                        Post Car
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Car Listings Section -->
    <section class="pt-24 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-gray-800 mb-8 animate-slide-in-left">Browse Cars</h2>

            <!-- Filters and Sort -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-8 animate-fade-in-up">
                <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
                    <div class="flex flex-wrap gap-4">
                        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50">
                            <option>Category</option>
                            <option>SUV</option>
                            <option>Sedan</option>
                            <option>Hatchback</option>
                        </select>
                        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50">
                            <option>Brand</option>
                            <option>Toyota</option>
                            <option>BMW</option>
                            <option>Mercedes</option>
                        </select>
                        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50">
                            <option>Year</option>
                            <option>2024</option>
                            <option>2023</option>
                            <option>2022</option>
                        </select>
                    </div>
                    <div>
                        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50">
                            <option>Sort By: Price Low to High</option>
                            <option>Price High to Low</option>
                            <option>Newest First</option>
                            <option>Mileage Low to High</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Car Listings -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 animate-fade-in-up">
                <!-- Car Card 1 -->
                <div class="car-card bg-white rounded-xl overflow-hidden shadow-lg">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1617531653332-bd46c24f2068?w=600&h=400&q=80" 
                             alt="BMW M4" 
                             class="w-full h-64 object-cover">
                        <div class="absolute top-4 left-4 bg-emerald-400 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Featured
                        </div>
                        <div class="absolute top-4 right-4 bg-white rounded-full p-2 shadow-lg cursor-pointer hover:bg-red-50 transition">
                            <i class="far fa-heart text-red-500"></i>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 gradient-overlay p-4">
                            <div class="flex items-center text-white text-sm">
                                <i class="fas fa-user-tie mr-2"></i>
                                <span>Dealer</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl font-bold text-gray-800">BMW M4 Competition</h3>
                            <span class="text-2xl font-bold text-emerald-500">₹45.5L</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4 flex items-center">
                            <i class="fas fa-map-marker-alt mr-2 text-emerald-400"></i>
                            Mumbai, Maharashtra
                        </p>
                        <div class="grid grid-cols-3 gap-3 mb-4 pb-4 border-b">
                            <div class="text-center">
                                <p class="text-xs text-gray-500">Year</p>
                                <p class="font-semibold text-gray-800">2023</p>
                            </div>
                            <div class="text-center">
                                <p class="text-xs text-gray-500">Fuel</p>
                                <p class="font-semibold text-gray-800">Petrol</p>
                            </div>
                            <div class="text-center">
                                <p class="text-xs text-gray-500">KM</p>
                                <p class="font-semibold text-gray-800">12,500</p>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <a href="car-detail.html" class="flex-1 bg-emerald-400 text-white py-2 rounded-lg hover:bg-emerald-500 transition font-semibold text-center">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Car Card 2 -->
                <div class="car-card bg-white rounded-xl overflow-hidden shadow-lg">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1605559424843-9e4c228bf1c2?w=600&h=400&q=80" 
                             alt="Mercedes C-Class" 
                             class="w-full h-64 object-cover">
                        <div class="absolute top-4 left-4 bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Verified
                        </div>
                        <div class="absolute top-4 right-4 bg-white rounded-full p-2 shadow-lg cursor-pointer hover:bg-red-50 transition">
                            <i class="far fa-heart text-red-500"></i>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 gradient-overlay p-4">
                            <div class="flex items-center text-white text-sm">
                                <i class="fas fa-user mr-2"></i>
                                <span>Individual</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl font-bold text-gray-800">Mercedes C-Class</h3>
                            <span class="text-2xl font-bold text-emerald-500">₹38.2L</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4 flex items-center">
                            <i class="fas fa-map-marker-alt mr-2 text-emerald-400"></i>
                            Delhi NCR
                        </p>
                        <div class="grid grid-cols-3 gap-3 mb-4 pb-4 border-b">
                            <div class="text-center">
                                <p class="text-xs text-gray-500">Year</p>
                                <p class="font-semibold text-gray-800">2022</p>
                            </div>
                            <div class="text-center">
                                <p class="text-xs text-gray-500">Fuel</p>
                                <p class="font-semibold text-gray-800">Diesel</p>
                            </div>
                            <div class="text-center">
                                <p class="text-xs text-gray-500">KM</p>
                                <p class="font-semibold text-gray-800">20,000</p>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <a href="car-detail.html" class="flex-1 bg-emerald-400 text-white py-2 rounded-lg hover:bg-emerald-500 transition font-semibold text-center">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript for Navbar Scroll Effect -->
    <script>
        const navbar = document.getElementById('navbar');
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