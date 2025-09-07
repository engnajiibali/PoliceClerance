<?php

namespace App\Http\Controllers;

use App\Models\persons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class PersonController extends Controller
{
public function __construct()
{
$this->middleware('permission:show')->only('show');
$this->middleware('permission:create')->only('create', 'store');
$this->middleware('permission:edit')->only('edit', 'update');
$this->middleware('permission:delete')->only('destroy');
}

/**
* Display a listing of the resource.
*/
public function index()
{
$pageTitle = "Employee";
$subTitle = "Employee List";
$persons = persons::paginate(10);
$AllPersons = persons::count();
$ActivePersons = persons::where('status', '=', "Active")->count();
$inActivePersons = persons::where('status', '=', "Inactive")->count();
$NewJoiners = persons::whereBetween('created_at', [
Carbon::now()->startOfWeek(),
Carbon::now()->endOfWeek()
])->count();
$enteries = persons::count();
return view('persons.index', compact('enteries','persons', 'AllPersons', 'ActivePersons', 'inActivePersons', 'NewJoiners', 'pageTitle', 'subTitle'));
}
public function searchPerson(Request $request)
{
$query = persons::query();

// Name search
if ($request->filled('name')) {
$name = strtoupper($request->name);
$query->where('FullName', 'like', "%$name%");
}

// Email filter (partial match)
if ($request->filled('email')) {
$query->where('Email', 'LIKE', '%' . $request->email . '%');
}

// Phone filter (partial match)
if ($request->filled('phone')) {
$query->where('Phone', 'LIKE', '%' . $request->phone . '%');
}

// Status filter
if ($request->filled('status')) {
$query->where('status', $request->status);
}

$persons = $query->paginate(10)->appends($request->except('page'));

$pageTitle = "Persons";
$subTitle = "Search Results";

$AllPersons = persons::count();
$ActivePersons = persons::where('status', 'Active')->count();
$inActivePersons = persons::where('status', 'Inactive')->count();
$NewJoiners = persons::whereBetween('created_at', [
Carbon::now()->startOfWeek(),
Carbon::now()->endOfWeek()
])->count();
$enteries = $persons->total(); // only filtered results count

return view('persons.index', compact(
'enteries',
'persons',
'AllPersons',
'ActivePersons',
'inActivePersons',
'NewJoiners',
'pageTitle',
'subTitle'
));
}

public function getpersons()
{

$pageTitle = "Employee";
$subTitle = "Employee List";
$persons = persons::paginate(12);
$AllPersons = persons::count();
$ActivePersons = persons::where('status', '=', "Active")->count();
$inActivePersons = persons::where('status', '=', "Inactive")->count();
$NewJoiners = persons::whereBetween('created_at', [
Carbon::now()->startOfWeek(),
Carbon::now()->endOfWeek()
])->count();
$enteries = persons::count();
return view('persons.grid', compact('enteries','persons', 'AllPersons', 'ActivePersons', 'inActivePersons', 'NewJoiners', 'pageTitle', 'subTitle'));
}

/**
* Show the form for creating a new resource.
*/
public function create()
{
$pageTitle = "Add Employee";
return view('persons.add', compact('pageTitle'));
}

public function store(Request $request)
{
    $request->validate([
        'FullName' => 'required|string|max:255',
        'Gender' => 'required|in:Male,Female',
        'Email' => 'nullable|email|max:255',
        'Phone' => 'nullable|string|max:20',
        'status' => 'nullable|in:0,1',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
        'captured_image' => 'nullable|string',
        'createdby' => 'nullable|string|max:255',
        'Mothername' => 'nullable|string|max:255',
        'DOB' => 'nullable|date',
        'POB' => 'nullable|string|max:255',
        'Naitonality' => 'nullable|string|max:255',
        'address' => 'nullable|string',
        'Notes' => 'nullable|string',
    ]);

    $person = new persons();

    $person->FullName = $request->FullName;
    $person->Gender = $request->Gender;
    $person->Email = $request->Email;
    $person->Phone = $request->Phone;
    $person->status = $request->status ?? 1;
    $person->createdby = $request->createdby;
    $person->Mothername = $request->Mothername;
    $person->DOB = $request->DOB;
    $person->POB = $request->POB;
    $person->Naitonality = $request->Naitonality;
    $person->address = $request->address;
    $person->Notes = $request->Notes;

    // Handle uploaded file
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('upload/persons'), $filename);
        $person->image = $filename;
    } 
    // Handle webcam snapshot
    elseif ($request->captured_image) {
        $image = $request->captured_image;
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = time().'.png';
        file_put_contents(public_path('upload/persons/'.$imageName), base64_decode($image));
        $person->image = $imageName;
    }

    $person->save();

    return redirect()->route('persons.index')->with('success', 'Person added successfully!');
}



/**
* Display the specified resource.
*/
public function show(string $id)
{
$person = persons::findOrFail($id);
$pageTitle = "User Details";
return view('persons.show', compact('person', 'pageTitle'));
}

/**
* Show the form for editing the specified resource.
*/
public function edit(string $id)
{
$person = persons::findOrFail($id);
$pageTitle = "Edit User";
return view('persons.edit', compact('person', 'pageTitle'));
}

/**
* Update the specified resource in storage.
*/
public function update(Request $request, $id)
{
$validated = $request->validate([
'fullName' => 'required|string|max:255',
'email'    => 'nullable|email',
'phone'    => 'nullable|string|max:20',
'gender'   => 'required',
]);

$person = persons::findOrFail($id);

// Handle profile image update if uploaded
if ($request->hasFile('personImd')) {
$fileName = time() . '_img_' . $request->personImd->getClientOriginalName();
$request->personImd->move(public_path('upload/personImg'), $fileName);
$person->image = $fileName;
}

// Update fields
$person->FullName = $request->fullName;
$person->Email    = $request->email;
$person->Phone    = $request->phone;
$person->Gender   = $request->gender;

if ($person->save()) {
return redirect('persons')->with('success', 'Person successfully updated.');
} else {
return back()->with('fail', 'Update failed.');
}
}

/**
* Remove the specified resource from storage.
*/
public function destroy(string $id)
{
$person = persons::findOrFail($id);
$person->delete();

return back()->with('success', 'User deleted successfully.');
}
}
