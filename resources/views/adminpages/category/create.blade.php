@extends('layout.adminmaster')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Add Category</h2>

    <form action="{{ route('categories.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block">Name</label>
            <input type="text" name="name" class="w-full border rounded p-2" required>
        </div>
        <div>
            <label class="block">Description</label>
            <textarea name="description" class="w-full border rounded p-2"></textarea>
        </div>
        <div>
            <label class="block">Status</label>
            <select name="status" class="w-full border rounded p-2">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
    </form>
</div>
@endsection