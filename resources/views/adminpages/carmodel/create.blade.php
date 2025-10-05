@extends('layout.adminmaster')
@section('title', 'Add Car Model')

@section('content')
<h1 class="text-2xl font-bold mb-4">Add Car Model</h1>

<form action="{{ route('model.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
        <label for="name" class="block mb-1 font-semibold">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter Model Name" 
               class="w-1/2 border p-2 rounded-lg border-gray-400 shadow-sm" required>
        @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="slug" class="block mb-1 font-semibold">Slug</label>
        <input type="text" name="slug" id="slug" placeholder="Enter Slug" 
               class="w-1/2 border p-2 rounded-lg border-gray-400 shadow-sm" required>
        @error('slug')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-lg w-[120px]">Save</button>
</form>
@endsection
