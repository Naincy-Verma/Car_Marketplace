@extends('layout.adminmaster')

@section('content')
<div class="p-6 max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Location</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('location.update', $location->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold text-gray-700 mb-2">Location Name</label>
            <input type="text" name="name" value="{{ $location->name }}" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-400" placeholder="Enter location name" required>
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow">
            Update Location
        </button>
    </form>
</div>
@endsection
