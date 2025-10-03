@extends('layout.adminmaster')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Edit Listing</h2>

    <form action="{{ route('listings.update', $listing->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf @method('PUT')

        <div>
            <label class="block">Customer</label>
            <select name="user_id" class="w-full border rounded p-2" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $listing->user_id == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }} ({{ $customer->user_type }})
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block">Category</label>
            <select name="category_id" class="w-full border rounded p-2" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $listing->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block">Brand</label>
            <select name="brand_id" class="w-full border rounded p-2" required>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ $listing->brand_id == $brand->id ? 'selected' : '' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block">Car Model</label>
            <input type="text" name="model" class="w-full border rounded p-2" value="{{ $listing->model }}" required>
        </div>

        <div>
            <label class="block">Year</label>
            <input type="number" name="year" min="1900" max="{{ date('Y') }}" class="w-full border rounded p-2" value="{{ $listing->year }}" required>
        </div>

        <div>
            <label class="block">Price</label>
            <input type="number" step="0.01" name="price" class="w-full border rounded p-2" value="{{ $listing->price }}" required>
        </div>

        <div>
            <label class="block">Mileage</label>
            <input type="text" name="mileage" class="w-full border rounded p-2" value="{{ $listing->mileage }}">
        </div>

        <div>
            <label class="block">Location</label>
            <input type="text" name="location" class="w-full border rounded p-2" value="{{ $listing->location }}">
        </div>

        <div>
            <label class="block">Fuel Type</label>
            <select name="fuel_type" class="w-full border rounded p-2">
                <option value="Petrol" {{ $listing->fuel_type == 'Petrol' ? 'selected' : '' }}>Petrol</option>
                <option value="Diesel" {{ $listing->fuel_type == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                <option value="CNG" {{ $listing->fuel_type == 'CNG' ? 'selected' : '' }}>CNG</option>
                <option value="Electric" {{ $listing->fuel_type == 'Electric' ? 'selected' : '' }}>Electric</option>
            </select>
        </div>

        <div>
            <label class="block">Transmission</label>
            <select name="transmission" class="w-full border rounded p-2">
                <option value="Automatic" {{ $listing->transmission == 'Automatic' ? 'selected' : '' }}>Automatic</option>
                <option value="Manual" {{ $listing->transmission == 'Manual' ? 'selected' : '' }}>Manual</option>
            </select>
        </div>

        <div>
            <label class="block">Condition</label>
            <select name="condition" class="w-full border rounded p-2">
                <option value="new" {{ $listing->condition == 'new' ? 'selected' : '' }}>New</option>
                <option value="used" {{ $listing->condition == 'used' ? 'selected' : '' }}>Used</option>
            </select>
        </div>

        <div>
            <label class="block">Description</label>
            <textarea name="description" class="w-full border rounded p-2">{{ $listing->description }}</textarea>
        </div>

        <div>
            <label><input type="checkbox" name="is_featured" value="1" {{ $listing->is_featured ? 'checked' : '' }}> Featured Listing</label>
        </div>

        <div>
            <label class="block">Status</label>
            <select name="status" class="w-full border rounded p-2">
                <option value="active" {{ $listing->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="pending" {{ $listing->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="rejected" {{ $listing->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">Update Listing</button>
    </form>
</div>
@endsectiona