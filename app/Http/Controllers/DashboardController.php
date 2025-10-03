<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Listing;

class DashboardController extends Controller
{
    // Show admin dashboard
    public function index()
    {
        // Fetch statistics
        $totalBrands      =  Brand::count();
        $totalListings     = Listing::count();

        return view('adminpages.dashboard', compact(
            'totalBrands',
            'totalListings',
        ));
    }
}
