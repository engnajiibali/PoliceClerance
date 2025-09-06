<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\user_roles;

class CheckUserPermission
{
public function handle($request, Closure $next, $permission)
{
    // Assume $userRole is obtained here
        $userRole = user_roles::where('id', Session()->get('userRole'))->first(); // Modify this if your roles are accessed differently

    // Debug log for role permissions and requested permission
    \Log::info("Checking permission: ". $permission);
    // \Log::info("User permissions: ", [
    //     'Read' => $userRole->Read,
    //     'Write' => $userRole->Write,
    //     'Edit' => $userRole->Edit,
    //     'Delete' => $userRole->Delete,
    // ]);

    if (        
        ($permission === 'show' && $userRole->Read_permision == 1) ||
        ($permission === 'create' && $userRole->Write_permision == 1) ||
        ($permission === 'edit' && $userRole->Edit_permision == 1) ||
        ($permission === 'delete' && $userRole->Delete_permision == 1)) {
        return $next($request);
    }

    // Log the action when permission fails
    \Log::warning("Permission denied for: $permission");

     return redirect()->back()->with('fail', 'You do not have permission to access this page.')
    ->withInput() ?: redirect('biilbook/dashboard')->with('fail', 'You do not have permission to access this page.');

}

}
