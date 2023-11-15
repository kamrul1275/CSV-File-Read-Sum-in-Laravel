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

    $maxSalaryEmployees = Employee::select('salary')
            ->orderBy('salary', 'desc')
            ->get();
    // $nameU = Employee::where('First_Name', $employeeWithMaxSalary->First_Name)
    // ->distinct('First_Name')
    // ->pluck('First_Name');

    //$uniqueRecords = Employee::select('First_Name')->distinct()->get();


    // Unique employee names
$uniqueEmployeeNames = Employee::select('First_Name')
->distinct()
->pluck('First_Name');

// Common employee names
$commonEmployeeNames = Employee::select('First_Name')
->groupBy('First_Name')
->havingRaw('COUNT(*) > 1')
->pluck('First_Name');



    return view('home',compact('employeInfo' , 'totalSalary','maxSalaryEmployees','uniqueEmployeeNames','commonEmployeeNames'));

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
