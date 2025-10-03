<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('adminpages.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('adminpages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->only(['name', 'status']);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/brand'), $filename);
            $data['logo'] = 'assets/images/brand/' . $filename;
        }

        Brand::create($data);

        return redirect()->route('brands.index')->with('success', 'Brand created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brands $brands)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brands $brands)
    {
        return view('adminpages.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brands $brands)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->only(['name', 'status']);

        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($brand->logo && file_exists(public_path($brand->logo))) {
                unlink(public_path($brand->logo));
            }

            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/brand'), $filename);
            $data['logo'] = 'assets/images/brand/' . $filename;
        }

        $brand->update($data);

        return redirect()->route('brands.index')->with('success', 'Brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brands $brands)
    {
        if ($brand->logo && file_exists(public_path($brand->logo))) {
            unlink(public_path($brand->logo));
        }

        $brand->delete();
        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully.');
    }
}
