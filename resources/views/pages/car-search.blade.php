<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoVis - Search Cars</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
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

        .navbar-scrolled {
            background-color: rgba(0, 0, 0, 0.8) !important ;
            backdrop-filter: blur(10px);
        }

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
                    <a href="{{ route('home') }}" class="text-white hover:text-emerald-400 transition-colors font-medium">Home</a>
                    <a href="/car/listing" class="text-white hover:text-emerald-400 transition-colors font-medium">Browse Cars</a>
                    <a href="/car/listing" class="text-white hover:text-emerald-400 transition-colors font-medium">Categories</a>
                    <a href="#contact" class="text-white hover:text-emerald-400 transition-colors font-medium">Contact</a>
                </div>
                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ route('user.dashboard') }}" class="hidden md:flex text-white hover:text-emerald-400 transition-colors items-center font-medium">
                            <i class="fas fa-user mr-2"></i>
                            Dashboard
                        </a>
                        <a href="{{ route('user.post-car') }}" class="bg-emerald-400 hover:bg-emerald-500 text-white px-6 py-2 rounded-full transition-colors font-semibold">
                            Post Car
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-white hover:text-emerald-400 transition-colors font-medium">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="hidden md:flex text-white hover:text-emerald-400 transition-colors items-center font-medium">
                            <i class="fas fa-user mr-2"></i>
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="bg-emerald-400 hover:bg-emerald-500 text-white px-6 py-2 rounded-full transition-colors font-semibold">
                            Register
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Search Section -->
    <section class="pt-24 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-gray-800 mb-8 animate-slide-in-left">Search Cars</h2>
            <div class="form-container bg-white rounded-2xl shadow-lg p-8 animate-fade-in-up">
                <form>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
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
                            </select>
                        </div>
                        <div class="relative">
                            <i class="fas fa-car-side absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            <input type="text" placeholder="Model" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50">
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
                            <i class="fas fa-map-marker-alt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            <input type="text" placeholder="Location" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50">
                        </div>
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
                            <i class="fas fa-cogs absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            <select class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50">
                                <option>Transmission</option>
                                <option>Automatic</option>
                                <option>Manual</option>
                            </select>
                        </div>
                        <div class="flex items-center gap-4">
                            <input type="number" placeholder="Min Price (₹)" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50">
                            <input type="number" placeholder="Max Price (₹)" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row items-center gap-4">
                        <select class="w-full md:w-auto px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50">
                            <option>Sort By: Price Low to High</option>
                            <option>Price High to Low</option>
                            <option>Newest First</option>
                            <option>Mileage Low to High</option>
                        </select>
                        <button type="submit" class="w-full md:w-auto bg-gradient-to-r from-emerald-400 to-emerald-500 hover:from-emerald-500 hover:to-emerald-600 text-white px-8 py-4 rounded-lg transition-all font-semibold text-lg shadow-lg hover:shadow-xl">
                            <i class="fas fa-search mr-2"></i>
                            Search
                        </button>
                    </div>
                </form>
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