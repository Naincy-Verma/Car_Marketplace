@extends('layout.adminmaster')
@section('title', 'Edit Car Model')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Car Model</h1>

<form action="{{ route('model.update', $carmodel->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label for="name" class="block mb-1 font-semibold">Name</label>
        <input type="text" name="name" id="name" value="{{ $carmodel->name }}" 
               class="w-1/2 border p-2 rounded-lg border-gray-400 shadow-sm" required>
        @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="slug" class="block mb-1 font-semibold">Slug</label>
        <input type="text" name="slug" id="slug" value="{{ $carmodel->slug }}" 
               class="w-1/2 border p-2 rounded-lg border-gray-400 shadow-sm" required>
        @error('slug')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-lg w-[120px]">Update</button>
</form>
@endsection
