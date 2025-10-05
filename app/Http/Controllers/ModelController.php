<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarModel;

class ModelCarController extends Controller
{
    public function index()
    {
        $models = ModelCar::all();
        return view('admin.model.index', compact('models'));
    }

    public function create()
    {
        return view('admin.model.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:models,slug',
        ]);

        ModelCar::create($request->all());

        return redirect()->route('admin.models.index')->with('success', 'Model created successfully.');
    }

    public function edit(ModelCar $model)
    {
        return view('admin.model.edit', compact('model'));
    }

    public function update(Request $request, ModelCar $model)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:models,slug,' . $model->id,
        ]);

        $model->update($request->all());

        return redirect()->route('admin.models.index')->with('success', 'Model updated successfully.');
    }

    public function destroy(ModelCar $model)
    {
        $model->delete();
        return redirect()->route('admin.models.index')->with('success', 'Model deleted successfully.');
    }
}
