<?php

namespace App\Http\Controllers;

use App\Models\CrimeType;
use App\Models\CrimeCategory;
use Illuminate\Http\Request;

class CrimeTypeController extends Controller
{
    public function index()
    {
        $pageTitle = "Crime Types";
        $crimeTypes = CrimeType::with('category')->latest()->paginate(10);
        return view('crime_types.index', compact('crimeTypes', 'pageTitle'));
    }

    public function create()
    {
        $pageTitle = "Add Crime Type";
        $categories = CrimeCategory::all();
        return view('crime_types.create', compact('pageTitle', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:100',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:crime_categories,id'
        ]);

        CrimeType::create($request->all());

        return redirect()->route('crime-types.index')
            ->with('success', 'Crime Type created successfully.');
    }

    public function show(CrimeType $crimeType)
    {
        $pageTitle = "View Crime Type";
        return view('crime_types.show', compact('crimeType', 'pageTitle'));
    }

    public function edit(CrimeType $crimeType)
    {
        $pageTitle = "Edit Crime Type";
        $categories = CrimeCategory::all();
        return view('crime_types.edit', compact('crimeType', 'pageTitle', 'categories'));
    }

    public function update(Request $request, CrimeType $crimeType)
    {
        $request->validate([
            'name'        => 'required|string|max:100',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:crime_categories,id'
        ]);

        $crimeType->update($request->all());

        return redirect()->route('crime-types.index')
            ->with('success', 'Crime Type updated successfully.');
    }

    public function destroy(CrimeType $crimeType)
    {
        $crimeType->delete();
        return redirect()->route('crime-types.index')
            ->with('success', 'Crime Type deleted successfully.');
    }
}
