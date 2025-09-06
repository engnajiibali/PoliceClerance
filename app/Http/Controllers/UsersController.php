<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserLogin;
use App\Models\biilbook\persons;
use App\Models\biilbook\warehouses;
use App\Models\user_roles;
use App\Models\biilbook\sales;
use App\Models\accountant\accounts;
use App\Models\accountant\transections;
use App\Models\accountant\payments;
use App\Models\biilbook\sales_details;
use App\Models\biilbook\inventory;
use App\Models\biilbook\items;
use App\Models\biilbook\bills;
use App\Models\biilbook\quotations;
use App\Models\accountant\jornals;
use App\Models\accountant\Expenses;

use App\Models\biilbook\imports;
use App\Models\biilbook\categories;
use App\Models\biilbook\brands;
use App\Models\biilbook\units;
use App\Models\biilbook\purchases;
use App\Models\biilbook\purchase_items;

use Hash;
use Session;
class UsersController extends Controller
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
$pageTitle ="Users";
$subTitle ="User List";
$users = User::paginate(10);
$roles = user_roles::all();
return view('users.index', compact('roles','users','pageTitle','subTitle'));
}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{   
	$pageTitle ="Users";
$subTitle ="Add New User";
$roles = user_roles::all();
return view('users.add', compact('pageTitle','subTitle','roles'));
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
'role' => 'required',
'name' => 'required',
'phone' => 'required',
'email' => 'required |email|unique:users',
]);
$User = new User();
$User->role_id = $request->role;
$User->full_name = $request->name;
$User->phone = $request->phone;
$User->email  = $request->email;
$User->password = Hash::make('12345678');
$res= $User->save();
if ($res) {
return redirect('users')->with('success', 'User successsfully Registed');
}
else{
return back()->with('fail', 'Somthing Wrong');
}

//             $users= User::All();
// return view('users.index', compact('users'));

}

/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
//
}

/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{

	$pageTitle ="Users";
$subTitle ="Edit User";
$user= User::findOrfail($id);
$roles = user_roles::all();

return view('users.edit', compact('user','pageTitle','subTitle','roles')); 
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
'role' => 'required',
'name' => 'required',
'phone' => 'required',

]);
$User= User::findOrfail($id);
$User->role_id = $request->role;
$User->full_name = $request->name;
$User->phone = $request->phone;
$User->email  = $request->email;$User->password = Hash::make('12345');
$res= $User->save();
if ($res) {
return redirect('users')->with('success', 'User successsfully Updated');
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
$User = User::findOrfail($id);
if ($User->isDefault=="Yes") {
return back()->with('fail', 'This is Default User You Can not Delete');
}

$res= $User->delete();
if ($res) {
return back() ->with('success', 'User successsfully Deleted');
}
else{
return back()->with('fail', 'Somthing Wrong');
}
}
/**********************************************
 get Employee information to create user
***********************************************/ 

public function getEmployeeData(Request $request)
{
$persons = persons::where('id', '=',$request->id)->first();
echo $persons;
}

public function logiinHistory()
{
    // dd("well reched");
$pageTitle ="Login History";
$loginLogs = UserLogin::orderBy('created_at', 'DESC') // Order by the created_at column in descending order
    ->paginate(10); // Paginate the results with 10 records per page

return view('biilbook.users.loginhistory', compact('loginLogs','pageTitle'));
}

/**********************************************
Display change PAsword Form 
***********************************************/ 
public function changepassword()
{
    // dd("well reched");
$pageTitle ="Change Password";
$user = User::where('id', '=',Session()->get('userId'))->first();
return view('users.change_password', compact('user','pageTitle'));
}

/**********************************************
Update user Password
***********************************************/ 

public function updatePassword(Request $request)
{

$request->validate([
'current_password' => 'required',
'password' => 'min:6|required_with:confime_password|same:confime_password',
'confime_password' => 'min:6'
]);
$user = User::where('empID', '=',Session()->get('loginId'))->first();
if ($user) {
if (Hash::check($request->current_password, $user->password)) {
$User= User::findOrfail($user->id);
$User->password = Hash::make($request->password);
$User->save();


Session::pull('loginId');
return redirect('/')->with('success', 'Password Changed Loging with the New Password');

}
else{
return back()->with('fail', 'password does not matchg');
}
}
}

}