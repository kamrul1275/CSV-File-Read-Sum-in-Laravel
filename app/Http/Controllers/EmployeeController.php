<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }






    function EmployeStore(Request $request){
        // dd($request);

        //dd($request->Employee_Id);
    
         $request->validate([
            'Employee_Id' => 'required',
            'Name' => 'required',
            'Email' => 'required',
            'Phone' => 'required',
            'Job_Id' => 'required',
            'salary'=>'required',
            'Password'=>'required',
        ]);
    
    
        
    
        $employee=Employee::create([
    
            'Employee_Id' => $request->Employee_Id,
            'Name' =>$request->Name,
            'Email' => $request->Email,
            'Phone' =>$request->Phone,
            'Job_Id' =>$request->Job_Id,
            'salary' =>$request->Job_Id,
            'created_by'=> Auth::user()->id,
    
        ]); 
    
        // employe salary. part 
        if ($employee) {
            $employee->salary()->create([
                'salary' => $request->input('salary'),
                //dd($request->input('Employee_Id')),
                'Employee_Id' => $request->Employee_Id,
                // Add other fields as needed
            ]);
        } else {
         
        }


            // employe login . part 

            if ($employee) {
                User::create([
                    'name' => $request->input('Name'),
                    'email' => $request->input('Email'),
                    'password' => $request->input('Password'),
                    'employee_id'=> $employee->id,
                ]);
            } else {
                
            }
    
    
        
      
    
        return redirect()->back()->with('success', 'Employee Create successfully.');
    
        
    }
    


}
