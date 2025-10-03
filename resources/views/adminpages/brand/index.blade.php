@extends('layout.adminmaster')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Brands</h2>
        <a href="{{ route('brands.create') }}" 
           class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
           + Add Brand
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
                <th class="p-2 border">Logo</th>
                <th class="p-2 border">Name</th>
                <th class="p-2 border">Status</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($brands as $brand)
                <tr>
                    <td class="p-2 border">{{ $brand->id }}</td>
                    <td class="p-2 border">
                        @if($brand->logo)
                            <img src="{{ asset($brand->logo) }}" class="h-10 w-10 object-cover">
                        @endif
                    </td>
                    <td class="p-2 border">{{ $brand->name }}</td>
                    <td class="p-2 border">
                        <span class="px-2 py-1 rounded 
                            {{ $brand->status == 'active' ? 'bg-green-200 text-green-700' : 'bg-red-200 text-red-700' }}">
                            {{ ucfirst($brand->status) }}
                        </span>
                    </td>
                    <td class="p-2 border">
                        <a href="{{ route('brands.edit', $brand->id) }}" class="text-blue-600 mr-2">Edit</a>
                        <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" class="inline-block">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600" onclick="return confirm('Delete this brand?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="p-2 text-center">No brands found</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection