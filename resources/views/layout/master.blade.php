<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
   <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
   <link href="https://fonts.googleapis.com/css?family=Rajdhani&display=swap" rel="stylesheet" />
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
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

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(100px);
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

        .animate-slide-in-left {
            animation: slideInLeft 1s ease-out forwards;
        }

        .animate-slide-in-right {
            animation: slideInRight 1s ease-out forwards;
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .hero-slide {
            transition: opacity 1s ease-in-out;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>

   @yield('css')
</head>
<body class="overflow-x-hidden">
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
                    <div class="bg-blue-600 px-4 py-2 mr-2">
                        <span class="text-white text-2xl font-bold">AUTOVIS</span>
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
                        <a href="{{ route('user.dashboard') }}"
                            class="hidden md:flex text-white hover:text-emerald-400 transition-colors items-center font-medium">
                            <i class="fas fa-user mr-2"></i>
                            Dashboard
                        </a>
                        <a href="{{ route('user.post-car') }}"
                            class="bg-emerald-400 hover:bg-emerald-500 text-white px-6 py-2 rounded transition-colors font-semibold">
                            Sell Car
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-white hover:text-emerald-400 transition-colors font-medium">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                            class="hidden md:flex text-white hover:text-emerald-400 transition-colors items-center font-medium">
                            <i class="fas fa-user mr-2"></i>
                            Login
                        </a>
                        <a href="{{ route('register') }}"
                            class="bg-emerald-400 hover:bg-emerald-500 text-white px-6 py-2 rounded transition-colors font-semibold">
                            Register
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <!-- Page content -->
  <main class="pt-24">
    @yield('content')
  </main>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="{{ asset('assets/js/script.js') }}"></script>
  <!-- Navbar Scroll Effect -->
  <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('bg-black', 'shadow-lg');
                navbar.classList.remove('bg-transparent');
            } else {
                navbar.classList.remove('bg-black', 'shadow-lg');
                navbar.classList.add('bg-transparent');
            }
        });

        // Slider functionality
        let currentSlide = 0;
        const slides = document.querySelectorAll('.hero-slide');
        const indicators = document.querySelectorAll('.slider-indicator');
        const totalSlides = slides.length;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.style.opacity = i === index ? '1' : '0';
            });
            indicators.forEach((indicator, i) => {
                if (i === index) {
                    indicator.classList.remove('bg-opacity-50');
                } else {
                    indicator.classList.add('bg-opacity-50');
                }
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            showSlide(currentSlide);
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            showSlide(currentSlide);
        }

        // Auto slide
        setInterval(nextSlide, 5000);

        // Manual controls
        document.getElementById('next-btn').addEventListener('click', nextSlide);
        document.getElementById('prev-btn').addEventListener('click', prevSlide);

        // Indicator controls
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                currentSlide = index;
                showSlide(currentSlide);
            });
        });
    </script>
  @yield('js')
</body>
</html>