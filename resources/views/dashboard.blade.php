@extends('app.layout')

@section('content')



    <div class="container-fluid">
        <div class="row justify-content-center">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif







            <div class="container-fluid">

                <div class="row">

                    <div class="col-md-8">
                        <h3 class="text-center">Employee Table</h3>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Employe Id</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">JoB Id</th>
                                    <th scope="col">Salary</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>




                                @foreach ($employes as $key => $data)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $data->Employee_Id }}</td>
                                        <td>{{ $data->First_Name }}</td>
                                        <td>{{ $data->Last_Name }}</td>
                                        <td>{{ $data->Email }}</td>
                                        <td>{{ $data->Phone_Number }}</td>
                                        <td>{{ $data->Job_Id }}</td>
                                        <td>{{ $data->salary->salary ?? '' }}</td>
                                        <td> </td>


                                        <td>
                                            <a href="" class="btn btn-success">edit</a>
                                            <a href="" class="btn btn-danger">delete</a>

                                        </td>
                                    </tr>
                                @endforeach





                            </tbody>

                        </table>

                        {{ $employes->links() }}

                    </div>
                    <div class="col-md-4">

                        <h3 class="text-center">Registration Form</h3>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif



                        <form action="{{ route('employe.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Employe Id</label>
                                <input type="text" class="form-control" name="Employee_Id" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>


                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="First_Name" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="Last_Name" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="text" class="form-control" name="Email" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>


                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="Phone_Number" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">JoB Id</label>
                                <input type="text" class="form-control" name="Job_Id" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Salary</label>
                                <input type="text" class="form-control" name="salary" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>



                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>


                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
