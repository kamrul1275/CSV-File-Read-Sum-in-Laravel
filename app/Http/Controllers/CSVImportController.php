<?php


namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Salary;
use App\Models\User;
use Illuminate\Http\Request;
use League\Csv\Reader;

class CSVImportController extends Controller
{

    function index()
    {

        $employeInfo = Employee::paginate(6);

        $totalSalary = Salary::sum('salary');

        $maxSalaryEmployees = Salary::select('salary')->orderBy('salary', 'desc')->get();

        $uniqueRecords = Employee::select('Name')->distinct()->get();

        // Unique employee names
        $uniqueEmployeeNames = Employee::select('Name')->distinct()->pluck('Name');

        // Common employee names
        $commonEmployeeNames = Employee::select('Name')->groupBy('Name')->havingRaw('COUNT(*) > 1')->pluck('Name');

        return view('home', compact('employeInfo', 'uniqueEmployeeNames', 'commonEmployeeNames', 'totalSalary', 'maxSalaryEmployees', 'uniqueRecords'));
    }





    // public function getEmployees()
    // {
    //     $employees = Employee::select(['Employee_Id', 'First_Name', 'Last_Name', 'Email', 'Phone_Number', 'Job_Id'])->get();
    //     return response()->json(['data' => $employees]);
    // }




    // user Profile

    function userProfile($id)
    {
        $usersInfo = User::find($id);
        return view('user.profile', compact('usersInfo'));
    } //end method



    function userProfileStore(Request $request)
    {

        $usersInfo = new User();
        $usersInfo->name = $request->name;
        $usersInfo->email = $request->email;

        //dd($usersInfo);
        $usersInfo->save();



        return redirect()->back()->with('success', 'Profile Update successfully.');
    } //end method




    public function import(Request $request)
    {
        $file = $request->file('file');

        $fileContents = file($file->getPathname());

        foreach ($fileContents as $key => $line) {

            // dd($line);
            if ($key === 0) {
                continue;
            }

            $data = str_getcsv($line);

            Employee::create([
                'Employee_Id' => $data[0],
                'Name' => $data[1],
                'Email' => $data[2],
                'Phone' => $data[3],
                'Job_Id' => $data[4],
                //dd($data[6]),
            ]);

            //dd($data[6]);
        }

        return redirect()->back()->with('success', 'CSV file imported successfully.');
    }
}
