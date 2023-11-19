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

    foreach ($fileContents as $key=> $line) {


        if ($key === 0) {
            continue;
        }

        $data = str_getcsv($line);

        Salary::create([
            
            'salary' => $data[0],
              //dd($data[1]),
            //'Employee_Id ' => $data[1],

          
           
        ]);

        //dd($data[6]);
    }

    return redirect()->back()->with('success', 'Salary imported successfully.');
}






}
