@extends('app.layout')

@section('content')
    {{-- start nav --}}



{{-- //@dd($permissions); --}}




    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
      
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    @if(isPermission('view'))
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('permission.view') }}">View</a>
                        </li>
                    @endif

                    @if(isPermission('create'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('permission.create')}}">Create List</a>
                        </li>
                    @endif

                    @if(isPermission('edit'))
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('permission.edit')}}"> Edit</a>
                        </li>
                        @endif

                        @if(isPermission('delete'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('permission.delete')}}"> Delete</a>
                            </li>
                        @endif


        



                </ul>
            </div>
        </div>
    </nav>

    {{-- end nav --}}

    {{-- <ul class="d-flex">
        @if (isPermission('menntor'))
            <li class="ml-4"><a href="#">Mentor</a></li>
        @endif

        @if (isPermission('product_list'))
            <li class="ml-4"><a href="#">Product List</a></li>
        @endif

        @if (isPermission('product_edit'))
            <li class="ml-4"><a href="#">Product Edit</a></li>
        @endif


        @if (isPermission('product_delete'))
            <li class="ml-4"><a href="#">Product Delete</a></li>
        @endif

        @if (isPermission('product_view'))
            <li class="ml-4"><a href="#">Product View</a></li>
        @endif

        @if (isPermission('order'))
            <li class="ml-4"><a href="#">Order</a></li>
        @endif

        @if (isPermission('purchel'))
            <li class="ml-4"><a href="#">Parcel</a></li>
        @endif
    </ul> --}}





    @php
        $id = Auth::user()->id;

        //dd($id);
        $usersAuth = App\Models\User::find($id);

        $Userstatus = $usersAuth->status;
        //dd($Userstatus);

        //User::where('role', 'user')->where('status', 'inactive')->with('roles')->latest()->get();

        //dd($usersPendding);
    @endphp






    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif



    {{-- Used condition,  --}}

    @if ($Userstatus == 'inactive')

        <h2 class="text-danger">Inactive Account</h2>
        <h5>Admin will Active Account</h5>


        <div class="container">

            <div class="row">
            @elseif(collect($permissions)->where('permission_name', 'create')->count())
                <div class="col-md-9">
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
                            @foreach ($employee as $data)
                                <tr>
                                    <td>4</td>
                                    <td>{{ $data->Name }}</td>
                                    <td>{{ $data->Email }}</td>
                                    <td>{{ $data->Phone }}</td>
                                    <td>{{ $data->user->name ?? '' }}</td>

                                    <td>
                                        <a href="" class="btn btn-success">Edit</a>
                                        <a href="" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $employee->links() }}
                </div>
            @elseif(collect($permissions)->where('permission_name', 'edit')->count())
                <div class="col-md-3">

                    <h3 class="text-center">Registration</h3>

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
                            <input type="text" class="form-control" name="Job_Id" id="exampleInputEmail1">
                        </div>

                        <div class="mb-3">
                            <label for="salary" class="form-label">Salary</label>
                            <input type="text" class="form-control" autocomplete="off" name="salary">
                        </div>

                        <div class="mb-3">
                            <label for="pass" class="form-label">Password</label>
                            <input type="password" class="form-control" name="Password">
                        </div>


                        <div class="mb-3" hidden="hidden">
                            {{--                                
                                <input type="hiden" class="form-control" name="employe_id" id="exampleInputEmail1"
                                    aria-describedby="emailHelp"> --}}
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>


    @endif

    </div>
    </div>













    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
@endsection
