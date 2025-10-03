@extends('layout.adminmaster')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Edit Brand</h2>

    <form action="{{ route('brands.update',$brand->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf @method('PUT')
        <div>
            <label class="block">Name</label>
            <input type="text" name="name" class="w-full border rounded p-2" value="{{ $brand->name }}" required>
        </div>
        <div>
            <label class="block">Logo</label>
            @if($brand->logo)
                <img src="{{ asset('assets/images/brand/'.$brand->logo) }}" class="h-12 mb-2">
            @endif
            <input type="file" name="logo" class="w-full border rounded p-2">
        </div>
        <div>
            <label class="block">Status</label>
            <select name="status" class="w-full border rounded p-2">
                <option value="active" {{ $brand->status=='active'?'selected':'' }}>Active</option>
                <option value="inactive" {{ $brand->status=='inactive'?'selected':'' }}>Inactive</option>
            </select>
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection