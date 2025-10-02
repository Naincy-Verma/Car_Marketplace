@extends('layout.master')
@section('css')
 
@endsection
@section('content')
<body>

    <!-- Hero Section with Slider -->
    <section class="relative h-screen overflow-hidden">
        <!-- Slide 1 -->
        <div id="slide-1" class="hero-slide absolute inset-0 w-full h-full">
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <img src="https://images.unsplash.com/photo-1617531653332-bd46c24f2068?w=1920&q=80" 
                 alt="Luxury Car" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 flex items-center">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                    <div class="max-w-3xl">
                        <h1 class="text-white text-5xl md:text-7xl font-bold mb-6 animate-slide-in-left">
                            STYLE IN<br>EVERY MILE
                        </h1>
                        <p class="text-white text-lg md:text-xl mb-8 animate-fade-in-up">
                            Seamless clicks, Limitless picks: Revolutionize car buying<br>
                            online. Revolutionize car buying online!
                        </p>
                        <button class="bg-transparent border-2 border-white text-white px-8 py-3 rounded hover:bg-white hover:text-black transition-all duration-300 animate-fade-in-up">
                            Contact us
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div id="slide-2" class="hero-slide absolute inset-0 w-full h-full opacity-0">
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <img src="https://images.unsplash.com/photo-1605559424843-9e4c228bf1c2?w=1920&q=80" 
                 alt="Sports Car" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 flex items-center">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                    <div class="max-w-3xl">
                        <h1 class="text-white text-5xl md:text-7xl font-bold mb-6">
                            DRIVE YOUR<br>DREAMS
                        </h1>
                        <p class="text-white text-lg md:text-xl mb-8">
                            Find your perfect ride with our extensive collection<br>
                            of premium vehicles.
                        </p>
                        <button class="bg-transparent border-2 border-white text-white px-8 py-3 rounded hover:bg-white hover:text-black transition-all duration-300">
                            Contact us
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div id="slide-3" class="hero-slide absolute inset-0 w-full h-full opacity-0">
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <img src="https://images.unsplash.com/photo-1614162692292-7ac56d7f7f1e?w=1920&q=80" 
                 alt="Luxury Vehicle" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 flex items-center">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                    <div class="max-w-3xl">
                        <h1 class="text-white text-5xl md:text-7xl font-bold mb-6">
                            LUXURY<br>REDEFINED
                        </h1>
                        <p class="text-white text-lg md:text-xl mb-8">
                            Experience the ultimate in automotive excellence<br>
                            and innovation.
                        </p>
                        <button class="bg-transparent border-2 border-white text-white px-8 py-3 rounded hover:bg-white hover:text-black transition-all duration-300">
                            Contact us
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slider Navigation -->
        <button id="prev-btn" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white bg-opacity-30 hover:bg-opacity-50 text-white p-3 rounded-full transition-all z-10">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
        <button id="next-btn" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white bg-opacity-30 hover:bg-opacity-50 text-white p-3 rounded-full transition-all z-10">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>

        <!-- Slider Indicators -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex space-x-3 z-10">
            <button class="slider-indicator w-3 h-3 rounded-full bg-white" data-slide="0"></button>
            <button class="slider-indicator w-3 h-3 rounded-full bg-white bg-opacity-50" data-slide="1"></button>
            <button class="slider-indicator w-3 h-3 rounded-full bg-white bg-opacity-50" data-slide="2"></button>
        </div>
    </section>

    <!-- Search Form Section -->
    <section class="relative -mt-32 z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-2xl p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                    <input type="text" placeholder="Keyword..." class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-emerald-400">
                    
                    <select class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-emerald-400">
                        <option>Brand</option>
                        <option>Toyota</option>
                        <option>Honda</option>
                        <option>BMW</option>
                        <option>Mercedes</option>
                    </select>
                    
                    <select class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-emerald-400">
                        <option>Year</option>
                        <option>2024</option>
                        <option>2023</option>
                        <option>2022</option>
                        <option>2021</option>
                    </select>
                    
                    <select class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-emerald-400">
                        <option>Transmission</option>
                        <option>Automatic</option>
                        <option>Manual</option>
                    </select>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                    <select class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-emerald-400">
                        <option>Conditions</option>
                        <option>New</option>
                        <option>Used</option>
                        <option>Certified</option>
                    </select>
                    
                    <select class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-emerald-400">
                        <option>Color</option>
                        <option>Black</option>
                        <option>White</option>
                        <option>Silver</option>
                        <option>Red</option>
                    </select>
                    
                    <select class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-emerald-400">
                        <option>Fuel type</option>
                        <option>Petrol</option>
                        <option>Diesel</option>
                        <option>Electric</option>
                        <option>Hybrid</option>
                    </select>
                    
                    <select class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-emerald-400">
                        <option>Mileage</option>
                        <option>0-10,000 km</option>
                        <option>10,000-50,000 km</option>
                        <option>50,000+ km</option>
                    </select>
                </div>

                <div class="flex items-center gap-4">
                    <div class="flex-1">
                        <label class="block text-sm text-gray-600 mb-2">Price</label>
                        <div class="flex items-center gap-4">
                            <input type="text" value="10000" class="w-24 px-3 py-2 border border-gray-300 rounded text-sm">
                            <span class="text-gray-600">-</span>
                            <input type="text" value="1000000" class="w-24 px-3 py-2 border border-gray-300 rounded text-sm">
                            <input type="range" min="10000" max="1000000" class="flex-1">
                        </div>
                    </div>
                    <button class="bg-emerald-400 hover:bg-emerald-500 text-white px-12 py-3 rounded transition-colors mt-6">
                        Search car
                    </button>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')

@endsection