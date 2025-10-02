<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoVis - Your Trusted Car Marketplace</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
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

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .animate-slide-in-left {
            animation: slideInLeft 1s ease-out forwards;
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .hero-slide {
            transition: opacity 1s ease-in-out;
        }

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

        .category-card {
            transition: all 0.3s ease;
        }

        .category-card:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="overflow-x-hidden bg-gray-50">
    <!-- Navbar -->
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 bg-transparent">
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
                    <a href="#" class="text-white hover:text-emerald-400 transition-colors font-medium">Home</a>
                    <a href="#listings" class="text-white hover:text-emerald-400 transition-colors font-medium">Browse Cars</a>
                    <a href="#categories" class="text-white hover:text-emerald-400 transition-colors font-medium">Categories</a>
                    <a href="#featured" class="text-white hover:text-emerald-400 transition-colors font-medium">Featured</a>
                    <a href="#contact" class="text-white hover:text-emerald-400 transition-colors font-medium">Contact</a>
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

    <!-- Hero Section with Slider -->
    <section class="relative h-screen overflow-hidden">
        <!-- Slide 1 -->
        <div id="slide-1" class="hero-slide absolute inset-0 w-full h-full">
            <div class="absolute inset-0 bg-black opacity-60"></div>
            <img src="https://images.unsplash.com/photo-1617531653332-bd46c24f2068?w=1920&q=80" 
                 alt="Luxury Car" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 flex items-center">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                    <div class="max-w-3xl">
                        <div class="inline-block bg-emerald-400 text-white px-4 py-2 rounded-full text-sm font-semibold mb-4 animate-fade-in-up">
                            🚗 Trusted by 10,000+ Car Buyers
                        </div>
                        <h1 class="text-white text-5xl md:text-7xl font-bold mb-6 animate-slide-in-left">
                            FIND YOUR<br>DREAM CAR
                        </h1>
                        <p class="text-white text-lg md:text-xl mb-8 animate-fade-in-up">
                            Browse thousands of verified car listings from trusted sellers.<br>
                            Your perfect ride is just a click away!
                        </p>
                        <div class="flex flex-wrap gap-4 animate-fade-in-up">
                            <button class="bg-emerald-400 hover:bg-emerald-500 text-white px-8 py-4 rounded-full transition-all duration-300 font-semibold text-lg">
                                Browse Cars
                            </button>
                            <button class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-full hover:bg-white hover:text-black transition-all duration-300 font-semibold text-lg">
                                Sell Your Car
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div id="slide-2" class="hero-slide absolute inset-0 w-full h-full opacity-0">
            <div class="absolute inset-0 bg-black opacity-60"></div>
            <img src="https://images.unsplash.com/photo-1605559424843-9e4c228bf1c2?w=1920&q=80" 
                 alt="Sports Car" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 flex items-center">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                    <div class="max-w-3xl">
                        <div class="inline-block bg-blue-600 text-white px-4 py-2 rounded-full text-sm font-semibold mb-4">
                            ⚡ New Arrivals Daily
                        </div>
                        <h1 class="text-white text-5xl md:text-7xl font-bold mb-6">
                            LUXURY MEETS<br>AFFORDABILITY
                        </h1>
                        <p class="text-white text-lg md:text-xl mb-8">
                            Premium vehicles at competitive prices.<br>
                            Direct deals with verified sellers.
                        </p>
                        <button class="bg-emerald-400 hover:bg-emerald-500 text-white px-8 py-4 rounded-full transition-all duration-300 font-semibold text-lg">
                            Explore Now
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div id="slide-3" class="hero-slide absolute inset-0 w-full h-full opacity-0">
            <div class="absolute inset-0 bg-black opacity-60"></div>
            <img src="https://images.unsplash.com/photo-1614162692292-7ac56d7f7f1e?w=1920&q=80" 
                 alt="SUV" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 flex items-center">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                    <div class="max-w-3xl">
                        <div class="inline-block bg-red-600 text-white px-4 py-2 rounded-full text-sm font-semibold mb-4">
                            🔥 Hot Deals This Week
                        </div>
                        <h1 class="text-white text-5xl md:text-7xl font-bold mb-6">
                            CERTIFIED<br>& VERIFIED
                        </h1>
                        <p class="text-white text-lg md:text-xl mb-8">
                            Every car inspected and verified.<br>
                            Buy with complete confidence.
                        </p>
                        <button class="bg-emerald-400 hover:bg-emerald-500 text-white px-8 py-4 rounded-full transition-all duration-300 font-semibold text-lg">
                            View Deals
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slider Navigation -->
        <button id="prev-btn" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white bg-opacity-20 hover:bg-opacity-40 backdrop-blur-sm text-white p-4 rounded-full transition-all z-10">
            <i class="fas fa-chevron-left text-xl"></i>
        </button>
        <button id="next-btn" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white bg-opacity-20 hover:bg-opacity-40 backdrop-blur-sm text-white p-4 rounded-full transition-all z-10">
            <i class="fas fa-chevron-right text-xl"></i>
        </button>

        <!-- Slider Indicators -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex space-x-3 z-10">
            <button class="slider-indicator w-3 h-3 rounded-full bg-white" data-slide="0"></button>
            <button class="slider-indicator w-3 h-3 rounded-full bg-white bg-opacity-50" data-slide="1"></button>
            <button class="slider-indicator w-3 h-3 rounded-full bg-white bg-opacity-50" data-slide="2"></button>
        </div>
    </section>

    <!-- Advanced Search Form -->
    <section class="relative -mt-32 z-20 mb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-2xl p-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <i class="fas fa-search text-emerald-400 mr-3"></i>
                    Find Your Perfect Car
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                    <div class="relative">
                        <i class="fas fa-car absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <select class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50">
                            <option>Category</option>
                            <option>SUV</option>
                            <option>Sedan</option>
                            <option>Hatchback</option>
                            <option>Coupe</option>
                            <option>Convertible</option>
                            <option>Truck</option>
                        </select>
                    </div>
                    
                    <div class="relative">
                        <i class="fas fa-copyright absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <select class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50">
                            <option>Brand</option>
                            <option>Toyota</option>
                            <option>Honda</option>
                            <option>BMW</option>
                            <option>Mercedes</option>
                            <option>Audi</option>
                            <option>Hyundai</option>
                        </select>
                    </div>
                    
                    <div class="relative">
                        <i class="fas fa-calendar absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <select class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50">
                            <option>Year</option>
                            <option>2024</option>
                            <option>2023</option>
                            <option>2022</option>
                            <option>2021</option>
                            <option>2020</option>
                        </select>
                    </div>
                    
                    <div class="relative">
                        <i class="fas fa-cogs absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <select class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50">
                            <option>Transmission</option>
                            <option>Automatic</option>
                            <option>Manual</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                    <div class="relative">
                        <i class="fas fa-gas-pump absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <select class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50">
                            <option>Fuel Type</option>
                            <option>Petrol</option>
                            <option>Diesel</option>
                            <option>Electric</option>
                            <option>Hybrid</option>
                            <option>CNG</option>
                        </select>
                    </div>
                    
                    <div class="relative">
                        <i class="fas fa-palette absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <select class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50">
                            <option>Color</option>
                            <option>Black</option>
                            <option>White</option>
                            <option>Silver</option>
                            <option>Red</option>
                            <option>Blue</option>
                        </select>
                    </div>
                    
                    <div class="relative">
                        <i class="fas fa-map-marker-alt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input type="text" placeholder="Location" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50">
                    </div>
                    
                    <div class="relative">
                        <i class="fas fa-tachometer-alt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <select class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50">
                            <option>Mileage (km)</option>
                            <option>0-10,000</option>
                            <option>10,000-25,000</option>
                            <option>25,000-50,000</option>
                            <option>50,000+</option>
                        </select>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row items-end gap-4">
                    <div class="flex-1 w-full">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-dollar-sign text-emerald-400 mr-1"></i>
                            Price Range
                        </label>
                        <div class="flex items-center gap-4">
                            <input type="text" value="₹50,000" class="w-32 px-3 py-2 border border-gray-300 rounded-lg text-sm bg-gray-50">
                            <span class="text-gray-600 font-semibold">to</span>
                            <input type="text" value="₹50,00,000" class="w-32 px-3 py-2 border border-gray-300 rounded-lg text-sm bg-gray-50">
                            <input type="range" min="50000" max="5000000" class="flex-1">
                        </div>
                    </div>
                    <button class="w-full md:w-auto bg-gradient-to-r from-emerald-400 to-emerald-500 hover:from-emerald-500 hover:to-emerald-600 text-white px-12 py-4 rounded-lg transition-all font-semibold text-lg shadow-lg hover:shadow-xl">
                        <i class="fas fa-search mr-2"></i>
                        Search Cars
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Browse by Category -->
    <section id="categories" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Browse by Category</h2>
                <p class="text-gray-600 text-lg">Find your ideal vehicle type</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                <!-- SUV -->
                <div class="category-card bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-6 text-center cursor-pointer">
                    <div class="bg-white rounded-full w-20 h-20 mx-auto mb-4 flex items-center justify-center shadow-lg">
                        <i class="fas fa-truck-monster text-4xl text-blue-600"></i>
                    </div>
                    <h3 class="font-bold text-gray-800 text-lg">SUV</h3>
                    <p class="text-sm text-gray-600 mt-1">245 Cars</p>
                </div>

                <!-- Sedan -->
                <div class="category-card bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-xl p-6 text-center cursor-pointer">
                    <div class="bg-white rounded-full w-20 h-20 mx-auto mb-4 flex items-center justify-center shadow-lg">
                        <i class="fas fa-car text-4xl text-emerald-600"></i>
                    </div>
                    <h3 class="font-bold text-gray-800 text-lg">Sedan</h3>
                    <p class="text-sm text-gray-600 mt-1">189 Cars</p>
                </div>

                <!-- Hatchback -->
                <div class="category-card bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-6 text-center cursor-pointer">
                    <div class="bg-white rounded-full w-20 h-20 mx-auto mb-4 flex items-center justify-center shadow-lg">
                        <i class="fas fa-car-side text-4xl text-purple-600"></i>
                    </div>
                    <h3 class="font-bold text-gray-800 text-lg">Hatchback</h3>
                    <p class="text-sm text-gray-600 mt-1">167 Cars</p>
                </div>

                <!-- Coupe -->
                <div class="category-card bg-gradient-to-br from-red-50 to-red-100 rounded-xl p-6 text-center cursor-pointer">
                    <div class="bg-white rounded-full w-20 h-20 mx-auto mb-4 flex items-center justify-center shadow-lg">
                        <i class="fas fa-car-alt text-4xl text-red-600"></i>
                    </div>
                    <h3 class="font-bold text-gray-800 text-lg">Coupe</h3>
                    <p class="text-sm text-gray-600 mt-1">92 Cars</p>
                </div>

                <!-- Convertible -->
                <div class="category-card bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-xl p-6 text-center cursor-pointer">
                    <div class="bg-white rounded-full w-20 h-20 mx-auto mb-4 flex items-center justify-center shadow-lg">
                        <i class="fas fa-car text-4xl text-yellow-600"></i>
                    </div>
                    <h3 class="font-bold text-gray-800 text-lg">Convertible</h3>
                    <p class="text-sm text-gray-600 mt-1">54 Cars</p>
                </div>

                <!-- Truck -->
                <div class="category-card bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl p-6 text-center cursor-pointer">
                    <div class="bg-white rounded-full w-20 h-20 mx-auto mb-4 flex items-center justify-center shadow-lg">
                        <i class="fas fa-truck-pickup text-4xl text-orange-600"></i>
                    </div>
                    <h3 class="font-bold text-gray-800 text-lg">Truck</h3>
                    <p class="text-sm text-gray-600 mt-1">78 Cars</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Cars -->
    <section id="featured" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-12">
                <div>
                    <h2 class="text-4xl font-bold text-gray-800 mb-2">Featured Cars</h2>
                    <p class="text-gray-600 text-lg">Handpicked premium vehicles</p>
                </div>
                <a href="#" class="text-emerald-500 hover:text-emerald-600 font-semibold flex items-center">
                    View All <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
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
                            <button class="flex-1 bg-gradient-to-r from-emerald-400 to-emerald-500 text-white py-2 rounded-lg hover:from-emerald-500 hover:to-emerald-600 transition font-semibold">
                                <i class="fas fa-phone mr-2"></i>Call
                            </button>
                            <button class="flex-1 bg-green-500 text-white py-2 rounded-lg hover:bg-green-600 transition font-semibold">
                                <i class="fab fa-whatsapp mr-2"></i>WhatsApp
                            </button>
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
    </div>
    </div>
    </div>
    </div>
        
    </body>
    </html>
    
    
                        