<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\State;

use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        $regions = Region::all();
    $states = State::all(); // For dropdown
        $pageTitle = "Region Management";
        return view('regions.index', compact('regions','pageTitle','states'));
    }

    public function create()
    {
        return view('regions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'code' => 'nullable|string|max:20',
            'lng' => 'nullable|string|max:20',
            'lat' => 'nullable|string|max:20',
            'state' => 'required|exists:states,id',
        ]);

        Region::create($request->all());
        return redirect()->route('regions.index')->with('success', 'Region created successfully.');
    }

    public function show(Region $region)
    {
        return view('regions.show', compact('region'));
    }

    public function edit(Region $region)
    {
        return view('regions.edit', compact('region'));
    }

    public function update(Request $request, Region $region)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'code' => 'nullable|string|max:20',
        ]);

        $region->update($request->all());
        return redirect()->route('regions.index')->with('success', 'Region updated successfully.');
    }

    public function destroy(Region $region)
    {
        $region->delete();
        return redirect()->route('regions.index')->with('success', 'Region deleted successfully.');
    }
}
