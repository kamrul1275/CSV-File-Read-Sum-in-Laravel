<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

//use Session;

use App\Models\User;

//use Hash;
use Symfony\Component\HttpFoundation\Session\Session;
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

        return view('auth.registration');

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

        $check = $this->create($data);

         

        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');

    }

    

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function dashboard()

    {
$employes= Employee::paginate(8);

//dd($employes);

        if(Auth::check()){

            return view('dashboard',compact('employes'));

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

    public function logout() {

        //Session::flush();

        Auth::logout();

  

        return Redirect('login');

    }//end method





function EmployeStore(Request $request){

    //dd($request->Employee_Id);

     $request->validate([
        'Employee_Id' => 'required',
        'First_Name' => 'required',
        'Last_Name' => 'required',
        'Email' => 'required',
        'Phone_Number' => 'required',
        'Job_Id' => 'required',
        'salary'=>'required',
        'Employee_Id'=>'required',
    ]);


    

    $employee=Employee::create([

        'Employee_Id' => $request->Employee_Id,

        'First_Name' =>$request->First_Name,
        'Last_Name' => $request->Last_Name,
        'Email' => $request->Email,
        'Phone_Number' =>$request->Phone_Number,

        //dd($request->Job_Id),
        'Job_Id' =>$request->Job_Id,


    ]); 

    if ($employee) {
        $employee->salary()->create([
            'salary' => $request->input('salary'),
            //dd($request->input('Employee_Id')),
            'Employee_Id' => $request->input('Employee_Id'),
            // Add other fields as needed
        ]);
    } else {
        
    }


    
  

    return redirect()->back()->with('success', 'Employee Create successfully.');

    
}






}