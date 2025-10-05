@extends('layout.adminmaster')
@section('title', 'Add Listing')

@section('content')
<h1 class="text-2xl font-bold mb-4">Add Car Listing</h1>

<form action="{{ route('listings.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf

    {{-- Category --}}
    <div>
        <label class="block mb-1 font-semibold">Category</label>
        <select name="category_id" class="w-1/2 border p-2 rounded-lg border-gray-400 shadow-sm" required>
            <option value="">Select Category</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
        @error('category_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Brand --}}
    <div>
        <label class="block mb-1 font-semibold">Brand</label>
        <select name="brand_id" class="w-1/2 border p-2 rounded-lg border-gray-400 shadow-sm" required>
            <option value="">Select Brand</option>
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
        </select>
        @error('brand_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Model --}}
    <div>
        <label class="block mb-1 font-semibold">Model</label>
        <select name="model_id" class="w-1/2 border p-2 rounded-lg border-gray-400 shadow-sm" required>
            <option value="">Select Model</option>
            @foreach($models as $model)
                <option value="{{ $model->id }}">{{ $model->name }}</option>
            @endforeach
        </select>
        @error('model_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Year --}}
    <div>
        <label class="block mb-1 font-semibold">Year</label>
        <select name="years_id" class="w-1/2 border p-2 rounded-lg border-gray-400 shadow-sm" required>
            <option value="">Select Year</option>
            @foreach($years as $year)
                <option value="{{ $year->id }}">{{ $year->year }}</option>
            @endforeach
        </select>
        @error('years_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Fuel Type --}}
    <div>
        <label class="block mb-1 font-semibold">Fuel Type</label>
        <select name="fuel_type_id" class="w-1/2 border p-2 rounded-lg border-gray-400 shadow-sm" required>
            <option value="">Select Fuel</option>
            @foreach($fuel_types as $fuel)
                <option value="{{ $fuel->id }}">{{ $fuel->name }}</option>
            @endforeach
        </select>
        @error('fuel_type_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Transmission --}}
    <div>
        <label class="block mb-1 font-semibold">Transmission</label>
        <select name="transmission_type_id" class="w-1/2 border p-2 rounded-lg border-gray-400 shadow-sm" required>
            <option value="">Select Transmission</option>
            @foreach($transmissions as $trans)
                <option value="{{ $trans->id }}">{{ $trans->name }}</option>
            @endforeach
        </select>
        @error('transmission_type_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Location --}}
    <div>
        <label class="block mb-1 font-semibold">Location</label>
        <select name="location_id" class="w-1/2 border p-2 rounded-lg border-gray-400 shadow-sm" required>
            <option value="">Select Location</option>
            @foreach($locations as $loc)
                <option value="{{ $loc->id }}">{{ $loc->name }}</option>
            @endforeach
        </select>
        @error('location_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Mileage --}}
    <div>
        <label class="block mb-1 font-semibold">Mileage</label>
        <input type="text" name="mileage" placeholder="Enter Mileage" class="w-1/2 border p-2 rounded-lg border-gray-400 shadow-sm">
        @error('mileage')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Price --}}
    <div>
        <label class="block mb-1 font-semibold">Price</label>
        <input type="number" step="0.01" name="price" placeholder="Enter Price" class="w-1/2 border p-2 rounded-lg border-gray-400 shadow-sm">
        @error('price')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Condition --}}
    <div>
        <label class="block mb-1 font-semibold">Condition</label>
        <select name="condition" class="w-1/2 border p-2 rounded-lg border-gray-400 shadow-sm">
            <option value="new">New</option>
            <option value="used">Used</option>
        </select>
        @error('condition')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Description --}}
    <div>
        <label class="block mb-1 font-semibold">Description</label>
        <textarea name="description" rows="4" placeholder="Enter Description" class="w-1/2 border p-2 rounded-lg border-gray-400 shadow-sm"></textarea>
        @error('description')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Listing Type --}}
    <div>
        <label class="block mb-1 font-semibold">Listing Type</label>
        <select name="listing_type" class="w-1/2 border p-2 rounded-lg border-gray-400 shadow-sm">
            <option value="featured">Featured</option>
            <option value="urgent">Urgent</option>
        </select>
        @error('listing_type')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Photos --}}
    <div>
        <label class="block mb-1 font-semibold">Upload Photos</label>
        <input type="file" name="photos[]" multiple class="w-1/2 border p-2 rounded-lg border-gray-400 shadow-sm">
        @error('photos')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Video URL --}}
    <div>
        <label class="block mb-1 font-semibold">Video URL (optional)</label>
        <input type="text" name="video_url" placeholder="Paste YouTube/Vimeo link" class="w-1/2 border p-2 rounded-lg border-gray-400 shadow-sm">
    </div>

    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-lg w-[120px]">Save</button>
</form>
@endsection
