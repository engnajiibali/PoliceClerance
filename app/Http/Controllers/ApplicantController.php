<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Region;
use App\Models\District;
use App\Models\Branch;
use App\Models\fingers;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function index()
    {  $pageTitle = "District Management";
        $subTitle = "District Management";
        $applicants = Applicant::with(['region', 'district', 'branch'])->get();
        return view('applicants.index', compact('applicants','pageTitle','subTitle'));
    }

    public function create()
    {
        $regions = Region::all();
        $districts = District::all();
        $branches = Branch::all();
        return view('applicants.create', compact('regions', 'districts', 'branches'));
    }

public function store(Request $request)
{
    $request->validate([
        'first_name' => 'required|string|max:100',
        'middle_name' => 'nullable|string|max:100',
        'last_name' => 'required|string|max:100',
        'dob' => 'required|date',
        'gender' => 'required|string|max:10',
        'national_id' => 'required|string|max:50',
        'passport_no' => 'nullable|string|max:50',
        'phone' => 'nullable|string|max:20',
        'email' => 'nullable|email|max:100',
        'address' => 'nullable|string',
        'photo_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'region_id' => 'nullable|exists:regions,id',
        'district_id' => 'nullable|exists:districts,id',
        'branch_id' => 'nullable|exists:branches,id',
    ]);

    $data = $request->all();

    // Handle photo upload
    if ($request->hasFile('photo_path')) {
        $file = $request->file('photo_path');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('upload/applicants'), $filename);
        $data['photo_path'] = 'upload/applicants/' . $filename;
    }

    $result = Applicant::create($data);

    return redirect()->route('applicants.index')
                     ->with('success', 'Applicant created successfully.');
}


    public function edit(Applicant $applicant)
    {
        $regions = Region::all();
        $districts = District::all();
        $branches = Branch::all();
        return view('applicants.edit', compact('applicant', 'regions', 'districts', 'branches'));
    }

    public function update(Request $request, Applicant $applicant)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'middle_name' => 'nullable|string|max:100',
            'last_name' => 'required|string|max:100',
            'dob' => 'required|date',
            'gender' => 'required|string|max:10',
            'national_id' => 'required|string|max:50|unique:applicants,national_id,' . $applicant->id,
            'passport_no' => 'nullable|string|max:50',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'address' => 'nullable|string',
            'photo_path' => 'nullable|string|max:255',
            'region_id' => 'nullable|exists:regions,id',
            'district_id' => 'nullable|exists:districts,id',
            'branch_id' => 'nullable|exists:branches,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo_path')) {
            $file = $request->file('photo_path');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/applicants'), $filename);
            $data['photo_path'] = 'upload/applicants/' . $filename;
        }

        $applicant->update($data);

        return redirect()->route('applicants.index')->with('success', 'Applicant updated successfully.');
    }
public function show(Applicant $applicant)
{

$pageTitle = "User Details";
       $LeftHand = fingers::where('person_id', '=', $applicant->id)->where('hand', '=', "LEFT")->get();
       $RightHand = fingers::where('person_id', '=',$applicant->id)->where('hand', '=', "RIGHT")->get();
return view('applicants.show', compact('applicant', 'pageTitle','LeftHand','RightHand'));
}
    public function destroy(Applicant $applicant)
    {
        $applicant->delete();
        return redirect()->route('applicants.index')->with('success', 'Applicant deleted successfully.');
    }
}
