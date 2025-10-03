@extends('layout.adminmaster')

@section('content')
<div class="p-6 bg-gray-900 min-h-screen">
    <div class="max-w-4xl mx-auto bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-lg p-8 animate-fade-in-up">
        <h2 class="text-3xl font-bold text-gray-100 mb-6 flex items-center">
            <i class="fas fa-car mr-3 text-emerald-500"></i> Add New Car Listing
        </h2>

        <form action="{{ route('listings.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Customer -->
            <div>
                <label class="block text-sm font-semibold text-gray-300 mb-2">
                    <i class="fas fa-user mr-2 text-emerald-500"></i> Customer
                </label>
                <div class="relative">
                    <select name="user_id" class="w-full p-3 bg-gray-800 border border-gray-600 rounded-lg text-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200 hover:border-emerald-600 appearance-none" required>
                        <option value="" class="bg-gray-800">-- Select Customer --</option>
                        <option value="1" class="bg-gray-800">John Doe (Individual)</option>
                        <option value="2" class="bg-gray-800">AutoMart (Dealer)</option>
                        <option value="3" class="bg-gray-800">CarBroker Inc. (Broker)</option>
                        <option value="4" class="bg-gray-800">Jane Smith (Individual)</option>
                        <option value="5" class="bg-gray-800">Elite Motors (Dealer)</option>
                    </select>
                    <i class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
                @error('user_id')
                    <p class="text-red-400 text-sm mt-1 bg-red-900/20 p-2 rounded">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category and Brand -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-300 mb-2">
                        <i class="fas fa-car-side mr-2 text-emerald-500"></i> Category
                    </label>
                    <div class="relative">
                        <select name="category_id" class="w-full p-3 bg-gray-800 border border-gray-600 rounded-lg text-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200 hover:border-emerald-600 appearance-none" required>
                            <option value="" class="bg-gray-800">-- Select Category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" class="bg-gray-800">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <i class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                    @error('category_id')
                        <p class="text-red-400 text-sm mt-1 bg-red-900/20 p-2 rounded">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-300 mb-2">
                        <i class="fas fa-copyright mr-2 text-emerald-500"></i> Brand
                    </label>
                    <div class="relative">
                        <select name="brand_id" class="w-full p-3 bg-gray-800 border border-gray-600 rounded-lg text-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200 hover:border-emerald-600 appearance-none" required>
                            <option value="" class="bg-gray-800">-- Select Brand --</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" class="bg-gray-800">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        <i class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                    @error('brand_id')
                        <p class="text-red-400 text-sm mt-1 bg-red-900/20 p-2 rounded">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Car Model and Year -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-300 mb-2">
                        <i class="fas fa-car mr-2 text-emerald-500"></i> Car Model
                    </label>
                    <input type="text" name="model" class="w-full p-3 bg-gray-800 border border-gray-600 rounded-lg text-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200 hover:border-emerald-600 placeholder-gray-500" placeholder="e.g., M4 Competition" required>
                    @error('model')
                        <p class="text-red-400 text-sm mt-1 bg-red-900/20 p-2 rounded">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-300 mb-2">
                        <i class="fas fa-calendar mr-2 text-emerald-500"></i> Year
                    </label>
                    <input type="number" name="year" min="1900" max="{{ date('Y') }}" class="w-full p-3 bg-gray-800 border border-gray-600 rounded-lg text-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200 hover:border-emerald-600 placeholder-gray-500" placeholder="e.g., 2023" required>
                    @error('year')
                        <p class="text-red-400 text-sm mt-1 bg-red-900/20 p-2 rounded">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Price and Mileage -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-300 mb-2">
                        <i class="fas fa-dollar-sign mr-2 text-emerald-500"></i> Price (₹)
                    </label>
                    <input type="number" step="0.01" name="price" class="w-full p-3 bg-gray-800 border border-gray-600 rounded-lg text-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200 hover:border-emerald-600 placeholder-gray-500" placeholder="e.g., 4500000" required>
                    @error('price')
                        <p class="text-red-400 text-sm mt-1 bg-red-900/20 p-2 rounded">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-300 mb-2">
                        <i class="fas fa-tachometer-alt mr-2 text-emerald-500"></i> Mileage (km)
                    </label>
                    <input type="number" name="mileage" class="w-full p-3 bg-gray-800 border border-gray-600 rounded-lg text-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200 hover:border-emerald-600 placeholder-gray-500" placeholder="e.g., 12500">
                    @error('mileage')
                        <p class="text-red-400 text-sm mt-1 bg-red-900/20 p-2 rounded">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Location and Image -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-300 mb-2">
                        <i class="fas fa-map-marker-alt mr-2 text-emerald-500"></i> Location
                    </label>
                    <input type="text" name="location" class="w-full p-3 bg-gray-800 border border-gray-600 rounded-lg text-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200 hover:border-emerald-600 placeholder-gray-500" placeholder="e.g., Mumbai, Maharashtra">
                    @error('location')
                        <p class="text-red-400 text-sm mt-1 bg-red-900/20 p-2 rounded">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-300 mb-2">
                        <i class="fas fa-image mr-2 text-emerald-500"></i> Car Image
                    </label>
                    <div class="relative">
                        <input type="file" name="image" accept="image/*" class="w-full p-3 bg-gray-800 border border-gray-600 rounded-lg text-gray-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-emerald-600 file:text-white file:hover:bg-emerald-700 transition duration-200">
                    </div>
                    @error('image')
                        <p class="text-red-400 text-sm mt-1 bg-red-900/20 p-2 rounded">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Fuel Type and Transmission -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-300 mb-2">
                        <i class="fas fa-gas-pump mr-2 text-emerald-500"></i> Fuel Type
                    </label>
                    <div class="relative">
                        <select name="fuel_type" class="w-full p-3 bg-gray-800 border border-gray-600 rounded-lg text-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200 hover:border-emerald-600 appearance-none">
                            <option value="" class="bg-gray-800">-- Select Fuel Type --</option>
                            <option value="Petrol" class="bg-gray-800">Petrol</option>
                            <option value="Diesel" class="bg-gray-800">Diesel</option>
                            <option value="CNG" class="bg-gray-800">CNG</option>
                            <option value="Electric" class="bg-gray-800">Electric</option>
                            <option value="Hybrid" class="bg-gray-800">Hybrid</option>
                        </select>
                        <i class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                    @error('fuel_type')
                        <p class="text-red-400 text-sm mt-1 bg-red-900/20 p-2 rounded">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-300 mb-2">
                        <i class="fas fa-cogs mr-2 text-emerald-500"></i> Transmission
                    </label>
                    <div class="relative">
                        <select name="transmission" class="w-full p-3 bg-gray-800 border border-gray-600 rounded-lg text-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200 hover:border-emerald-600 appearance-none">
                            <option value="" class="bg-gray-800">-- Select Transmission --</option>
                            <option value="Automatic" class="bg-gray-800">Automatic</option>
                            <option value="Manual" class="bg-gray-800">Manual</option>
                        </select>
                        <i class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                    @error('transmission')
                        <p class="text-red-400 text-sm mt-1 bg-red-900/20 p-2 rounded">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Condition and Featured -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-300 mb-2">
                        <i class="fas fa-tools mr-2 text-emerald-500"></i> Condition
                    </label>
                    <div class="relative">
                        <select name="condition" class="w-full p-3 bg-gray-800 border border-gray-600 rounded-lg text-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200 hover:border-emerald-600 appearance-none">
                            <option value="" class="bg-gray-800">-- Select Condition --</option>
                            <option value="new" class="bg-gray-800">New</option>
                            <option value="used" class="bg-gray-800">Used</option>
                        </select>
                        <i class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                    @error('condition')
                        <p class="text-red-400 text-sm mt-1 bg-red-900/20 p-2 rounded">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center mt-6">
                    <label class="flex items-center text-sm font-semibold text-gray-300">
                        <input type="checkbox" name="is_featured" value="1" class="mr-2 h-5 w-5 text-emerald-500 focus:ring-emerald-500 border-gray-600 rounded bg-gray-800">
                        <i class="fas fa-star mr-2 text-emerald-500"></i> Featured Listing
                    </label>
                    @error('is_featured')
                        <p class="text-red-400 text-sm mt-1 bg-red-900/20 p-2 rounded">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-semibold text-gray-300 mb-2">
                    <i class="fas fa-file-alt mr-2 text-emerald-500"></i> Description
                </label>
                <textarea name="description" rows="6" class="w-full p-3 bg-gray-800 border border-gray-600 rounded-lg text-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200 hover:border-emerald-600 placeholder-gray-500" placeholder="Describe the car (e.g., features, condition, history)"></textarea>
                @error('description')
                    <p class="text-red-400 text-sm mt-1 bg-red-900/20 p-2 rounded">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div>
                <label class="block text-sm font-semibold text-gray-300 mb-2">
                    <i class="fas fa-info-circle mr-2 text-emerald-500"></i> Status
                </label>
                <div class="relative">
                    <select name="status" class="w-full p-3 bg-gray-800 border border-gray-600 rounded-lg text-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-200 hover:border-emerald-600 appearance-none">
                        <option value="active" class="bg-gray-800">Active</option>
                        <option value="pending" class="bg-gray-800">Pending</option>
                        <option value="rejected" class="bg-gray-800">Rejected</option>
                    </select>
                    <i class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
                @error('status')
                    <p class="text-red-400 text-sm mt-1 bg-red-900/20 p-2 rounded">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex gap-4">
                <button type="submit" class="bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 text-white px-6 py-3 rounded-lg transition-all duration-200 font-semibold shadow-md hover:shadow-lg transform hover:scale-105">
                    <i class="fas fa-save mr-2"></i> Save Listing
                </button>
                <a href="{{ route('listings.index') }}" class="bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white px-6 py-3 rounded-lg transition-all duration-200 font-semibold shadow-md hover:shadow-lg transform hover:scale-105">
                    <i class="fas fa-times mr-2"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-up {
        animation: fadeInUp 0.5s ease-out forwards;
    }

    /* Custom file input styling */
    input[type="file"]::file-selector-button {
        transition: all 0.2s ease;
    }

    input[type="file"]::file-selector-button:hover {
        background-color: #059669; /* emerald-600 */
    }

    /* Custom select arrow styling */
    select {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }
</style>
@endsection