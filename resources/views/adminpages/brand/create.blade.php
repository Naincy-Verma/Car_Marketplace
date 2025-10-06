@extends('layout.adminmaster')

@section('content')
<div class="p-6 max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Add New Brand</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold text-gray-700 mb-2">Brand Name</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-400" placeholder="Enter brand name" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold text-gray-700 mb-2">Brand Slug</label>
            <input type="text" name="slug" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-400" placeholder="Enter brand slug (e.g., toyota, honda)" required>
            <p class="text-sm text-gray-500 mt-1">Slug will be used in URLs. Use lowercase letters and hyphens only.</p>
        </div>

        <div class="mb-4">
            <label class="block font-semibold text-gray-700 mb-2">Brand Image</label>
            <input type="file" name="image" accept="image/*" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-400" required>
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow">
            Save Brand
        </button>
    </form>
</div>
@endsection
