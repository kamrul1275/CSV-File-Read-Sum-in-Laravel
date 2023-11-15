<?php


namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use League\Csv\Reader;

class CSVImportController extends Controller
{

   function index(){


    $employeInfo =Employee::get();
    $totalSalary = Employee::sum('salary');

    return view('home',compact('employeInfo' , 'totalSalary'));
    
   }


public function import(Request $request)
{
    $file = $request->file('file');

    $fileContents = file($file->getPathname());

    foreach ($fileContents as $line) {
        $data = str_getcsv($line);

        Employee::create([
            'Employee_Id' => $data[0],
            'First_Name' => $data[1],
            'Last_Name' => $data[2],
            'Email' => $data[3],
            'Phone_Number' => $data[4],
            'Job_Id' => $data[5],
            'Salary' => floatval($data[6]),
        ]);

        //dd($data[6]);
    }

    return redirect()->back()->with('success', 'CSV file imported successfully.');
}





}