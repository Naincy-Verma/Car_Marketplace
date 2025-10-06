<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('adminpages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminpages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Max 2MB
             'slug' => 'required|string|max:255|unique:categories,slug,'.$category->id,
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name); // Generate slug from name

        // Upload image
        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('assets/images/category'), $imageName);
        }

        Category::create($data);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('adminpages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category = Brand::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image optional on update
             'slug' => 'required|string|max:255|unique:brands,slug,'.$brand->id,

        ]);

        // $data = $request->all();
        // $data['slug'] = Str::slug($request->name); // Regenerate slug

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($category->image && File::exists(public_path('assets/images/category/'.$category->image))) {
                 File::delete(public_path('assets/images/brand/'.$brand->image));
            }
            
             $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('assets/images/brand'), $imageName);
            $brand->image = $imageName;
        }

        // $category->update($data);

         $category->name = $request->name;
        $category->slug = Str::slug($request->slug);
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
         $category = Brand::findOrFail($id);

        // Delete image
        if ($category->image && File::exists(public_path('assets/images/category/'.$category->image))) {
            File::delete(public_path('assets/images/category/'.$category->image));
        }

        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}