@extends('layout.adminmaster')
@section('title', 'Car Models')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Car Models</h1>
    <a href="{{ route('model.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-lg">+ Add Car Model</a>
</div>

<table class="w-full border-collapse border border-gray-300">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Slug</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($models as $model)
        <tr class="hover:bg-gray-50">
            <td class="border px-4 py-2">{{ $model->id }}</td>
            <td class="border px-4 py-2">{{ $model->name }}</td>
            <td class="border px-4 py-2">{{ $model->slug }}</td>
            <td class="border px-4 py-2 flex gap-2 justify-center">
                
                <!-- Edit Icon -->
                <a href="{{ route('model.edit', $model->id) }}" class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                     <i class="fas fa-edit"></i>
                </a>

                <!-- Delete Icon -->
                <form action="{{ route('model.destroy', $model->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
