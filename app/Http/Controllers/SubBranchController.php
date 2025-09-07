<?php

namespace App\Http\Controllers;

use App\Models\SubBranch;
use App\Models\Branch;
use Illuminate\Http\Request;

class SubBranchController extends Controller
{
    public function index()
    {
        $subBranches = SubBranch::with('branch')->latest()->get();
        $branches = Branch::all();
        return view('sub_branches.index', compact('subBranches', 'branches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'branch_id' => 'required|exists:branches,id',
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:500',
        ]);

        SubBranch::create($request->all());
        return redirect()->route('sub_branches.index')->with('success', 'Sub-branch added successfully.');
    }

    public function edit(SubBranch $subBranch)
    {
        $branches = Branch::all();
        return view('sub_branches.edit', compact('subBranch', 'branches'));
    }

    public function update(Request $request, SubBranch $subBranch)
    {
        $request->validate([
            'branch_id' => 'required|exists:branches,id',
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:500',
        ]);

        $subBranch->update($request->all());
        return redirect()->route('sub_branches.index')->with('success', 'Sub-branch updated successfully.');
    }

    public function destroy(SubBranch $subBranch)
    {
        $subBranch->delete();
        return redirect()->route('sub_branches.index')->with('success', 'Sub-branch deleted successfully.');
    }
}
