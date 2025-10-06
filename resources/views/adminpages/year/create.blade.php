@extends('layout.adminmaster')
@section('title', 'Add Year')

@section('content')
<h1 class="text-3xl font-bold mb-8">Add New Year</h1>

@if ($errors->any())
    <div class="bg-red-600 text-white p-3 rounded mb-6 max-w-lg">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('years.store') }}" method="POST" class="space-y-6 max-w-lg  p-6 rounded-lg">
    @csrf

    <div class="flex flex-col gap-2">
        <label class="font-semibold">Year:</label>
        <input type="number" name="year" min="1900" max="{{ date('Y') + 1 }}"
               value="{{ old('year') }}"
               placeholder="Enter year (e.g. 2024)"
               class="border border-gray-600 text-white p-2 rounded w-full shadow-sm focus:ring-2 focus:ring-blue-600 focus:outline-none">
    </div>

    <div>
        <button type="submit" 
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold text-lg">
            Save Year
        </button>
        <a href="{{ route('years.index') }}" 
           class="ml-4 bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded-lg font-semibold text-lg">
            Cancel
        </a>
    </div>
</form>
@endsection
