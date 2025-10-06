@extends('layout.adminmaster')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Manage Categories</h1>
        <a href="{{ route('categories.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow">
            + Add New Category
        </a>
    </div>


    <div class="bg-white rounded-lg shadow">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border-b text-left">#</th>
                    <th class="px-4 py-2 border-b text-left">Image</th>
                    <th class="px-4 py-2 border-b text-left">Name</th>
                    <th class="px-4 py-2 border-b text-left">Slug</th>
                    <th class="px-4 py-2 border-b text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $index => $category)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border-b">
                            <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" class="w-12 h-12 object-cover rounded">
                        </td>
                        <td class="px-4 py-2 border-b">{{ $category->name }}</td>
                        <td class="px-4 py-2 border-b text-gray-600">{{ $category->slug }}</td>
                        <td class="px-4 py-2 border-b">
                            <a href="{{ route('categories.edit', $category->id) }}" class="text-blue-600 hover:underline mr-3">Edit</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">No categories found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
