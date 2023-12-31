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
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Create_By</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                     
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
                                <label for="exampleInputEmail1" class="form-label"> Name</label>
                                <input type="text" class="form-control" name="Name" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>



                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="text" class="form-control" name="Email" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>


                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Phone</label>
                                <input type="text" class="form-control" name="Phone" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">JoB Id</label>
                                <input type="text" class="form-control" name="Job_Id" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3">
                                <label for="salary" class="form-label">Salary</label>
                                <input type="text" class="form-control" name="salary" aria-describedby="salary">
                            </div>

                            <div class="mb-3">
                                <label for="pass" class="form-label">Password</label>
                                <input type="password" class="form-control" name="Password" aria-describedby="pass">
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>





@endsection
