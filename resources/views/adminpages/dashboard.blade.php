@extends('layout.adminmaster')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

    <!-- Total Employees (Green) -->
    <div class="bg-white border-2 border-gray-300 text-black rounded-lg shadow-md p-6 
                transition duration-300 hover:bg-green-200 hover:bg-opacity-40 
                hover:border-green-600 hover:text-green-600 hover:shadow-2xl">
        <h2 class="text-xl font-bold mb-2">Total Brand</h2>
        <p class="text-3xl font-semibold">{{ $totalBrands ?? 0 }}</p>
    </div>

    <!-- Total Leads (Red) -->
    <div class="bg-white border-2 border-gray-300 text-black rounded-lg shadow-md p-6 
                transition duration-300 hover:bg-red-200 hover:bg-opacity-40 
                hover:border-red-600 hover:text-red-600 hover:shadow-2xl">
        <h2 class="text-xl font-bold mb-2">Total Listings</h2>
        <p class="text-3xl font-semibold">{{ $totalListings ?? 0 }}</p>
    </div>

</div>
@endsection
