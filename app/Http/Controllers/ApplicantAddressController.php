<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicantAddress;
use App\Models\Applicant;

class ApplicantAddressController extends Controller
{
    // Show all addresses
    public function index()
    
    { $pageTitle = "District Management";
          $applicants = Applicant::all();
        $addresses = ApplicantAddress::with('applicant')->get();
        return view('applicant_addresses.index', compact('addresses','pageTitle','applicants'));
    }

    // Show form to create new address
    public function create()
    {
        $applicants = Applicant::all();
        return view('applicant_addresses.create', compact('applicants'));
    }

    // Store new address
    public function store(Request $request)
    {
        $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'address' => 'required|string',
            'type' => 'required|string|max:50',
        ]);

        ApplicantAddress::create($request->all());

        return redirect()->route('applicant_addresses.index')->with('success', 'Address added successfully.');
    }

    // Show form to edit address
    public function edit($id)
    {
        $address = ApplicantAddress::findOrFail($id);
        $applicants = Applicant::all();
        return view('applicant_addresses.edit', compact('address', 'applicants'));
    }

    // Update address
    public function update(Request $request, $id)
    {
        $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'address' => 'required|string',
            'type' => 'required|string|max:50',
        ]);

        $address = ApplicantAddress::findOrFail($id);
        $address->update($request->all());

        return redirect()->route('applicant_addresses.index')->with('success', 'Address updated successfully.');
    }

    // Delete address
    public function destroy($id)
    {
        $address = ApplicantAddress::findOrFail($id);
        $address->delete();

        return redirect()->route('applicant_addresses.index')->with('success', 'Address deleted successfully.');
    }
}
