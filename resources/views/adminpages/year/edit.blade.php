@extends('layout.adminmaster')
@section('title', 'Edit Year')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4 text-white">Edit Year</h1>

    <form action="{{ route('years.update', $year->id) }}" method="POST" class="bg-gray-800 p-6 rounded-lg shadow-lg">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-300 font-semibold mb-2">Year</label>
            <input type="number" name="year" value="{{ $year->year }}" min="1900" max="{{ date('Y') + 1 }}" class="w-full p-2 rounded bg-gray-700 text-white border border-gray-600" required>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Update</button>
        </div>
    </form>
</div>
@endsection
