<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Application;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class CertificateController extends Controller
{
    // List all certificates
    public function index()
    {
        $certificates = Certificate::with(['application', 'application.applicant'])->get();
        return view('certificates.index', compact('certificates'))
               ->with(['pageTitle' => 'Certificates', 'subTitle' => 'All Certificates']);
    }

    // Show single certificate
 // Show single certificate
  // Show single certificate
 public function show(Certificate $certificate)
{
    // Eager load relationships
    $certificate->load(['application', 'application.applicant']);

    // Generate PDF from Blade view
    $pdf = Pdf::loadView('certificates.show', compact('certificate'))
              ->setPaper('a4', 'portrait');

    // Return PDF inline (view in browser)
    return $pdf->stream('certificate_'.$certificate->certificate_number.'.pdf');

    // OR: Force download
    // return $pdf->download('certificate_'.$certificate->certificate_number.'.pdf');
}

    // Optional: create new certificate
    public function create()
    {
        $applications = Application::with('applicant')->get();
        return view('certificates.create', compact('applications'));
    }

    // Optional: store new certificate
    public function store(Request $request)
    {
        $request->validate([
            'application_id' => 'required|exists:applications,id',
            'certificate_number' => 'required|string|unique:certificates,certificate_number',
            'issue_date' => 'required|date',
            'expiry_date' => 'required|date|after:issue_date',
            'status' => 'required|string',
        ]);

        Certificate::create($request->all());

        return redirect()->route('certificates.index')->with('success', 'Certificate created successfully.');
    }
}
