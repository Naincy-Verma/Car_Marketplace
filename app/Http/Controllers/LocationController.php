<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of locations
     */
    public function index()
    {
        $locations = Location::all();
        return view('adminpages.location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new location
     */
    public function create()
    {
        return view('adminpages.location.create');
    }

    /**
     * Store a newly created location in storage
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:locations,slug',
        ]);

        Location::create($request->all());

        return redirect()->route('location.index')->with('success', 'Location created successfully.');
    }

    /**
     * Show the form for editing the specified location
     */
    public function edit(Location $location)
    {
        return view('adminpages.location.edit', compact('location'));
    }

    /**
     * Update the specified location in storage
     */
    public function update(Request $request, Location $location)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:locations,slug,' . $location->id,
        ]);

        $location->update($request->all());

        return redirect()->route('location.index')->with('success', 'Location updated successfully.');
    }

    /**
     * Remove the specified location from storage
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->route('location.index')->with('success', 'Location deleted successfully.');
    }
}
