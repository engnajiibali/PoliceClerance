<?php

namespace App\Http\Controllers;

use App\Models\ApplicationHistory;
use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;

class ApplicationHistoryController extends Controller
{
    public function index()
    {
        $histories = ApplicationHistory::with('application', 'user')->latest()->get();
        return view('application_history.index', compact('histories'));
    }

    public function create()
    {
        $applications = Application::all();
        $users = User::all();
        return view('application_history.create', compact('applications', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'application_id' => 'required|exists:applications,id',
            'old_status' => 'required|string|max:30',
            'new_status' => 'required|string|max:30',
            'changed_by' => 'required|exists:users,id',
            'remarks' => 'nullable|string',
        ]);

        ApplicationHistory::create($request->all());
        return redirect()->route('application_history.index')->with('success', 'Application history added successfully.');
    }

    public function edit(ApplicationHistory $applicationHistory)
    {
        $applications = Application::all();
        $users = User::all();
        return view('application_history.edit', compact('applicationHistory', 'applications', 'users'));
    }

    public function update(Request $request, ApplicationHistory $applicationHistory)
    {
        $request->validate([
            'application_id' => 'required|exists:applications,id',
            'old_status' => 'required|string|max:30',
            'new_status' => 'required|string|max:30',
            'changed_by' => 'required|exists:users,id',
            'remarks' => 'nullable|string',
        ]);

        $applicationHistory->update($request->all());
        return redirect()->route('application_history.index')->with('success', 'Application history updated successfully.');
    }

    public function destroy(ApplicationHistory $applicationHistory)
    {
        $applicationHistory->delete();
        return redirect()->route('application_history.index')->with('success', 'Application history deleted successfully.');
    }
}
