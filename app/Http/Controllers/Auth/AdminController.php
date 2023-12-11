<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\role_user;
use App\Models\User;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{


// admin login start
function adminLogin(){

    return view('backend.auth.login');
}


public function AdminPostLogin(Request $request)

{
    $request->validate([

        'email' => 'required',
        'password' => 'required',

    ]);


    $request->session()->regenerate();

    //dd($request->session()->regenerate());

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {

        return redirect()->intended(RouteServiceProvider::ADMIN_DASHBOARD)->withSuccess('Admin Successfully loggedin');
    }

    return redirect("/admin/login")->withSuccess('Oppes! You have entered invalid credentials');
}



// end admin login



    public function AdminDashboard()

    {

        //$roles = Role::latest()->get();
        return  view('backend.layout.dashboard');
    }

    public function Adminlogout()
    {
        Auth::logout();
        return Redirect('admin.login');
    } //end method



    function AdminPendding()
    {
        $users =  User::where('role', 'user')->where('status', 'inactive')->with('roles')->latest()->get();
        //dd($users);
        return view('backend.approverole.pendding', compact('users'));
    } //end method



    function AdminApproval($id)
    {

        $roles = User::find($id);

        //dd($roles);

        if ($roles->status == 'inactive') {

            $roles->status = 'active';

            //dd($roles);

            $roles->save();

            return redirect('/role/approve')->with('msg', 'Approve Successfully');
        }
    } //end method


    function AdminApprove()
    {
        $usersApprove =  User::where('role', 'user')->where('status', 'active')->with('roles')->latest()->get();
        return view('backend.approverole.approve', compact('usersApprove'));
    } //end method




    function AdminApprPendding($id)
    {

        $roles = User::find($id);
        if ($roles->status == 'active') {

            $roles->status = 'inactive';

            //dd($roles);

            $roles->save();

            return redirect('/role/approve')->with('msg', 'Pendding Successfully');
        }
    } //end method

}
