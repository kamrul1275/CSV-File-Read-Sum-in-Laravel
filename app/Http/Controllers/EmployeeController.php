<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Jobs\ProcessPodcast;


class EmployeeController extends Controller
{

    function EmployeStore(Request $request)
    {
        // dd($request);
        $emai_store = $request->Email;
        //dd($request->Employee_Id);



        $request->validate([
            'Employee_Id' => 'required',
            'Name' => 'required',
            'Email' => 'required',
            'Phone' => 'required',
            'Job_Id' => 'required',
            'salary' => 'required',
            'Password' => 'required',
        ]);

        $employee = Employee::create([

            'Employee_Id' => $request->Employee_Id,
            'Name' => $request->Name,
            'Email' => $request->Email,
            'Phone' => $request->Phone,
            'Job_Id' => $request->Job_Id,
            'salary' => $request->Job_Id,
            'created_by' => Auth::user()->id,

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
                'employee_id' => $employee->id,
            ]);
        } else {
        }

    
        //dd( dispatch(new ProcessPodcast((object)$employee->Email)));
        dispatch(new ProcessPodcast((object)$employee->Email));

        //Mail::to($employee->Email)->send(new WelcomeEmail($employee));

        return redirect()->back()->with('success', 'Employee Create successfully.');
    }
}
