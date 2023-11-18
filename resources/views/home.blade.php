@extends('app.layout')
@section('content')
    <h2 class="text-center py-4">Employee History(Laravel)</h2>
    <div class="container">
        <a href="{{ url('/salary') }}" class="btn btn-success">Salary</a>

        <div class="row">

            <div class="col-md-10">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Employee_Id</th>
                            <th scope="col">First_Name</th>
                            <th scope="col">Last_Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone_Number</th>
                            <th scope="col">Job_Id</th>
                            <th scope="col">Salary</th>

                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($employeInfo as $data)
                            <tr>

                                <td>{{ $data->Employee_Id }}</td>
                                <td>{{ $data->First_Name }}</td>
                                <td>{{ $data->Last_Name }}</td>
                                <td>{{ $data->Email }}</td>
                                <td>{{ $data->Phone_Number }}</td>
                                <td>{{ $data->Job_Id }}</td>
                                <td>{{ $data->salary->salary ?? '' }}</td>
                            </tr>
                        @endforeach


                        <tr>
                            <td colspan="7" style="font-weight: bold;">Total:</td>
                            <td>{{ $totalSalary }}</td>

                        </tr>

                    </tbody>
                </table>
            </div>




            <div class="col-md-2">

                @if (Session::has('success'))
                    <h3 class="text-success">{{ Session::get('success') }}</h3>
                @endif


                <form action="/import" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" accept=".csv">
                    <button type="submit">Import CSV</button>
                </form>

            </div>
        </div>
    </div>




    <div class="container">

        <div class="row">

            <div class="col-md-4">
                <h3>uniqueRecords</h3>

                @foreach ($maxSalaryEmployees as $data)
                    <li>{{ $data }}</li>
                @endforeach
            </div>


            <div class="col-md-4">
                <h3> <u>Unique Name</u> </h3>

                @foreach ($uniqueEmployeeNames as $data)
                    <li>{{ $data }}</li>
                @endforeach
            </div>



            <div class="col-md-4">
                <h3> <u>Common Name</u> </h3>

                @foreach ($commonEmployeeNames as $data)
                    <li>{{ $data }}</li>
                @endforeach
            </div>
        </div>
    </div>

@endsection





