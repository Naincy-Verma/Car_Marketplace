@extends('layout.adminmaster')
@section('title', 'Years')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-100">Years</h1>
        <a href="{{ route('years.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">+ Add Year</a>
    </div>

    <div class="bg-gray-800 rounded-lg shadow-md p-4">
        <table class="min-w-full text-white">
            <thead class="bg-blue-700">
                <tr>
                    <th class="py-2 px-4 text-left">Id</th>
                    <th class="py-2 px-4 text-left">Year</th>
                    <th class="py-2 px-4 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($years as $year)
                    <tr class="border-b border-gray-700 hover:bg-gray-700">
                        <td class="py-2 px-4">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4">{{ $year->year }}</td>
                        <td class="py-2 px-4 text-center">
                            <a href="{{ route('years.edit', $year->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">Edit</a>
                            <form action="{{ route('years.destroy', $year->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4 text-gray-400">No Years Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
