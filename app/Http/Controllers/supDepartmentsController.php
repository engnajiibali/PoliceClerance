<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\departments;
use App\Models\supdepartments;
class supDepartmentsController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = "Sup Department Management";
        $departments = departments::all();
        $supdepartments = supdepartments::paginate(10);
        $enteries = departments::count();

        return view('departments.supdepartment', compact('departments','supdepartments','pageTitle', 'enteries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
