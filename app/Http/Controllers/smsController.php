<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sms;
use App\Models\sms_templates;
use App\Models\sms_messages;
use App\Models\members;
use App\Models\hormuud_sms_apis;
class smsController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
$Messages = sms::paginate(10);
$templates  = sms_templates::all();
$pageTitle ="SMS Managements";
// Get token details from the service

// Pass all data to the view
return view('sms.index', compact('pageTitle','Messages','templates'));
}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
	$pageTitle ="SMS Managements";
    $sms_apis = hormuud_sms_apis::where('id', '=', 1)->first();
return view('sms.config', compact('pageTitle','sms_apis'));
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
// Validation for common fields
$rules = [
'campign' => 'required|string', // Ensure campaign name is provided
'SmsType' => 'required|string', // Ensure SmsType is provided
'message' => 'required|string|max:500', // Message is required with a max length
];

// Add telephone validation only if SmsType is "Single Number"
if ($request->SmsType === "Single Number") {
$rules['telephone'] = 'required|string|regex:/^\+?[0-9]{10,15}$/'; // Ensure phone number format is valid
}

// Validate the incoming request
$validatedData = $request->validate($rules);

// Create a new SMS instance
$sms = new Sms();
$sms->campign_name = $validatedData['campign'];
$sms->messages = $validatedData['message'];
$sms->SmsType = $validatedData['SmsType'];
$sms->createdBy = session()->get('userId'); // Set createdBy from session

// Save the SMS to the database
$smsSaved = $sms->save();

if ($smsSaved) {
// If SmsType is "Single Number", save the single message
if ($validatedData['SmsType'] === "Single Number") {
	  HormuudSMS($validatedData['telephone'], $validatedData['message']);
$smsMessage = new sms_messages();
$smsMessage->sms_id = $sms->id;
$smsMessage->campign_name = $validatedData['campign'];
$smsMessage->telephone = $validatedData['telephone'];
$smsMessage->messages = $validatedData['message'];

if ($smsMessage->save()) {
return back()->with('success', 'SMS successfully sent!');
} else {
return back()->with('fail', 'Failed to save the SMS message.');
}
} else {
// If SmsType is not "Single Number", send messages to all relevant members
$members = members::where('memberType', $validatedData['SmsType'])->get();

foreach ($members as $member) {
// Validate the phone number using regex
if (!empty($member->Phone)) {
		  HormuudSMS($member->Phone, $validatedData['message']);
// Create a new SMS message for each member
$smsMessage = new sms_messages();
$smsMessage->sms_id = $sms->id;
$smsMessage->campign_name = $validatedData['campign'];
$smsMessage->telephone = $member->Phone;
$smsMessage->messages = $validatedData['message'];

// Save the SMS message
$smsMessage->save();
}
}

return back()->with('success', 'SMS successfully sent to all members!');
}
}

// Return failure if SMS save fails
return back()->with('fail', 'Something went wrong.');
}


/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
$pageTitle ="View SMS";
$subTitle ="Add New subcribtion";
$Sms= Sms::findOrfail($id);

$messages = sms_messages::where('sms_id', '=', $id)->paginate(10);

return view('sms.show', compact('Sms','messages','pageTitle','subTitle'));
}

/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
//
}

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
$request->validate([
'username' => 'required',
'password' => 'required'
]);

$config = hormuud_sms_apis::findOrfail($id);
$config->UserName = $request->username;
$config->Password = $request->password;
$config->createdBy = Session()->get('loginId');
$res= $config->save();
if ($res) {
return back()->with('success', 'API Confiration Successfullly updated');
}
else{
return back()->with('fail', 'Somthing Wrong');
}
}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
// Find the expense by ID and delete it
$Sms = Sms::findOrFail($id);
sms_messages::where('sms_id', '=', $id)->delete();
// Delete the expense
$res = $Sms->delete();

// Check if deletion was successful
if ($res) {

return redirect()->route('sms.index')->with('success', 'sms successfully deleted');
} else {
return back()->with('fail', 'Something went wrong while deleting');
}
}
}
