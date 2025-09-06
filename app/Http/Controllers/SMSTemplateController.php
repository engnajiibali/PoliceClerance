<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\sms_templates;
use Illuminate\Http\Request;

class SMSTemplateController extends Controller
{
public function __construct()
{
$this->middleware('permission:show')->only('show');
$this->middleware('permission:create')->only('create');
$this->middleware('permission:edit')->only('edit');
$this->middleware('permission:delete')->only('destroy');
}
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
$pageTitle ="SMS";
$supTitle ="SMS Template";
$templates = sms_templates::paginate(10);

return view('smsTemplate.index', compact('pageTitle','supTitle','templates'));
}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
$pageTitle ="SMS";
$supTitle ="Create SMS Template";
return view('smsTemplate.add', compact('pageTitle','supTitle'));
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
$request->validate([
'name' => 'required',
'body' => 'required'
]);
// Create a new SMS instance
$template = new sms_templates();
$template->name = $request->name;
$template->body = $request->body;
// Save the SMS instance
$res = $template->save();

if ($res) {
return redirect('smsTemplate')->with('success', 'Template successsfully Created');
}
else{
return back()->with('fail', 'Somthing Wrong');
}
}

/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
//                     $pageTitle ="Edit Template";
//               $template= sms_templates::findOrfail($id);
// $unreadSMS = smspayments::where('status', '=', 0)->count('id');
// $unreadedahab = smspayments::where('status', '=', 0)->where('type', '=', "eDahab")->count('id');
// $unreadWallet = smspayments::where('status', '=', 0)->where('type', '=', "Premier Wallet")->count('id');
// $unreadOther = smspayments::where('status', '=', 0)->where('type', '=', "Other")->count('id');
// $unreadEvc = smspayments::where('status', '=', 0)->where('type', '=', "Evc Plus")->count('id');

// return view('biilbook.smsTemplate.show', compact('template','pageTitle','unreadSMS','unreadedahab','unreadWallet','unreadOther','unreadEvc'));
}

/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
$pageTitle ="SMS";
$supTitle ="Edit SMS Template";
$template= sms_templates::findOrfail($id);


return view('smsTemplate.edit', compact('template','pageTitle','supTitle'));
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
   // dd($request->all()); 
$request->validate([
'name' => 'required',
'body' => 'required'
]);
// Create a new SMS instance

$template = sms_templates::findOrfail($id);
$template->name = $request->name;
$template->body = $request->body;
// Save the SMS instance
$res = $template->save();

if ($res) {
return redirect('smsTemplate')->with('success', 'Template successsfully Created');
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
$sms_template = sms_templates::findOrfail($id);

$res= $sms_template->delete();
if ($res) {
;
return back() ->with('success', 'Template successfully deleted');
}
else{
return back()->with('fail', 'Somthing Wrong');
}

}
}
