<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Listing;

class HomeController extends Controller
{
    /**
     * Display the home page with dynamic data
     */
    public function index()
    {
        // Get brands with their listing counts
        $brands = Brand::withCount('listings')->get();
        
        // Get some featured listings for other sections if needed
        $featuredListings = Listing::with(['brand', 'model', 'media'])
            ->where('status', 'active')
            ->where('listing_type', 'featured')
            ->latest()
            ->take(6)
            ->get();

        return view('pages.index2', compact('brands', 'featuredListings'));
    }
}