@extends('layout.adminmaster')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Manage Locations</h1>
        <a href="{{ route('location.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow">
            + Add New Location
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border-b text-left">Id</th>
                    <th class="px-4 py-2 border-b text-left">Name</th>
                    <th class="px-4 py-2 border-b text-left">Slug</th>
                    <th class="px-4 py-2 border-b text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($locations as $index => $location)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border-b">{{ $location->name }}</td>
                        <td class="px-4 py-2 border-b text-gray-600">{{ $location->slug }}</td>
                        <td class="px-4 py-2 border-b">
                            <a href="{{ route('location.edit', $location->id) }}" class="text-blue-600 hover:underline mr-3">Edit</a>
                            <form action="{{ route('location.destroy', $location->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-500">No locations found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
