@extends('layout.adminmaster')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Add New User</h2>

    <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block">Name</label>
            <input type="text" name="name" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block">Email</label>
            <input type="email" name="email" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block">Password</label>
            <input type="password" name="password" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block">Confirm Password</label>
            <input type="password" name="password_confirmation" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block">User Type</label>
            <select name="user_type" class="w-full border rounded p-2" required>
                <option value="">Select Type</option>
                <option value="Individual">Individual</option>
                <option value="Broker">Broker</option>
                <option value="Dealer">Dealer</option>
            </select>
        </div>

        <div>
            <label class="block">Phone</label>
            <input type="text" name="phone" class="w-full border rounded p-2" required>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
    </form>
</div>
@endsection
