<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoVis - Post a Car</title>
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

    <!-- Post a Car Section -->
    <section class="min-h-screen pt-24 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-gray-800 mb-8 animate-slide-in-left">Post a New Car</h2>
            <div class="form-container bg-white rounded-2xl shadow-lg p-8 animate-fade-in-up">
                <form>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                        <!-- Category -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-car mr-2 text-emerald-400"></i>
                                Category
                            </label>
                            <div class="relative">
                                <i class="fas fa-car absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <select class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" required>
                                    <option value="">Select Category</option>
                                    <option>SUV</option>
                                    <option>Sedan</option>
                                    <option>Hatchback</option>
                                    <option>Coupe</option>
                                    <option>Convertible</option>
                                    <option>Truck</option>
                                </select>
                            </div>
                        </div>

                        <!-- Brand -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-copyright mr-2 text-emerald-400"></i>
                                Brand
                            </label>
                            <div class="relative">
                                <i class="fas fa-copyright absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <select class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" required>
                                    <option value="">Select Brand</option>
                                    <option>Toyota</option>
                                    <option>Honda</option>
                                    <option>BMW</option>
                                    <option>Mercedes</option>
                                    <option>Audi</option>
                                    <option>Hyundai</option>
                                </select>
                            </div>
                        </div>

                        <!-- Model -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-car-side mr-2 text-emerald-400"></i>
                                Model
                            </label>
                            <div class="relative">
                                <i class="fas fa-car-side absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <input type="text" placeholder="Enter Model" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" required>
                            </div>
                        </div>

                        <!-- Year -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-calendar mr-2 text-emerald-400"></i>
                                Year
                            </label>
                            <div class="relative">
                                <i class="fas fa-calendar absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <select class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" required>
                                    <option value="">Select Year</option>
                                    <option>2024</option>
                                    <option>2023</option>
                                    <option>2022</option>
                                    <option>2021</option>
                                    <option>2020</option>
                                </select>
                            </div>
                        </div>

                        <!-- Price -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-dollar-sign mr-2 text-emerald-400"></i>
                                Price (₹)
                            </label>
                            <div class="relative">
                                <i class="fas fa-dollar-sign absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <input type="number" placeholder="Enter Price" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" required>
                            </div>
                        </div>

                        <!-- Mileage -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-tachometer-alt mr-2 text-emerald-400"></i>
                                Mileage (km)
                            </label>
                            <div class="relative">
                                <i class="fas fa-tachometer-alt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <input type="number" placeholder="Enter Mileage" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" required>
                            </div>
                        </div>

                        <!-- Location -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-map-marker-alt mr-2 text-emerald-400"></i>
                                Location
                            </label>
                            <div class="relative">
                                <i class="fas fa-map-marker-alt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <input type="text" placeholder="Enter Location" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" required>
                            </div>
                        </div>

                        <!-- Fuel Type -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-gas-pump mr-2 text-emerald-400"></i>
                                Fuel Type
                            </label>
                            <div class="relative">
                                <i class="fas fa-gas-pump absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <select class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" required>
                                    <option value="">Select Fuel Type</option>
                                    <option>Petrol</option>
                                    <option>Diesel</option>
                                    <option>Electric</option>
                                    <option>Hybrid</option>
                                    <option>CNG</option>
                                </select>
                            </div>
                        </div>

                        <!-- Transmission -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-cogs mr-2 text-emerald-400"></i>
                                Transmission
                            </label>
                            <div class="relative">
                                <i class="fas fa-cogs absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <select class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" required>
                                    <option value="">Select Transmission</option>
                                    <option>Automatic</option>
                                    <option>Manual</option>
                                </select>
                            </div>
                        </div>

                        <!-- Condition -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-car-crash mr-2 text-emerald-400"></i>
                                Condition
                            </label>
                            <div class="relative">
                                <i class="fas fa-car-crash absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <select class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" required>
                                    <option value="">Select Condition</option>
                                    <option>New</option>
                                    <option>Used</option>
                                </select>
                            </div>
                        </div>

                        <!-- WhatsApp Number -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fab fa-whatsapp mr-2 text-emerald-400"></i>
                                WhatsApp Number
                            </label>
                            <div class="relative">
                                <i class="fab fa-whatsapp absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <input type="tel" placeholder="Enter WhatsApp Number" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" required>
                            </div>
                        </div>

                        <!-- Telegram Number -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fab fa-telegram mr-2 text-emerald-400"></i>
                                Telegram Number
                            </label>
                            <div class="relative">
                                <i class="fab fa-telegram absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <input type="tel" placeholder="Enter Telegram Number" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" required>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-file-alt mr-2 text-emerald-400"></i>
                            Description
                        </label>
                        <textarea placeholder="Enter Car Description" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" rows="5"></textarea>
                    </div>

                    <!-- Photos/Videos -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-camera mr-2 text-emerald-400"></i>
                            Photos/Videos
                        </label>
                        <input type="file" accept="image/*,video/*" multiple class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50">
                        <p class="text-sm text-gray-600 mt-2">Upload up to 10 photos or videos</p>
                    </div>

                    <!-- Featured/Urgent -->
                    <div class="mb-6">
                        <label class="flex items-center text-sm font-semibold text-gray-700">
                            <input type="checkbox" class="mr-2 accent-emerald-400">
                            Mark as Featured/Urgent (Premium Feature)
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-gradient-to-r from-emerald-400 to-emerald-500 hover:from-emerald-500 hover:to-emerald-600 text-white px-8 py-4 rounded-lg transition-all font-semibold text-lg shadow-lg hover:shadow-xl">
                        <i class="fas fa-car mr-2"></i>
                        Post Car
                    </button>
                </form>
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