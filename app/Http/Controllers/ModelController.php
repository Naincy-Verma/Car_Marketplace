<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarModel;

class ModelController extends Controller
{
    public function index()
    {
        $models = CarModel::all();
        return view('adminpages.carmodel.index', compact('models'));
    }

    public function create()
    {
        return view('adminpages.carmodel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);

        CarModel::create($request->all());

        return redirect()->route('model.index')->with('success', 'Model created successfully.');
    }

    public function edit(CarModel $model)
    {
        return view('adminpages.carmodel.edit', compact('model'));
    }

    public function update(Request $request, CarModel $model)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:models,slug,' . $model->id,
        ]);

        $model->update($request->all());

        return redirect()->route('model.index')->with('success', 'Model updated successfully.');
    }

    public function destroy(CarModel $model)
    {
        $model->delete();
        return redirect()->route('model.index')->with('success', 'Model deleted successfully.');
    }
}
