@extends('layout.adminmaster')
@section('title', 'Edit Listing')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Car Listing</h1>

<form action="{{ route('listings.update', $listing->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PUT')

    {{-- Category --}}
    <div class="flex flex-col md:flex-row gap-4 items-center">
        <label class="w-32 font-semibold">Category:</label>
        <select name="category_id" class="border p-2 rounded w-full md:w-1/2">
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" @if($listing->category_id == $cat->id) selected @endif>{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- Brand --}}
    <div class="flex flex-col md:flex-row gap-4 items-center">
        <label class="w-32 font-semibold">Brand:</label>
        <select name="brand_id" class="border p-2 rounded w-full md:w-1/2">
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}" @if($listing->brand_id == $brand->id) selected @endif>{{ $brand->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- Model --}}
    <div class="flex flex-col md:flex-row gap-4 items-center">
        <label class="w-32 font-semibold">Model:</label>
        <select name="model_id" class="border p-2 rounded w-full md:w-1/2">
            @foreach($models as $model)
                <option value="{{ $model->id }}" @if($listing->model_id == $model->id) selected @endif>{{ $model->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- Year --}}
    <div class="flex flex-col md:flex-row gap-4 items-center">
        <label class="w-32 font-semibold">Year:</label>
        <select name="years_id" class="border p-2 rounded w-full md:w-1/2">
            @foreach($years as $year)
                <option value="{{ $year->id }}" @if($listing->years_id == $year->id) selected @endif>{{ $year->year }}</option>
            @endforeach
        </select>
    </div>

    {{-- Fuel Type --}}
    <div class="flex flex-col md:flex-row gap-4 items-center">
        <label class="w-32 font-semibold">Fuel Type:</label>
        <select name="fuel_type_id" class="border p-2 rounded w-full md:w-1/2">
            @foreach($fuel_types as $fuel)
                <option value="{{ $fuel->id }}" @if($listing->fuel_type_id == $fuel->id) selected @endif>{{ $fuel->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- Transmission --}}
    <div class="flex flex-col md:flex-row gap-4 items-center">
        <label class="w-32 font-semibold">Transmission:</label>
        <select name="transmission_type_id" class="border p-2 rounded w-full md:w-1/2">
            @foreach($transmissions as $trans)
                <option value="{{ $trans->id }}" @if($listing->transmission_type_id == $trans->id) selected @endif>{{ $trans->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- Location --}}
    <div class="flex flex-col md:flex-row gap-4 items-center">
        <label class="w-32 font-semibold">Location:</label>
        <select name="location_id" class="border p-2 rounded w-full md:w-1/2">
            @foreach($locations as $loc)
                <option value="{{ $loc->id }}" @if($listing->location_id == $loc->id) selected @endif>{{ $loc->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- Mileage --}}
    <div class="flex flex-col md:flex-row gap-4 items-center">
        <label class="w-32 font-semibold">Mileage:</label>
        <input type="text" name="mileage" value="{{ $listing->mileage }}" class="border p-2 rounded w-full md:w-1/2">
    </div>

    {{-- Price --}}
    <div class="flex flex-col md:flex-row gap-4 items-center">
        <label class="w-32 font-semibold">Price:</label>
        <input type="number" step="0.01" name="price" value="{{ $listing->price }}" class="border p-2 rounded w-full md:w-1/2">
    </div>

    {{-- Condition --}}
    <div class="flex flex-col md:flex-row gap-4 items-center">
        <label class="w-32 font-semibold">Condition:</label>
        <select name="condition" class="border p-2 rounded w-full md:w-1/2">
            <option value="new" @if($listing->condition == 'new') selected @endif>New</option>
            <option value="used" @if($listing->condition == 'used') selected @endif>Used</option>
        </select>
    </div>

    {{-- Description --}}
    <div class="flex flex-col md:flex-row gap-4 items-center">
        <label class="w-32 font-semibold">Description:</label>
        <textarea name="description" rows="4" class="border p-2 rounded w-full md:w-1/2">{{ $listing->description }}</textarea>
    </div>

    {{-- Listing Type --}}
    <div class="flex flex-col md:flex-row gap-4 items-center">
        <label class="w-32 font-semibold">Listing Type:</label>
        <select name="listing_type" class="border p-2 rounded w-full md:w-1/2">
            <option value="featured" @if($listing->listing_type == 'featured') selected @endif>Featured</option>
            <option value="urgent" @if($listing->listing_type == 'urgent') selected @endif>Urgent</option>
        </select>
    </div>

    {{-- Replace Photos --}}
    <div class="flex flex-col md:flex-row gap-4 items-center">
        <label class="w-32 font-semibold">Photos:</label>
        <input type="file" name="photos[]" multiple class="border p-2 rounded w-full md:w-1/2">
    </div>

    {{-- Video URL --}}
    <div class="flex flex-col md:flex-row gap-4 items-center">
        <label class="w-32 font-semibold">Video URL:</label>
        <input type="text" name="video_url" value="{{ $listing->video_url }}" class="border p-2 rounded w-full md:w-1/2">
    </div>

    <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 mt-4 rounded-md text-lg w-[120px]">Update</button>
</form>
@endsection
