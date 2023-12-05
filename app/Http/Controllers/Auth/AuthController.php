<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Role;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller

{

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function index()

    {
        return view('auth.login');
    }

    /**

     * Write code on Method
     *
     * @return response()

     */
    public function registration()

    {

        $roles = Role::latest()->get();
        return view('auth.registration',compact('roles'));
    }
    /**

     * Write code on Method

     *

     * @return response()

     */

    public function postLogin(Request $request)

    {
        $request->validate([

            'email' => 'required',
            'password' => 'required',

        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            return redirect()->intended('dashboard')

                ->withSuccess('You have Successfully loggedin');
        }

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function postRegistration(Request $request)

    {
        $request->validate([

            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $user = $this->create($data);

        //User::find(1)?->

        //$user->roles()->sync([1,2]);


        $post_users = $request->input('roles');

        if ($post_users !== null) {
            $roles = [];
            foreach ($post_users as $key => $val) {
                $roles[intval($val)] = intval($val);
            }
    
            $user->roles()->sync($roles);

        //dd( $user);
    
             //$user->syncRoles($permissions);


        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }

    }

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function dashboard()

    {
        $employee = Employee::paginate(8);

        //dd($employes);

        if (Auth::check()) {
            request()->user();
            $roles = request()->user()->roles;

            $permissions = [];

            foreach($roles as $role){
                $permissions = array_merge($role->permission->toArray(), $permissions);
            };
            
//dd($permissions);
            return view('dashboard', compact('employee', 'permissions'));
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function create(array $data)

    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function logout()
    {
        Auth::logout();
        return Redirect('login');
    } //end method



    // user create 

    public function userStore(Request $request)

    {
        $request->validate([

            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',

        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect()->withSuccess('Great! You have Successfully ');
    }
}
