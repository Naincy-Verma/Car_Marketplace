@extends('layout.adminmaster')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Edit User</h2>

    <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block">Name</label>
            <input type="text" name="name" class="w-full border rounded p-2" value="{{ $user->name }}" required>
        </div>

        <div>
            <label class="block">Email</label>
            <input type="email" name="email" class="w-full border rounded p-2" value="{{ $user->email }}" required>
        </div>

        <div>
            <label class="block">User Type</label>
            <select name="user_type" class="w-full border rounded p-2" required>
                <option value="Individual" {{ $user->user_type=='Individual'?'selected':'' }}>Individual</option>
                <option value="Broker" {{ $user->user_type=='Broker'?'selected':'' }}>Broker</option>
                <option value="Dealer" {{ $user->user_type=='Dealer'?'selected':'' }}>Dealer</option>
            </select>
        </div>

        <div>
            <label class="block">Phone</label>
            <input type="text" name="phone" class="w-full border rounded p-2" value="{{ $user->phone }}" required>
        </div>

        <div>
            <label class="block">Status</label>
            <select name="status" class="w-full border rounded p-2">
                <option value="Active" {{ $user->status=='Active'?'selected':'' }}>Active</option>
                <option value="Suspended" {{ $user->status=='Suspended'?'selected':'' }}>Suspended</option>
                <option value="Pending" {{ $user->status=='Pending'?'selected':'' }}>Pending</option>
            </select>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
