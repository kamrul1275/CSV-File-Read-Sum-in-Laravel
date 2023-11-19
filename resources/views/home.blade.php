@extends('app.layout')
@section('content')
    <h2 class="text-center py-4">Employee History(Laravel)</h2>




    <div class="container">
       
        <div class="row">

            <div class="col-md-10">



             <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Employee_Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Job_Id</th>
                            <th scope="col">Salary</th>

                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($employeInfo as $data)
                            <tr>

                                <td>{{ $data->Employee_Id }}</td>
                                <td>{{ $data->Name }}</td>
                        
                                <td>{{ $data->Email }}</td>
                                <td>{{ $data->Phone }}</td>
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

                {{ $employeInfo->links() }}
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









<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

<!-- DataTables JS -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>



<script>

        $(document).ready(function() {
            $('#employee-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url("get-employees") }}',
                columns: [
                    { data: 'Employee_Id', name: 'Employee_Id' },
                    { data: 'First_Name', name: 'First_Name' },
                    { data: 'Last_Name', name: 'Last_Name' },
                    { data: 'Email', name: 'Email' },
                    { data: 'Phone_Number', name: 'Phone_Number' },
                    { data: 'Job_Id', name: 'Job_Id' },
                   
                ]
            });
        });
    </script>



@endsection





