<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransmissionType;

class TransmissionTypeController extends Controller
{
    public function index()
    {
        $transmissions = TransmissionType::all();
        return view('admin.transmission_types.index', compact('transmissions'));
    }

    public function create()
    {
        return view('admin.transmission_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:transmission_types,slug',
        ]);

        TransmissionType::create($request->all());

        return redirect()->route('admin.transmission_types.index')->with('success', 'Transmission type created successfully.');
    }

    public function edit(TransmissionType $transmissionType)
    {
        return view('admin.transmission_types.edit', compact('transmissionType'));
    }

    public function update(Request $request, TransmissionType $transmissionType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:transmission_types,slug,' . $transmissionType->id,
        ]);

        $transmissionType->update($request->all());

        return redirect()->route('admin.transmission_types.index')->with('success', 'Transmission type updated successfully.');
    }

    public function destroy(TransmissionType $transmissionType)
    {
        $transmissionType->delete();
        return redirect()->route('admin.transmission_types.index')->with('success', 'Transmission type deleted successfully.');
    }
}
