@extends('layout.adminmaster')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Add Listing</h2>

    <form action="{{ route('listings.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- User -->
        <div>
            <label class="block">User</label>
            <select name="user_id" class="w-full border rounded p-2" required>
                <option value="">Select User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->user_type }})</option>
                @endforeach
            </select>
        </div>

        <!-- Category -->
        <div>
            <label class="block">Category</label>
            <select name="category_id" class="w-full border rounded p-2" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Brand -->
        <div>
            <label class="block">Brand</label>
            <select name="brand_id" class="w-full border rounded p-2" required>
                <option value="">Select Brand</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block">Model</label>
            <input type="text" name="model" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block">Year</label>
            <input type="number" name="year" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block">Price</label>
            <input type="number" name="price" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block">Mileage</label>
            <input type="text" name="mileage" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block">Location</label>
            <input type="text" name="location" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block">Fuel Type</label>
            <input type="text" name="fuel_type" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block">Transmission</label>
            <select name="transmission" class="w-full border rounded p-2" required>
                <option value="Automatic">Automatic</option>
                <option value="Manual">Manual</option>
            </select>
        </div>

        <div>
            <label class="block">Condition</label>
            <select name="condition" class="w-full border rounded p-2" required>
                <option value="new">New</option>
                <option value="used">Used</option>
            </select>
        </div>

        <div>
            <label class="block">Description</label>
            <textarea name="description" class="w-full border rounded p-2" required></textarea>
        </div>

        <div>
            <label class="block">Featured</label>
            <input type="checkbox" name="is_featured" value="1">
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
    </form>
</div>
@endsection
