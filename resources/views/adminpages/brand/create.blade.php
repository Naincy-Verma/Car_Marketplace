@extends('layout.adminmaster')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Add Brand</h2>

    <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label class="block">Name</label>
            <input type="text" name="name" class="w-full border rounded p-2" required>
        </div>
        <div>
            <label class="block">Logo</label>
            <input type="file" name="logo" class="w-full border rounded p-2">
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