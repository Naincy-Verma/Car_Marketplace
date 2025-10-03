@extends('layout.adminmaster')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Car Listings</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border border-gray-300 rounded-md">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">#</th>
                <th class="p-2 border">User</th>
                <th class="p-2 border">Category</th>
                <th class="p-2 border">Brand</th>
                <th class="p-2 border">Model</th>
                <th class="p-2 border">Year</th>
                <th class="p-2 border">Price</th>
                <th class="p-2 border">Status</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($listings as $listing)
                <tr>
                    <td class="p-2 border">{{ $listing->id }}</td>
                    <td class="p-2 border">{{ $listing->user->name }}</td>
                    <td class="p-2 border">{{ $listing->category->name }}</td>
                    <td class="p-2 border">{{ $listing->brand->name }}</td>
                    <td class="p-2 border">{{ $listing->model }}</td>
                    <td class="p-2 border">{{ $listing->year }}</td>
                    <td class="p-2 border">₹{{ number_format($listing->price,2) }}</td>
                    <td class="p-2 border">
                        <span class="px-2 py-1 rounded 
                            {{ $listing->status == 'active' ? 'bg-green-200 text-green-700' : 
                               ($listing->status == 'pending' ? 'bg-yellow-200 text-yellow-700' : 'bg-red-200 text-red-700') }}">
                            {{ ucfirst($listing->status) }}
                        </span>
                    </td>
                    <td class="p-2 border">
                        <a href="{{ route('listings.edit', $listing->id) }}" class="text-blue-600 mr-2">Edit</a>
                        <form action="{{ route('listings.destroy', $listing->id) }}" method="POST" class="inline-block">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600" onclick="return confirm('Delete this listing?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="9" class="p-2 text-center">No listings found</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection