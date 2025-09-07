<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = "States";
        $states = State::latest()->get();

        return view('states.index', compact('states', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = "Add State";
        return view('states.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lat'  => 'required|numeric',
            'lng'  => 'required|numeric',
        ]);

        try {
            State::create($request->all());
            return redirect()->route('States.index')->with('success', 'State created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('States.index')->with('fail', 'Failed to create state.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state)
    {
        $pageTitle = "View State";
        return view('states.show', compact('state', 'pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(State $state)
    {
        $pageTitle = "Edit State";
        return view('states.edit', compact('state', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, State $state)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lat'  => 'required|numeric',
            'lng'  => 'required|numeric',
        ]);

        try {
            $state->update($request->all());
            return redirect()->route('states.index')->with('success', 'State updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('states.index')->with('fail', 'Failed to update state.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        try {
            $state->delete();
            return redirect()->route('states.index')->with('success', 'State deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('states.index')->with('fail', 'Failed to delete state.');
        }
    }
}
