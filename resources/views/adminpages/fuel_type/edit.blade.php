@extends('layout.adminmaster')
@section('title', 'Edit Fuel Type')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Fuel Type</h1>

<form action="{{ route('fuel_types.update', $fuelType->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div class="flex flex-col md:flex-row gap-4 items-center">
        <label class="w-32 font-semibold">Name:</label>
        <input type="text" name="name" value="{{ $fuelType->name }}" 
               class="border p-2 rounded w-full md:w-1/2" required>
    </div>

    <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 mt-4 rounded-md text-lg w-[120px]">Update</button>
</form>
@endsection
