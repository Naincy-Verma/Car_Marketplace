@extends('layout.adminmaster')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Edit Category</h2>

    <form action="{{ route('categories.update',$category->id) }}" method="POST" class="space-y-4">
        @csrf @method('PUT')
        <div>
            <label class="block">Name</label>
            <input type="text" name="name" class="w-full border rounded p-2" value="{{ $category->name }}" required>
        </div>
        <div>
            <label class="block">Description</label>
            <textarea name="description" class="w-full border rounded p-2">{{ $category->description }}</textarea>
        </div>
        <div>
            <label class="block">Status</label>
            <select name="status" class="w-full border rounded p-2">
                <option value="active" {{ $category->status=='active'?'selected':'' }}>Active</option>
                <option value="inactive" {{ $category->status=='inactive'?'selected':'' }}>Inactive</option>
            </select>
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection