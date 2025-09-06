<?php

namespace App\Http\Controllers;

use App\Models\Biometric;
use App\Models\Applicant;
use Illuminate\Http\Request;

class BiometricController extends Controller
{
    public function index()
    {
        $pageTitle = "Biometrics";
        $subTitle = "List of Biometrics";
        $biometrics = Biometric::with('applicant')->latest()->get();
        return view('biometrics.index', compact('biometrics', 'pageTitle', 'subTitle'));
    }

    public function create()
    {
        $pageTitle = "Biometrics";
        $subTitle = "Add Biometric Record";
        $applicants = Applicant::all();
        return view('biometrics.create', compact('pageTitle', 'subTitle', 'applicants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'fingerprint_template' => 'nullable|file',
            'face_scan' => 'nullable|image|mimes:jpg,jpeg,png',
            'iris_scan' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $data = $request->except(['fingerprint_template','face_scan','iris_scan']);

        // handle uploads
        if ($request->hasFile('fingerprint_template')) {
            $data['fingerprint_template'] = file_get_contents($request->file('fingerprint_template')->getRealPath());
        }

        if ($request->hasFile('face_scan')) {
            $data['face_scan'] = $request->file('face_scan')->store('faces', 'public');
        }

        if ($request->hasFile('iris_scan')) {
            $data['iris_scan'] = $request->file('iris_scan')->store('irises', 'public');
        }

        Biometric::create($data);

        return redirect()->route('biometrics.index')->with('success', 'Biometric record added successfully.');
    }

    public function show($id)
    {
        $pageTitle = "Biometrics";
        $subTitle = "Biometric Details";
        $biometric = Biometric::with('applicant')->findOrFail($id);
        return view('biometrics.show', compact('biometric', 'pageTitle', 'subTitle'));
    }

    public function edit($id)
    {
        $pageTitle = "Biometrics";
        $subTitle = "Edit Biometric Record";
        $biometric = Biometric::findOrFail($id);
        $applicants = Applicant::all();
        return view('biometrics.edit', compact('biometric', 'applicants', 'pageTitle', 'subTitle'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'fingerprint_template' => 'nullable|file',
            'face_scan' => 'nullable|image|mimes:jpg,jpeg,png',
            'iris_scan' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $biometric = Biometric::findOrFail($id);
        $data = $request->except(['fingerprint_template','face_scan','iris_scan']);

        if ($request->hasFile('fingerprint_template')) {
            $data['fingerprint_template'] = file_get_contents($request->file('fingerprint_template')->getRealPath());
        }

        if ($request->hasFile('face_scan')) {
            $data['face_scan'] = $request->file('face_scan')->store('faces', 'public');
        }

        if ($request->hasFile('iris_scan')) {
            $data['iris_scan'] = $request->file('iris_scan')->store('irises', 'public');
        }

        $biometric->update($data);

        return redirect()->route('biometrics.index')->with('success', 'Biometric record updated successfully.');
    }

    public function destroy($id)
    {
        $biometric = Biometric::findOrFail($id);
        $biometric->delete();

        return redirect()->route('biometrics.index')->with('success', 'Biometric record deleted successfully.');
    }
}
