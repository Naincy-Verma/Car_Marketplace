@extends('layout.adminmaster')
@section('title', 'Add Year')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4 text-white">Add New Year</h1>

    @if ($errors->any())
        <div class="bg-red-600 text-white p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('years.store') }}" method="POST" class="bg-gray-800 p-6 rounded-lg shadow-lg">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-300 font-semibold mb-2">Year</label>
            <input type="number" name="year" min="1900" max="{{ date('Y') + 1 }}" class="w-full p-2 rounded bg-gray-700 text-white border border-gray-600" placeholder="Enter year (e.g. 2024)" required>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Save
            </button>
        </div>
    </form>
</div>
@endsection
