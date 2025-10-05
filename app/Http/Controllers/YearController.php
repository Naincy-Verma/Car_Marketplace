<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Year;

class YearController extends Controller
{
    public function index()
    {
        $years = Year::all();
        return view('admin.years.index', compact('years'));
    }

    public function create()
    {
        return view('admin.years.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|digits:4|integer|unique:years,year',
        ]);

        Year::create($request->all());

        return redirect()->route('admin.years.index')->with('success', 'Year created successfully.');
    }

    public function edit(Year $year)
    {
        return view('admin.years.edit', compact('year'));
    }

    public function update(Request $request, Year $year)
    {
        $request->validate([
            'year' => 'required|digits:4|integer|unique:years,year,' . $year->id,
        ]);

        $year->update($request->all());

        return redirect()->route('admin.years.index')->with('success', 'Year updated successfully.');
    }

    public function destroy(Year $year)
    {
        $year->delete();
        return redirect()->route('admin.years.index')->with('success', 'Year deleted successfully.');
    }
}
