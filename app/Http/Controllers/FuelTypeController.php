<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FuelType;

class FuelTypeController extends Controller
{
    public function index()
    {
        $fuelTypes = FuelType::all();
        return view('adminpages.fuel_type.index', compact('fuelTypes'));
    }

    public function create()
    {
        return view('adminpages.fuel_type.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:fuel_types,slug',
        ]);

        FuelType::create($request->all());

        return redirect()->route('fuel_type.index')->with('success', 'Fuel type created successfully.');
    }

    public function edit(FuelType $fuelType)
    {
        return view('adminpages.fuel_type.edit', compact('fuelType'));
    }

    public function update(Request $request, FuelType $fuelType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:fuel_types,slug,' . $fuelType->id,
        ]);

        $fuelType->update($request->all());

        return redirect()->route('fuel_type.index')->with('success', 'Fuel type updated successfully.');
    }

    public function destroy(FuelType $fuelType)
    {
        $fuelType->delete();
        return redirect()->route('fuel_type.index')->with('success', 'Fuel type deleted successfully.');
    }
}
