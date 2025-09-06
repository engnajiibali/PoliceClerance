<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserLogin;
use App\Models\password_resets;
use Illuminate\Http\Request;
use Hash;
use Session;
class logingConroller extends Controller
{
public function index()
{
return view('login.index');
}
public function login(Request $request)
{
$request->validate([
'email' => 'required',
'password' => 'required'
]);
$user = User::where('email', '=', $request->email)->first();
if ($user) {
if (Hash::check($request->password, $user->password)) {
$request->Session()->put('warehouseID', $user->warehouse_id);
$request->Session()->put('userId', $user->id);
$request->Session()->put('username', $user->full_name);
$request->Session()->put('photo', $user->photo);
$request->Session()->put('type', $user->type);
$request->Session()->put('isAdmin', $user->isAdmin);
$request->Session()->put('userRole', $user->role_id);
$ip        = getRealIP();
$exist     = UserLogin::where('user_ip', $ip)->first();
$userLogin = new UserLogin();
if ($exist) {
$userLogin->longitude    = $exist->longitude;
$userLogin->latitude     = $exist->latitude;
$userLogin->city         = $exist->city;
$userLogin->country_code = $exist->country_code;
$userLogin->country      = $exist->country;
} else {
$info                    = json_decode(json_encode(getIpInfo()), true);
$userLogin->longitude    = @implode(',', $info['long']);
$userLogin->latitude     = @implode(',', $info['lat']);
$userLogin->city         = @implode(',', $info['city']);
$userLogin->country_code = @implode(',', $info['code']);
$userLogin->country =  @implode(',', $info['country']);
}
$userAgent          = osBrowser();

$userLogin->user_id = $user->id;
$userLogin->user_ip = $ip;
$userLogin->browser = @$userAgent['browser'];
$userLogin->os      = @$userAgent['os_platform'];
$userLogin->save();
return redirect('dashboard');
}
else{
return back()->with('fail', 'password not match');
}
}
else{
return back()->with('fail', 'this email is not registred');
}
}
public function logOut()
{
    if (Session::has('userId') || Session::has('loginId')) {
        Session::forget(['userId', 'loginId']);
        return redirect('/');
    }

    return redirect('/')->with('message', 'No active session found.');
}



}

