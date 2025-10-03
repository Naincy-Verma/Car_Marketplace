@extends('layout.adminmaster')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">All Users</h2>

    <a href="{{ route('users.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Add New User</a>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">#</th>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">User Type</th>
                <th class="border px-4 py-2">Phone</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border px-4 py-2">{{ $user->name }}</td>
                <td class="border px-4 py-2">{{ $user->email }}</td>
                <td class="border px-4 py-2">{{ $user->user_type }}</td>
                <td class="border px-4 py-2">{{ $user->phone }}</td>
                <td class="border px-4 py-2">{{ $user->status }}</td>
                <td class="border px-4 py-2 space-x-2">
                    <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this user?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
