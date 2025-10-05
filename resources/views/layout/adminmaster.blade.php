<!DOCTYPE html>
<html lang="en" class="transition-colors duration-300">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

     <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('admin-assets/css/style.css') }}">
    @yield('css')
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside id="sidebar" class="bg-blue-900 w-64 flex-shrink-0 transition-all duration-300">
            <div class="p-6 flex items-center justify-between border-b">
                <h1 class="text-white font-bold text-3xl">Admin Panel</h1>
            </div>

            <!-- Sidebar Nav -->
            <nav class="mt-6 space-y-2 text-white">

                <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-6 hover:bg-blue-700 rounded text-lg">📊 Dashboard</a>

                <!-- Brand Dropdown -->
                <div x-data="{ open: false }">
                    <button @click="open=!open" 
                            class="w-full flex items-center justify-between py-2.5 px-6 hover:bg-blue-700 rounded">
                        <span class="text-lg">👥 Brand</span>
                        <svg :class="{'rotate-180': open}" 
                            class="w-4 h-4 transform transition-transform duration-300" 
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-cloak class="ml-6 space-y-1">
                        <a href="{{ route('brands.index') }}" class="block py-2 px-4 hover:bg-blue-700 rounded text-md">All Brand</a>
                        <a href="{{ route('brands.create') }}" class="block py-2 px-4 hover:bg-blue-700 rounded text-md">Add Brand</a>
                    </div>
                </div>

                <!-- Category Dropdown -->
                <div x-data="{ open: false }">
                    <button @click="open=!open" 
                            class="w-full flex items-center justify-between py-2.5 px-6 hover:bg-blue-700 rounded">
                        <span class="text-lg">🛡️ Category</span>
                        <svg :class="{'rotate-180': open}" 
                            class="w-4 h-4 transform transition-transform duration-300" 
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-cloak class="ml-6 space-y-1">
                        <a href="{{ route('categories.index') }}" class="block py-2 px-4 hover:bg-blue-700 rounded text-md">View Categories</a>
                        <a href="{{ route('categories.create') }}" class="block py-2 px-4 hover:bg-blue-700 rounded text-md">Add Categories</a>
                    </div>
                </div>

                <!-- Listings Dropdown -->
                <div x-data="{ open: false }">
                    <button @click="open=!open" 
                            class="w-full flex items-center justify-between py-2.5 px-6 hover:bg-blue-700 rounded">
                        <span class="text-lg">🔑 Listings</span>
                        <svg :class="{'rotate-180': open}" 
                            class="w-4 h-4 transform transition-transform duration-300" 
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-cloak class="ml-6 space-y-1">
                        <a href="{{ route('listings.index') }}" class="block py-2 px-4 hover:bg-blue-700 rounded text-md">View Listings</a>
                        <a href="{{ route('listings.create') }}" class="block py-2 px-4 hover:bg-blue-700 rounded text-md">Add Listings</a>
                    </div>
                </div>

                <!-- Car Model Dropdown -->
                <div x-data="{ open: false }">
                    <button @click="open=!open" 
                            class="w-full flex items-center justify-between py-2.5 px-6 hover:bg-blue-700 rounded">
                        <span class="text-lg">🔑 Car Model</span>
                        <svg :class="{'rotate-180': open}" 
                            class="w-4 h-4 transform transition-transform duration-300" 
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-cloak class="ml-6 space-y-1">
                        <a href="{{ route('models.index') }}" class="block py-2 px-4 hover:bg-blue-700 rounded text-md">View Car Model</a>
                        <a href="{{ route('models.create') }}" class="block py-2 px-4 hover:bg-blue-700 rounded text-md">Add Car Model</a>
                    </div>
                </div>

                <!-- Fuel type Dropdown -->
                <div x-data="{ open: false }">
                    <button @click="open=!open" 
                            class="w-full flex items-center justify-between py-2.5 px-6 hover:bg-blue-700 rounded">
                        <span class="text-lg">🔑 Fuel type</span>
                        <svg :class="{'rotate-180': open}" 
                            class="w-4 h-4 transform transition-transform duration-300" 
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-cloak class="ml-6 space-y-1">
                        <a href="{{ route('fuel-types.index') }}" class="block py-2 px-4 hover:bg-blue-700 rounded text-md">View Fuel Type</a>
                        <a href="{{ route('fuel-types.create') }}" class="block py-2 px-4 hover:bg-blue-700 rounded text-md">Add Fuel Type</a>
                    </div>
                </div>

                <!-- Transmission type Dropdown -->
                <div x-data="{ open: false }">
                    <button @click="open=!open" 
                            class="w-full flex items-center justify-between py-2.5 px-6 hover:bg-blue-700 rounded">
                        <span class="text-lg">🔑 Transmission type</span>
                        <svg :class="{'rotate-180': open}" 
                            class="w-4 h-4 transform transition-transform duration-300" 
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-cloak class="ml-6 space-y-1">
                        <a href="{{ route('transmission.index') }}" class="block py-2 px-4 hover:bg-blue-700 rounded text-md">View Transmission Type</a>
                        <a href="{{ route('transmission.create') }}" class="block py-2 px-4 hover:bg-blue-700 rounded text-md">Add Transmission Type</a>
                    </div>
                </div>

                <!-- Location  Dropdown -->
                <div x-data="{ open: false }">
                    <button @click="open=!open" 
                            class="w-full flex items-center justify-between py-2.5 px-6 hover:bg-blue-700 rounded">
                        <span class="text-lg">🔑 Location </span>
                        <svg :class="{'rotate-180': open}" 
                            class="w-4 h-4 transform transition-transform duration-300" 
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-cloak class="ml-6 space-y-1">
                        <a href="{{ route('locations.index') }}" class="block py-2 px-4 hover:bg-blue-700 rounded text-md">View Locations</a>
                        <a href="{{ route('locations.create') }}" class="block py-2 px-4 hover:bg-blue-700 rounded text-md">Add Locations</a>
                    </div>
                </div>

                <!-- Year  Dropdown -->
                <div x-data="{ open: false }">
                    <button @click="open=!open" 
                            class="w-full flex items-center justify-between py-2.5 px-6 hover:bg-blue-700 rounded">
                        <span class="text-lg">🔑 Year </span>
                        <svg :class="{'rotate-180': open}" 
                            class="w-4 h-4 transform transition-transform duration-300" 
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-cloak class="ml-6 space-y-1">
                        <a href="{{ route('years.index') }}" class="block py-2 px-4 hover:bg-blue-700 rounded text-md">View Years</a>
                        <a href="{{ route('years.create') }}" class="block py-2 px-4 hover:bg-blue-700 rounded text-md">Add Years</a>
                    </div>
                </div>
            </nav>
        </aside>

         <!-- Main Content -->
        <div class="flex-1 flex flex-col">

            <!-- Topbar (Blue Background) -->
            <header class="flex items-center justify-between bg-blue-800 text-white p-4 shadow">
            <div class="flex items-center space-x-4">
                <!-- Search -->
                <input type="text" placeholder="Search..."
                       class="px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-500 text-black">
            </div>

            <div class="flex items-center space-x-4">
                <!-- Notifications -->
                <button class="p-2 rounded hover:bg-blue-700">🔔</button>

                <!-- Profile / Logout -->
                <div class="relative">
                    <button class="p-2 rounded hover:bg-blue-700">
                        <img class="w-8 h-8 rounded-full" src="https://i.pravatar.cc/300" alt="Profile">
                    </button>
                    <div class="absolute right-0 mt-2 w-40 bg-white text-black rounded shadow hidden" id="profileMenu">
                        <a href="#" class="block px-4 py-2 hover:bg-gray-200">Profile</a>
                        <a href="#" class="block px-4 py-2 text-red-600 hover:bg-gray-200">Logout</a>
                    </div>
                </div>
            </div>
            </header>
            <div class="max-w-5xl mx-auto mt-4">
            @if(session('success'))
                <div class="mb-3 p-3 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-2 p-3 bg-red-100 text-red-800 rounded">
                    {{ session('error') }}
                </div>
            @endif
            </div>

            <!-- Page Content -->
             <main class="flex-1 p-6 bg-gray-100">
                <div class="bg-white rounded-lg shadow p-6">
                    @yield('content')
                 </div>
            </main>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg p-6 w-96 text-center">
        <h2 class="text-xl font-bold mb-4">Are you sure?</h2>
        <p class="mb-6">Do you really want to delete this employee? This action cannot be undone.</p>
        <div class="flex justify-center gap-4">
            <button onclick="closeDeleteModal()" class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
            </form>
        </div>
    </div>
    </div>

    <script>
    function openDeleteModal(resourceType, id) {
        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');
        form.action = `/${resourceType}/${id}`; // set form action dynamically
        modal.classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
    </script>

    <!-- Alpine.js for dropdowns -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @yield('script')

</body>
</html>
