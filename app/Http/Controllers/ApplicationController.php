<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Applicant;
use App\Models\User;
use App\Models\Region;
use App\Models\District;
use App\Models\Payment;
use App\Models\Branch;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::with(['applicant', 'officer', 'branch'])->get();
        return view('applications.index', [
            'applications' => $applications,
            'pageTitle' => 'Applications',
            'subTitle' => 'Applications'
        ]);
    }

    public function create()
    {
        $applicants = Applicant::all();
        $officers = User::all();
          $regions = Region::all();  
          $districts = Region::all();   // Fetch all regions
        $branches = Branch::all();
        return view('applications.create', compact('applicants', 'officers', 'branches','regions','districts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'application_type' => 'required|string|max:100',
            'application_date' => 'nullable|date',
            'status' => 'nullable|string|max:30',
            'priority' => 'nullable|string|max:20',
            'remarks' => 'nullable|string',
            'officer_id' => 'nullable|exists:users,id',
            'branch_id' => 'nullable|exists:branches,id',
        ]);

    // Insert Application
    $application = Application::create($request->all());

    // Insert Payment using Model
   $fff = Payment::create([
        'application_id' => $application->id,
        'amount' => 10,
        'currency' => 'USD',
        'payment_method' => 'N/A',
        'transaction_id' => null,
        'payment_date' => now(),
        'status' => 'pending',
    ]);



        return redirect()->route('applications.index')->with('success', 'Application created successfully!');
    }

    public function edit(Application $application)
    {
        $applicants = Applicant::all();
        $officers = User::all();
        $branches = Branch::all();
        return view('applications.edit', compact('application', 'applicants', 'officers', 'branches'));
    }

    public function update(Request $request, Application $application)
    {
        $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'application_type' => 'required|string|max:100',
            'application_date' => 'nullable|date',
            'status' => 'nullable|string|max:30',
            'priority' => 'nullable|string|max:20',
            'remarks' => 'nullable|string',
            'officer_id' => 'nullable|exists:users,id',
            'branch_id' => 'nullable|exists:branches,id',
        ]);

        $application->update($request->all());

        return redirect()->route('applications.index')->with('success', 'Application updated successfully!');
    }

    public function destroy(Application $application)
    {
        $application->delete();
        return redirect()->route('applications.index')->with('success', 'Application deleted successfully!');
    }

    public function show(Application $application)
    {
        return view('applications.show', compact('application'));
    }
}
