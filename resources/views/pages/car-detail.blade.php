<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoVis - Car Details</title>
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

        .gallery-img {
            transition: transform 0.3s ease;
        }

        .gallery-img:hover {
            transform: scale(1.05 box-shadow: 0 10px 20px rgba(0,0,0,0.2);
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

    <!-- Car Detail Section -->
    <section class="pt-24 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-gray-800 mb-8 animate-slide-in-left">BMW M4 Competition</h2>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 animate-fade-in-up">
                <!-- Gallery -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <img src="https://images.unsplash.com/photo-1617531653332-bd46c24f2068?w=800&q=80" 
                             alt="BMW M4" 
                             class="w-full h-96 object-cover rounded-lg mb-4 gallery-img">
                        <div class="grid grid-cols-4 gap-4">
                            <img src="https://images.unsplash.com/photo-1617531653332-bd46c24f2068?w=200&q=80" 
                                 alt="BMW M4" 
                                 class="w-full h-24 object-cover rounded-lg gallery-img">
                            <img src="https://images.unsplash.com/photo-1605559424843-9e4c228bf1c2?w=200&q=80" 
                                 alt="BMW M4" 
                                 class="w-full h-24 object-cover rounded-lg gallery-img">
                            <video class="w-full h-24 object-cover rounded-lg gallery-img" controls>
                                <source src="https://example.com/car-video.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>

                <!-- Details -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Car Details</h3>
                    <div class="space-y-4">
                        <p><span class="font-semibold">Price:</span> ₹45.5L</p>
                        <p><span class="font-semibold">Brand:</span> BMW</p>
                        <p><span class="font-semibold">Model:</span> M4 Competition</p>
                        <p><span class="font-semibold">Year:</span> 2023</p>
                        <p><span class="font-semibold">Fuel Type:</span> Petrol</p>
                        <p><span class="font-semibold">Transmission:</span> Automatic</p>
                        <p><span class="font-semibold">Mileage:</span> 12,500 km</p>
                        <p><span class="font-semibold">Condition:</span> Used</p>
                        <p><span class="font-semibold">Location:</span> Mumbai, Maharashtra</p>
                        <p><span class="font-semibold">Seller Type:</span> Dealer</p>
                    </div>
                    <div class="mt-6">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Seller Contact</h4>
                        <p><i class="fas fa-phone mr-2 text-emerald-400"></i> +91 98765 43210</p>
                        <p><i class="fab fa-whatsapp mr-2 text-emerald-400"></i> <a href="https://wa.me/+919876543210" class="text-emerald-400 hover:text-emerald-500">Contact via WhatsApp</a></p>
                        <p><i class="fab fa-telegram mr-2 text-emerald-400"></i> <a href="https://t.me/+919876543211" class="text-emerald-400 hover:text-emerald-500">Contact via Telegram</a></p>
                    </div>
                    <div class="mt-6">
                        <a href="car-listing.html" class="text-emerald-400 hover:text-emerald-500 font-semibold">View Seller's Other Listings</a>
                    </div>
                    <div class="mt-6">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Share This Listing</h4>
                        <div class="flex gap-4">
                            <a href="https://twitter.com/intent/tweet?url=https://autovis.com/car-detail.html&text=Check out this BMW M4 on AutoVis!" class="text-blue-500 hover:text-blue-600">
                                <i class="fab fa-twitter text-2xl"></i>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=https://autovis.com/car-detail.html" class="text-blue-700 hover:text-blue-800">
                                <i class="fab fa-facebook text-2xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-lg p-6 mt-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Description</h3>
                <p class="text-gray-600">Well-maintained BMW M4 Competition with low mileage. Fully serviced, single owner, and in excellent condition. Contact for a test drive!</p>
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