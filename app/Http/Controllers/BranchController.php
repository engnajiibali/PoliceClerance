<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\District;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    { $pageTitle = "branches Management";
         $districts = District::with('region')->get();
        $branches = Branch::with('district.region')->get();
        return view('branches.index', compact('branches','districts','pageTitle'));
    }

    public function create()
    {
        $districts = District::with('region')->get();
        return view('branches.create', compact('districts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'district_id' => 'required|exists:districts,id',
        ]);

        Branch::create($request->all());
        return redirect()->route('branches.index')->with('success', 'Branch created successfully.');
    }

    public function show(Branch $branch)
    {
        return view('branches.show', compact('branch'));
    }

    public function edit(Branch $branch)
    {
        $districts = District::with('region')->get();
        return view('branches.edit', compact('branch', 'districts'));
    }

    public function update(Request $request, Branch $branch)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'branch_code' => 'required|string|max:50|unique:branches,branch_code,' . $branch->id,
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'district_id' => 'required|exists:districts,id',
        ]);

        $branch->update($request->all());
        return redirect()->route('branches.index')->with('success', 'Branch updated successfully.');
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('branches.index')->with('success', 'Branch deleted successfully.');
    }
}
