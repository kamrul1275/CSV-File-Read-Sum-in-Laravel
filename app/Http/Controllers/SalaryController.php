<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;

class SalaryController extends Controller
{
    function index()
    {

        return view('salary');
    } //end method



    
public function SalaryImport(Request $request)
{
    $file = $request->file('file');

    $fileContents = file($file->getPathname());

    foreach ($fileContents as $line) {
        $data = str_getcsv($line);

        Salary::create([
            'id' => $data[0],
            'Salary' => $data[1],
           //dd($data[2]),
            'Employee_Id' => $data[2],

          
           
        ]);

        //dd($data[6]);
    }

    return redirect()->back()->with('success', 'Salary imported successfully.');
}






}
