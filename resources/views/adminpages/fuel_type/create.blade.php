@extends('layout.adminmaster')
@section('title', 'Add Fuel Type')

@section('content')
<h1 class="text-2xl font-bold mb-4">Add New Fuel Type</h1>

<form action="{{ route('fuel_type.store') }}" method="POST" class="space-y-4">
    @csrf

    <div class="flex flex-col md:flex-row gap-4 items-center">
        <label class="w-32 font-semibold">Name:</label>
        <input type="text" name="name" class="border p-2 rounded w-full md:w-1/2" placeholder="Enter fuel type name" required>
    </div>

      <div class = "mb-4">
        <label for="slug" class="block mb-1 font-semibold">Slug</label>
        <input type="text" name="slug" id="slug" placeholder="Enter Slug" 
               class="w-1/2 border p-2 rounded-lg border-gray-400 shadow-sm" required>
        @error('slug')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>


    <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 mt-4 rounded-md text-lg w-[120px]">Save</button>
</form>
@endsection
