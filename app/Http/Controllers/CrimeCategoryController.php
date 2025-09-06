<?php

namespace App\Http\Controllers;

use App\Models\CrimeCategory;
use Illuminate\Http\Request;

class CrimeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = "Department Management";
        $categories = CrimeCategory::all();
        return view('crime_categories.index', compact('categories','pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crime_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        CrimeCategory::create($validated);

        return redirect()->route('crime-categories.index')
                         ->with('success', 'Crime Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CrimeCategory $crimeCategory)
    {
        return view('crime_categories.show', compact('crimeCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CrimeCategory $crimeCategory)
    {
          $pageTitle = "Edit Department";
        return view('crime_categories.edit', compact('crimeCategory','pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CrimeCategory $crimeCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        $crimeCategory->update($validated);

        return redirect()->route('crime-categories.index')
                         ->with('success', 'Crime Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CrimeCategory $crimeCategory)
    {
        $crimeCategory->delete();

        return redirect()->route('crime-categories.index')
                         ->with('success', 'Crime Category deleted successfully.');
    }
}
