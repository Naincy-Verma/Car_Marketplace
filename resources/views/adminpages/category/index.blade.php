@extends('layout.adminmaster')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Categories</h2>
        <a href="{{ route('categories.create') }}" 
           class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
           + Add Category
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border border-gray-300 rounded-md">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">#</th>
                <th class="p-2 border">Name</th>
                <th class="p-2 border">Description</th>
                <th class="p-2 border">Status</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $cat)
                <tr>
                    <td class="p-2 border">{{ $cat->id }}</td>
                    <td class="p-2 border">{{ $cat->name }}</td>
                    <td class="p-2 border">{{ $cat->description }}</td>
                    <td class="p-2 border">
                        <span class="px-2 py-1 rounded 
                            {{ $cat->status == 'active' ? 'bg-green-200 text-green-700' : 'bg-red-200 text-red-700' }}">
                            {{ ucfirst($cat->status) }}
                        </span>
                    </td>
                    <td class="p-2 border">
                        <a href="{{ route('categories.edit', $cat->id) }}" class="text-blue-600 mr-2">Edit</a>
                        <form action="{{ route('categories.destroy', $cat->id) }}" method="POST" class="inline-block">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600" onclick="return confirm('Delete this category?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="p-2 text-center">No categories found</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection 