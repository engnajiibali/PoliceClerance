<?php

namespace App\Http\Controllers;

use App\Models\BranchManager;
use App\Models\Branch;
use App\Models\SubBranch;
use App\Models\User;
use Illuminate\Http\Request;

class BranchManagerController extends Controller
{
    public function index()
    {
        $managers = BranchManager::with(['branch', 'subBranch', 'user'])->latest()->get();
        $branches = Branch::all();
        $subBranches = SubBranch::all();
        $users = User::all();
        return view('branch_managers.index', compact('managers', 'branches', 'subBranches', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'branch_id' => 'nullable|exists:branches,id',
            'sub_branch_id' => 'nullable|exists:sub_branches,id',
        ]);

        BranchManager::create($request->all());
        return redirect()->route('branch_managers.index')->with('success', 'Manager assigned successfully.');
    }

    public function destroy(BranchManager $branchManager)
    {
        $branchManager->delete();
        return redirect()->route('branch_managers.index')->with('success', 'Manager removed successfully.');
    }
}
