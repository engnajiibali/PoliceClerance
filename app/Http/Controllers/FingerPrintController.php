<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fingers;
use App\Models\Applicant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class FingerPrintController extends Controller
{
       // List all certificates
    public function index()
    {
dd("welcome");
    }

    /**
     * Display a listing of the resource.
     */
public function collect($id)
{
    $pageTitle = "Finger Print Registration";
    $subTitle = "Finger Print Registration";

    $applicant = Applicant::findOrFail($id);

    // Define fingers
    $leftFingers = ['LEFT_THUMB', 'LEFT_INDEX', 'LEFT_MIDDLE', 'LEFT_RING', 'LEFT_LITTLE'];
    $rightFingers = ['RIGHT_THUMB', 'RIGHT_INDEX', 'RIGHT_MIDDLE', 'RIGHT_RING', 'RIGHT_LITTLE'];

    // Fetch existing fingerprints
    $existingFingers = fingers::where('person_id', $id)->get()->keyBy('finger_name');

    return view('fingerPrint.add', compact('pageTitle','subTitle','applicant','leftFingers','rightFingers','existingFingers'));
}

public function change($id)
{
    $pageTitle = "Finger Print Registration";
    $subTitle = "Finger Print Registration";

    $applicant = Applicant::findOrFail($id);

    // Define fingers
    $leftFingers = ['LEFT_THUMB', 'LEFT_INDEX', 'LEFT_MIDDLE', 'LEFT_RING', 'LEFT_LITTLE'];
    $rightFingers = ['RIGHT_THUMB', 'RIGHT_INDEX', 'RIGHT_MIDDLE', 'RIGHT_RING', 'RIGHT_LITTLE'];

    // Fetch existing fingerprints
    $existingFingers = fingers::where('person_id', $id)->get()->keyBy('finger_name');

    return view('fingerPrint.add', compact('pageTitle','subTitle','applicant','leftFingers','rightFingers','existingFingers'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $pageTitle = "Finger Print Registration";
 $subTitle = "Finger Print Registration";

return view('fingerPrint.add', compact('pageTitle','subTitle'));

    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
$validated = $request->validate([
    'person_id' => 'required|integer',
    'fingers' => 'required|array',
    'fingers.*.status' => 'nullable|boolean',
    'fingers.*.hand' => 'required|string', // add this line
    'fingers.*.template' => 'nullable|string',
    'fingers.*.wsq' => 'nullable|string',
    'fingers.*.bmp' => 'nullable|string', // base64 image
]);


foreach ($validated['fingers'] as $fingerName => $fingerData) {
    if (!empty($fingerData['template']) || !empty($fingerData['bmp'])) {

        $filePath = null;

        if (!empty($fingerData['bmp'])) {
            // Ensure folder exists
            $folderPath = public_path('fingers');
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, 0777, true);
            }

            // Clean base64 prefix
            $imageData = preg_replace('/^data:image\/\w+;base64,/', '', $fingerData['bmp']);
            $imageData = str_replace(' ', '+', $imageData);

            $fileName = Str::uuid()->toString() . '.png';
            $filePath = 'fingers/' . $fileName;

            File::put(public_path($filePath), base64_decode($imageData));
        }

        // Update if exists, otherwise insert
        DB::table('fingers')->updateOrInsert(
            [
                'person_id'   => $validated['person_id'],
                'finger_name' => $fingerName,
            ],
            [
                'fingers_temp' => $fingerData['template'] ?? null,
                'finger_img'   => $filePath,
                'hand'         => $fingerData['hand'] ?? null,
                'wsq'          => $fingerData['wsq'] ?? null,
                'bmp'          => $fingerData['bmp'] ?? null,
                'status'       => $fingerData['status'] ?? null,
                'updated_at'   => now(),
                'created_at'   => now(), // will be ignored if updating
            ]
        );
    }
}

    $applicant = Applicant::where('id', '=', $validated['person_id'])->first();
$applicant->fingerStatus = 1;

if ($applicant->save()) {
   return redirect()
        ->route('applicants.index')
        ->with('success', 'Fingerprint data saved successfully!');
} else {
return back()->with('fail', 'Failed to save Fingerprint data.');
}

 
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

   
       $fingers = fingers::where('person_id', '=', $id)->get();

$pageTitle = "User Details";
return view('fingerPrint.show', compact('fingers', 'pageTitle'));
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



    public function showVerifyPage()
{
       $pageTitle = "Finger Print Registration";
 $subTitle = "Finger Print Registration";

return view('fingerPrint.verify', compact('pageTitle','subTitle'));
}
public function verify(Request $request)
{
    dd($request->finger_template);
    $request->validate([
        'finger_name' => 'required|string',
        'finger_template' => 'required|string', // from scanner
    ]);

    // Fetch template from DB for the selected finger
    $finger = DB::table('fingers')
        ->where('finger_name', $request->finger_name)
        ->first();

    if (!$finger) {
        return back()->with('fail', 'No record found for this finger.');
    }

    // Here you must call your fingerprint SDK or matching algorithm
    // Example: $match = FingerprintSDK::match($request->finger_template, $finger->fingers_temp);
    $match = ($request->finger_template === "SCANNED_TEMPLATE_SAMPLE"); // fake match for demo

    if ($match) {
        return back()->with('success', 'Fingerprint verified successfully!');
    } else {
        return back()->with('fail', 'Fingerprint does not match.');
    }
}
public function getFingerprints()
{



        $fingers = fingers::get();  
        return $fingers;
}


}
