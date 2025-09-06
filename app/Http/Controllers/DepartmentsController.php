<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\departments;

class departmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = "Department Management";
        $departments = departments::paginate(10);
        $enteries = departments::count();

        return view('departments.index', compact('departments', 'pageTitle', 'enteries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // You can return a create view here if needed
        // return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'name' => 'required|max:255',
        ]);

        // Create and save new department
        $department = new departments();
        $department->name = $request->name;

        if ($department->save()) {
            return back()->with('success', 'Department successfully registered');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Optionally implement this if needed
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = "Edit Department";

        $department = departments::findOrFail($id);

        return view('departments.edit', compact('department', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|max:255',
        ]);

        // Find and update the department
        $department = departments::findOrFail($id);
        $department->name = $request->name;

        if ($department->save()) {
            return redirect()->route('departments.index')->with('success', 'Department successfully updated');
        } else {
            return back()->with('fail', 'Something went wrong while updating the department');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = departments::findOrFail($id);

        if ($department->delete()) {
            return back()->with('success', 'Department deleted successfully.');
        } else {
            return back()->with('fail', 'Failed to delete department.');
        }
    }
}
