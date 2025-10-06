@extends('layout.adminmaster')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Manage Years</h1>
        <a href="{{ route('years.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow">
            + Add New Year
        </a>
    </div>

    <div class="bg-white rounded-lg shadow">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border-b text-left">#</th>
                    <th class="px-4 py-2 border-b text-left">Year</th>
                    <th class="px-4 py-2 border-b text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($years as $index => $year)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border-b">{{ $year->year }}</td>
                        <td class="px-4 py-2 border-b">
                            <a href="{{ route('years.edit', $year->id) }}" class="text-blue-600 hover:underline mr-3">Edit</a>
                            <form action="{{ route('years.destroy', $year->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this year?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4 text-gray-500">No years found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
