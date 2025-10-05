@extends('layout.adminmaster')

@section('content')
<div class="p-6 max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Add New Category</h1>


    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold text-gray-700 mb-2">Category Name</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-400" placeholder="Enter category name" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold text-gray-700 mb-2">Category Image</label>
            <input type="file" name="image" accept="image/*" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-400" required>
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow">
            Save Category
        </button>
    </form>
</div>
@endsection
