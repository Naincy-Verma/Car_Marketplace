<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Category;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Year;
use App\Models\FuelType;
use App\Models\TransmissionType;
use App\Models\Location;
use App\Models\ListingMedia;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    /**
     * Display all listings (for admin or frontend filtering)
     */
    public function index()
    {
        // Admin view: all listings
        $listings = Listing::with('media', 'category', 'brand', 'model', 'fuelType', 'transmissionType', 'location')->get();
        return view('adminpages.listing.index', compact('listings'));
    }

    /**
     * Show form to create new listing
     */
    public function create()
    {
        // Pass categories, brands, models etc. to the view
        return view('adminpages.listing.create', [
            'categories' => Category::all(),
            'brands' => Brand::all(),
            'models' => CarModel::all(),
            'years' => Year::all(),
            'fuel_types' => FuelType::all(),
            'transmissions' => TransmissionType::all(),
            'locations' => Location::all(),
        ]);
    }

    /**
     * Store a new listing
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'model_id' => 'required|exists:models,id',
            'years_id' => 'required|exists:years,id',
            'fuel_type_id' => 'required|exists:fuel_types,id',
            'transmission_type_id' => 'required|exists:transmission_types,id',
            'location_id' => 'required|exists:locations,id',
            'mileage' => 'required|string',
            'price' => 'required|numeric',
            'condition' => 'required|in:new,used',
            'description' => 'required|string',
            'listing_type' => 'nullable|in:featured,urgent',
            'status' => 'nullable|in:active,pending,rejected',
            'media.*' => 'nullable|file|mimes:jpg,jpeg,png,mp4,mov|max:10240', // 10MB max
        ]);

        $listing = Listing::create([
            'category_id' => $validated['category_id'],
            'brand_id' => $validated['brand_id'],
            'model_id' => $validated['model_id'],
            'years_id' => $validated['years_id'],
            'fuel_type_id' => $validated['fuel_type_id'],
            'transmission_type_id' => $validated['transmission_type_id'],
            'location_id' => $validated['location_id'],
            'mileage' => $validated['mileage'],
            'price' => $validated['price'],
            'condition' => $validated['condition'],
            'description' => $validated['description'],
            'listing_type' => $validated['listing_type'] ?? 'featured',
            'status' => 'pending', // all new listings are pending approval
        ]);

        // Handle uploaded media
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                $type = in_array($file->extension(), ['mp4', 'mov']) ? 'video' : 'image';
                $filename = time().'_'.$file->getClientOriginalName();
                $file->move(public_path('assets/images/listings'), $filename);

                ListingMedia::create([
                    'listing_id' => $listing->id,
                    'type' => $type,
                    'file' => $filename,
                ]);
            }
        }

        return redirect()->route('listings.index')->with('success', 'Listing submitted successfully and is pending approval.');
    }

    /**
     * Show single listing
     */
    public function show(Listing $listing)
    {
        $listing->load('media', 'category', 'brand', 'model', 'fuelType', 'transmissionType', 'location');
        return view('adminpages.listing.show', compact('listing'));
    }

    /**
     * Approve a listing (admin)
     */
    public function approve(Listing $listing)
    {
        $listing->update(['status' => 'active']);
        return back()->with('success', 'Listing approved.');
    }

    /**
     * Reject a listing (admin)
     */
    public function reject(Listing $listing)
    {
        $listing->update(['status' => 'rejected']);
        return back()->with('success', 'Listing rejected.');
    }

    /**
     * Show form to create new listing for users
     */
    public function createUserListing()
    {
        // Pass categories, brands, models etc. to the view
        return view('pages.post-car', [
            'categories' => Category::all(),
            'brands' => Brand::all(),
            'models' => CarModel::all(),
            'years' => Year::all(),
            'fuel_types' => FuelType::all(),
            'transmissions' => TransmissionType::all(),
            'locations' => Location::all(),
        ]);
    }

    /**
     * Store a new listing for users
     */
    public function storeUserListing(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'model_id' => 'required|exists:models,id',
            'years_id' => 'required|exists:years,id',
            'fuel_type_id' => 'required|exists:fuel_types,id',
            'transmission_type_id' => 'required|exists:transmission_types,id',
            'location_id' => 'required|exists:locations,id',
            'mileage' => 'required|string',
            'price' => 'required|numeric',
            'condition' => 'required|in:new,used',
            'description' => 'required|string',
            'listing_type' => 'nullable|in:featured,urgent',
            'media.*' => 'nullable|file|mimes:jpg,jpeg,png,mp4,mov|max:10240', // 10MB max
        ]);

        $listing = Listing::create([
            'category_id' => $validated['category_id'],
            'brand_id' => $validated['brand_id'],
            'model_id' => $validated['model_id'],
            'years_id' => $validated['years_id'],
            'fuel_type_id' => $validated['fuel_type_id'],
            'transmission_type_id' => $validated['transmission_type_id'],
            'location_id' => $validated['location_id'],
            'mileage' => $validated['mileage'],
            'price' => $validated['price'],
            'condition' => $validated['condition'],
            'description' => $validated['description'],
            'listing_type' => $validated['listing_type'] ?? 'featured',
            'status' => 'pending', // all new listings are pending approval
            'user_id' => Auth::id(), // Associate with logged-in user
        ]);

        // Handle uploaded media
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                $type = in_array($file->extension(), ['mp4', 'mov']) ? 'video' : 'image';
                $filename = time().'_'.$file->getClientOriginalName();
                $file->move(public_path('assets/images/listings'), $filename);

                ListingMedia::create([
                    'listing_id' => $listing->id,
                    'type' => $type,
                    'file' => $filename,
                ]);
            }
        }

        return redirect()->route('user.dashboard')->with('success', 'Your car listing has been submitted successfully and is pending approval!');
    }

    /**
     * Show user dashboard with their listings
     */
    public function userDashboard()
    {
        $userListings = Listing::where('user_id', Auth::id())
            ->with('media', 'category', 'brand', 'model', 'fuelType', 'transmissionType', 'location')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.seller', compact('userListings'));
    }
}
