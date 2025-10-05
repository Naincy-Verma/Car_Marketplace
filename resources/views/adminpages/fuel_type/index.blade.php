@extends('layout.adminmaster')
@section('title', 'Fuel Types')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Fuel Types</h1>
    <a href="{{ route('fuel_types.create') }}" 
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-lg">+ Add Fuel Type</a>
</div>

<table class="w-full border-collapse border border-gray-300">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Slug</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($fuelTypes as $fuel)
        <tr class="hover:bg-gray-50">
            <td class="border px-4 py-2">{{ $fuel->id }}</td>
            <td class="border px-4 py-2">{{ $fuel->name }}</td>
            <td class="border px-4 py-2">{{ $fuel->slug }}</td>
            <td class="border px-4 py-2 flex gap-2 justify-center">
                
                <!-- Edit -->
                <a href="{{ route('fuel_types.edit', $fuel->id) }}" 
                   class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                    <i class="fas fa-edit"></i>
                </a>

                <!-- Delete -->
                <form action="{{ route('fuel_types.destroy', $fuel->id) }}" method="POST" 
                      onsubmit="return confirm('Are you sure you want to delete this fuel type?');">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
