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
                    <a href="{{ route('home') }}" class="text-white hover:text-emerald-400 transition-colors font-medium">Home</a>
                    <a href="/car/listing" class="text-white hover:text-emerald-400 transition-colors font-medium">Browse Cars</a>
                    <a href="/car/listing" class="text-white hover:text-emerald-400 transition-colors font-medium">Categories</a>
                    <a href="#contact" class="text-white hover:text-emerald-400 transition-colors font-medium">Contact</a>
                </div>

                <!-- Right Side Actions -->
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

    <!-- Post a Car Section -->
    <section class="min-h-screen pt-24 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-gray-800 mb-8 animate-slide-in-left">Post a New Car</h2>
            
            @if (session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-container bg-white rounded-2xl shadow-lg p-8 animate-fade-in-up">
                <form action="{{ route('user.post-car.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                        <!-- Category -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-car mr-2 text-emerald-400"></i>
                                Category
                            </label>
                            <div class="relative">
                                <i class="fas fa-car absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <select name="category_id" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Brand -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-copyright mr-2 text-emerald-400"></i>
                                Brand
                            </label>
                            <div class="relative">
                                <i class="fas fa-copyright absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <select name="brand_id" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" required>
                                    <option value="">Select Brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('brand_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Model -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-car-side mr-2 text-emerald-400"></i>
                                Model
                            </label>
                            <div class="relative">
                                <i class="fas fa-car-side absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <select name="model_id" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" required>
                                    <option value="">Select Model</option>
                                    @foreach($models as $model)
                                        <option value="{{ $model->id }}">{{ $model->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('model_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Year -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-calendar mr-2 text-emerald-400"></i>
                                Year
                            </label>
                            <div class="relative">
                                <i class="fas fa-calendar absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <select name="years_id" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" required>
                                    <option value="">Select Year</option>
                                    @foreach($years as $year)
                                        <option value="{{ $year->id }}">{{ $year->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('years_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Price -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-dollar-sign mr-2 text-emerald-400"></i>
                                Price (₹)
                            </label>
                            <div class="relative">
                                <i class="fas fa-dollar-sign absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <input type="number" name="price" placeholder="Enter Price" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" required>
                            </div>
                            @error('price')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Mileage -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-tachometer-alt mr-2 text-emerald-400"></i>
                                Mileage (km)
                            </label>
                            <div class="relative">
                                <i class="fas fa-tachometer-alt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <input type="text" name="mileage" placeholder="Enter Mileage" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" required>
                            </div>
                            @error('mileage')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Location -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-map-marker-alt mr-2 text-emerald-400"></i>
                                Location
                            </label>
                            <div class="relative">
                                <i class="fas fa-map-marker-alt absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <select name="location_id" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" required>
                                    <option value="">Select Location</option>
                                    @foreach($locations as $location)
                                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('location_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Fuel Type -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-gas-pump mr-2 text-emerald-400"></i>
                                Fuel Type
                            </label>
                            <div class="relative">
                                <i class="fas fa-gas-pump absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <select name="fuel_type_id" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" required>
                                    <option value="">Select Fuel Type</option>
                                    @foreach($fuel_types as $fuel_type)
                                        <option value="{{ $fuel_type->id }}">{{ $fuel_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('fuel_type_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Transmission -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-cogs mr-2 text-emerald-400"></i>
                                Transmission
                            </label>
                            <div class="relative">
                                <i class="fas fa-cogs absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <select name="transmission_type_id" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" required>
                                    <option value="">Select Transmission</option>
                                    @foreach($transmissions as $transmission)
                                        <option value="{{ $transmission->id }}">{{ $transmission->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('transmission_type_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Condition -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-car-crash mr-2 text-emerald-400"></i>
                                Condition
                            </label>
                            <div class="relative">
                                <i class="fas fa-car-crash absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <select name="condition" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" required>
                                    <option value="">Select Condition</option>
                                    <option value="new">New</option>
                                    <option value="used">Used</option>
                                </select>
                            </div>
                            @error('condition')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Listing Type -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-star mr-2 text-emerald-400"></i>
                                Listing Type
                            </label>
                            <div class="relative">
                                <i class="fas fa-star absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <select name="listing_type" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50">
                                    <option value="featured">Featured</option>
                                    <option value="urgent">Urgent</option>
                                </select>
                            </div>
                            @error('listing_type')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-file-alt mr-2 text-emerald-400"></i>
                            Description
                        </label>
                        <textarea name="description" placeholder="Enter Car Description" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50" rows="5" required></textarea>
                        @error('description')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <!-- Photos/Videos -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-camera mr-2 text-emerald-400"></i>
                            Photos/Videos
                        </label>
                        <input type="file" name="media[]" accept="image/*,video/*" multiple class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 bg-gray-50">
                        <p class="text-sm text-gray-600 mt-2">Upload up to 10 photos or videos (Max 10MB each)</p>
                        @error('media.*')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
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