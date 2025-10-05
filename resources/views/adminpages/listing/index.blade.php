@extends('layout.adminmaster')
@section('title', 'Listings')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Car Listings</h1>
    <a href="{{ route('listings.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-lg">
        + Add Listing
    </a>
</div>

<table class="w-full border-collapse border border-gray-300">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Brand</th>
            <th class="border px-4 py-2">Model</th>
            <th class="border px-4 py-2">Price</th>
            <th class="border px-4 py-2">Year</th>
            <th class="border px-4 py-2">Fuel</th>
            <th class="border px-4 py-2">Location</th>
            <th class="border px-4 py-2">Condition</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($listings as $listing)
        <tr class="hover:bg-gray-50">
            <td class="border px-4 py-2">{{ $listing->id }}</td>
            <td class="border px-4 py-2">{{ $listing->brand->name ?? '-' }}</td>
            <td class="border px-4 py-2">{{ $listing->model->name ?? '-' }}</td>
            <td class="border px-4 py-2">{{ $listing->price ? '₹'.number_format($listing->price) : '-' }}</td>
            <td class="border px-4 py-2">{{ $listing->year->year ?? '-' }}</td>
            <td class="border px-4 py-2">{{ $listing->fuelType->name ?? '-' }}</td>
            <td class="border px-4 py-2">{{ $listing->location->name ?? '-' }}</td>
            <td class="border px-4 py-2 capitalize">{{ $listing->condition ?? '-' }}</td>
            <td class="border px-4 py-2 flex gap-2 justify-center">

                <!-- Edit Icon -->
                <a href="{{ route('listings.edit', $listing->id) }}" 
                    class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                    <i class="fas fa-edit"></i>
                </a>

                <!-- View Icon -->
                <a href="{{ route('listings.show', $listing->id) }}" 
                    class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" 
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M2.458 12C3.732 7.943 7.523 5 12 5
                        c4.477 0 8.268 2.943 9.542 7
                        -1.274 4.057-5.065 7-9.542 7
                        -4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </a>

                <!-- Delete Icon -->
                <button 
                    onclick="openDeleteModal('listings', {{ $listing->id }})"
                    class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
