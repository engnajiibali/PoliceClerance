<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Region;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::with('region')->get();
         $pageTitle = "District Management";
          $regions = Region::all();
        return view('districts.index', compact('districts','pageTitle','regions'));
    }

    public function create()
    {
        $regions = Region::all();
        return view('districts.create', compact('regions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'code' => 'nullable|string|max:20',
            'region_id' => 'required|exists:regions,id',
        ]);

        District::create($request->all());
        return redirect()->route('districts.index')->with('success', 'District created successfully.');
    }

    public function show(District $district)
    {
        return view('districts.show', compact('district'));
    }

    public function edit(District $district)
    {
        $regions = Region::all();
        return view('districts.edit', compact('district', 'regions'));
    }

    public function update(Request $request, District $district)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'code' => 'nullable|string|max:20',
            'region_id' => 'required|exists:regions,id',
        ]);

        $district->update($request->all());
        return redirect()->route('districts.index')->with('success', 'District updated successfully.');
    }

    public function destroy(District $district)
    {
        $district->delete();
        return redirect()->route('districts.index')->with('success', 'District deleted successfully.');
    }
}
