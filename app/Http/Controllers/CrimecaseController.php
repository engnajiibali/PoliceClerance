<?php

namespace App\Http\Controllers;

use App\Models\Crimecase;
use App\Models\CrimeType;
use Illuminate\Http\Request;
use App\Models\persons;
use App\Models\Suspect;
use App\Models\Fingers;




class CrimecaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = "Crime Cases";
        $cases = Crimecase::with('types')->latest()->get();
      
        return view('crimecases.index', compact('cases', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = "Add Crime Case";
        $crimeTypes = CrimeType::all();
    return view('crimecases.create', compact('crimeTypes'))->with('pageTitle', 'Add Crime Case');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'case_number' => 'required|unique:crimecases,case_number',
        'title' => 'required',
        'date_time' => 'required|date',
        'status' => 'required',
        'crime_types' => 'required|array',
        'crime_types.*' => 'exists:crime_types,id',
    ]);

    $crime = Crimecase::create($request->only([
        'case_number', 'title', 'description', 'date_time', 'location',
        'latitude', 'longitude', 'reported_by', 'assigned_officer', 'status'
    ]));

    // Attach selected crime types
    $crime->types()->attach($request->crime_types);

    return redirect()->route('crimes-cases.index')->with('success', 'Crime case created successfully.');
}


    /**
     * Display the specified resource.
     */
public function show($id)
{
    // Fetch the crime case with all related data
    $crimecase = Crimecase::with([
        'types',        // Crime types
        'suspects.persons',     // Suspects with related person
        'victims.persons',      // Victims with related person
        'witnesses.persons',    // Witnesses with related person
        'evidence'      // Evidence
    ])->find($id);

    // Check if the crime case exists
    if (!$crimecase) {
        return redirect()->route('crimes-cases.index')
            ->with('fail', 'Crime case not found.');
    }

    // Fetch all persons for the select dropdowns
    $persons = persons::all();

    $pageTitle = 'Crime Cases';
    $subTitle = 'View Case';

    return view('crimecases.show', compact('crimecase', 'pageTitle', 'subTitle', 'persons'));
}



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Crimecase $crimecase)
    {
        $pageTitle = "Edit Crime Case";
        $types = CrimeType::all();
        $selectedTypes = $crimecase->types->pluck('id')->toArray();
        return view('crimecases.edit', compact('crimecase', 'pageTitle', 'types', 'selectedTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Crimecase $crimecase)
    {
        $request->validate([
            'case_number' => 'required|unique:crimecases,case_number,' . $crimecase->id,
            'title'       => 'required|string|max:255',
            'date_time'   => 'required|date',
            'location'    => 'required|string|max:255',
            'status'      => 'required|string',
            'types'       => 'array'
        ]);

        $crimecase->update($request->only([
            'case_number', 'title', 'description', 'date_time', 'location', 
            'latitude', 'longitude', 'reported_by', 'assigned_officer', 'status'
        ]));

        $crimecase->types()->sync($request->types ?? []);

        return redirect()->route('crimecases.index')->with('success', 'Crime case updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Crimecase $crimecase)
    {
        $crimecase->delete();
        return redirect()->route('crimecases.index')->with('success', 'Crime case deleted successfully.');
    }

public function suspects($id)
{
    // Get the crime case with related suspects
    $crimecase = CrimeCase::with('suspects.persons')->findOrFail($id);

    // Get all persons to populate the "Add Suspect" dropdown
    $persons = persons::orderBy('FullName')->get();
    

    // Return view with crimecase and persons
    return view('crimecases.suspects', compact('crimecase', 'persons'));
}
public function insert(Request $request)
{
    try {
        // 1️⃣ Validate input
        $validated = $request->validate([
            'FullName'      => 'required|string|max:255',
            'Mothername'    => 'nullable|string|max:255',
            'Gender'        => 'required|in:Male,Female',
            'DOB'           => 'nullable|date',
            'POB'           => 'nullable|string|max:255',
            'Naitonality'   => 'nullable|string|max:255',
            'Address'       => 'nullable|string|max:255',
            'PhoneNumber'   => 'nullable|string|max:20',
            'Email'         => 'nullable|email|max:255',
            'profile_image' => 'nullable|image|max:4096', // max 4 MB
            'Status'        => 'nullable|string|max:50',
            'Notes'         => 'nullable|string|max:500',
            'crimecase_id'  => 'required|integer|exists:crimecases,id',
        ]);
if ($request->hasFile('profile_image')) {
$fileName = time() . '_img_' . $request->profile_image->getClientOriginalName();
$request->profile_image->move(public_path('upload/personImg'), $fileName);
 $validated['image'] = $fileName;
} else {
 $validated['image'] = 'userimg.png'; // Default image
}



    

        // 3️⃣ Create Person record
        $person = persons::create([
            'FullName'    => $validated['FullName'],
            'Mothername'  => $validated['Mothername'] ?? null,
            'Gender'      => $validated['Gender'],
            'DOB'         => $validated['DOB'] ?? null,
            'POB'         => $validated['POB'] ?? null,
            'Naitonality' => $validated['Naitonality'] ?? null, // ⚠️ ensure DB column matches
            'address'     => $validated['Address'] ?? null,
            'Phone'       => $validated['PhoneNumber'] ?? null,
            'Email'       => $validated['Email'] ?? null,
            'image'       => $validated['image'] ?? null,
            'status'      => $validated['Status'] ?? 'active',
            'createdby'   => 1,
        ]);

        if (!$person || !$person->id) {
            return redirect()->back()->with('error', 'Failed to create person record.')->withInput();
        }

        // 4️⃣ Create Suspect record linked to Person
        $suspect = Suspect::create([
            'crimecase_id' => $validated['crimecase_id'],
            'crime_id' => $validated['crimecase_id'],
            'person_id'    => $person->id,
            'status'       => $validated['Status'] ?? 'wanted',
        ]);

        if (!$suspect) {
            return redirect()->back()->with('fail', 'Person created, but failed to add as suspect.')->withInput();
        }

        return redirect()->back()->with('success', 'Person and Suspect added successfully!');

    } catch (\Illuminate\Validation\ValidationException $e) {
        // Validation errors
        return redirect()->back()->withErrors($e->validator)->withInput();
    } catch (\Exception $e) {
        // Any DB or unknown error
        return redirect()->back()->with('fail', 'Error: ' . $e->getMessage())->withInput();
    }
}
public function View($id)
{
    $suspect = Suspect::with('persons')->findOrFail($id);

    return response()->json([
        'id' => $suspect->id,
        'status' => $suspect->status,
        'FullName' => $suspect->persons->FullName ?? '',
        'Mothername' => $suspect->persons->Mothername ?? '',
        'Gender' => $suspect->persons->Gender ?? '',
        'POB' => $suspect->persons->POB ?? '',
        'DOB' => $suspect->persons->DOB ?? '',
        'Naitonality' => $suspect->persons->Naitonality ?? '',
        'Address' => $suspect->persons->address ?? '',
        'Phone' => $suspect->persons->Phone ?? '',
        'Email' => $suspect->persons->Email ?? '',
        'image' => $suspect->persons->image ?? '',

        
    ]);
}

public function victims($id)
{
    $crimecase = CrimeCase::with('victims.persons')->findOrFail($id);
    return view('crimecases.victims', compact('crimecase'));
}

public function witnesses($id)
{
    $crimecase = CrimeCase::with('witnesses.persons')->findOrFail($id);
    return view('crimecases.witnesses', compact('crimecase'));
}

public function evidence($id)
{
    $crimecase = CrimeCase::with('evidence')->findOrFail($id);
    return view('crimecases.evidence', compact('crimecase'));
}

public function storeSuspect(Request $request, $id)
{
    // Validate input
    $request->validate([
        'person_id' => 'required|exists:persons,id',
    ]);

    // Check if the suspect is already added for this crime
    $exists = Suspect::where('crimecase_id', $id)
                     ->where('person_id', $request->person_id)
                     ->exists();

                 

    if ($exists) {
          
        return redirect()->back()->with('fail', 'This person is already a suspect for this case.');
    }

    // Create new suspect
    Suspect::create([
        'crime_id' => $id,
         'crimecase_id' => $id,
        'person_id' => $request->person_id,
        'status' => $request->status, // optional, you can set default status
    ]);

    return redirect()->back()->with('success', 'Suspect added successfully.');
}

public function getdata(string $id)
{
    
    $person = persons::find($id);
    if (!$person) {
        return response()->json(['error' => 'Person not found'], 404);
    }

    $fingers = Fingers::where('person_id', $id)->get();

    return response()->json([
        'pageTitle' => 'Person Details',
        'person' => $person,
        'fingers' => $fingers
    ]);
}


}
