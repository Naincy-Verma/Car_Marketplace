<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Category;
use App\Models\Brands;

class ListingController extends Controller
{
    public function index()
    {
        $listings = Listing::with(['user','category','brand'])->get();
        return view('adminpages.listing.index', compact('listings'));
    }

    public function create()
    {
        $categories = Category::where('status','active')->get();
        $brands = Brands::where('status','active')->get();
        return view('adminpages.listing.create', compact('categories','brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'=>'required|exists:customers,id',
            'category_id'=>'required|exists:categories,id',
            'brand_id'=>'required|exists:brands,id',
            'model'=>'required|string',
            'year'=>'required|digits:4|integer',
            'price'=>'required|numeric',
            'mileage'=>'required|string',
            'location'=>'required|string',
            'fuel_type'=>'required|string',
            'transmission'=>'required|string',
            'condition'=>'required|in:new,used',
            'description'=>'required|string',
        ]);

        Listing::create($request->all());
        return redirect()->route('listings.index')->with('success','Listing created successfully.');
    }

    public function edit(Listing $listing)
    {
        $categories = Category::where('status','active')->get();
        $brands = Brands::where('status','active')->get();
        return view('adminpages.listing.edit', compact('listing','categories','brands'));
    }

    public function update(Request $request, Listing $listing)
    {
        $listing->update($request->all());
        return redirect()->route('listings.index')->with('success','Listing updated successfully.');
    }

    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect()->route('listings.index')->with('success','Listing deleted successfully.');
    }
}
