@extends('layout.adminmaster')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4 text-white">Add Transmission Type</h1>

    <form action="{{ route('transmission_type.store') }}" method="POST" class=" p-6 rounded-lg shadow-lg">
        @csrf

        <div class="mb-4">
            <label class="block  font-semibold mb-2">Transmission Type Name</label>
            <input type="text" name="name" class="w-1/2 border p-2 rounded-lg border-gray-400 shadow-sm" required>
        </div>

         <div class = "mb-4">
        <label for="slug" class="block mb-1 font-semibold">Slug</label>
        <input type="text" name="slug" id="slug" placeholder="Enter Slug" 
               class="w-1/2 border p-2 rounded-lg border-gray-400 shadow-sm" required>
        @error('slug')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>


        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Save</button>
        </div>
    </form>
</div>
@endsection
