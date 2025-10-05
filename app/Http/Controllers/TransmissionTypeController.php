<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransmissionType;

class TransmissionTypeController extends Controller
{
    public function index()
    {
        $transmissions = TransmissionType::all();
        return view('adminpages.transmission_type.index', compact('transmissions'));
    }

    public function create()
    {
        return view('adminpages.transmission_type.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:transmission_types,slug',
        ]);

        TransmissionType::create($request->all());

        return redirect()->route('transmission_type.index')->with('success', 'Transmission type created successfully.');
    }

    public function edit(TransmissionType $transmissionType)
    {
        return view('adminpages.transmission_type.edit', compact('transmissionType'));
    }

    public function update(Request $request, TransmissionType $transmissionType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:transmission_types,slug,' . $transmissionType->id,
        ]);

        $transmissionType->update($request->all());

        return redirect()->route('transmission_type.index')->with('success', 'Transmission type updated successfully.');
    }

    public function destroy(TransmissionType $transmissionType)
    {
        $transmissionType->delete();
        return redirect()->route('transmission_type.index')->with('success', 'Transmission type deleted successfully.');
    }
}
