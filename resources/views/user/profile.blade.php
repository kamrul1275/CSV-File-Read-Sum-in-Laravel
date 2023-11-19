@extends('app.layout')
@section('content')
  
    <div class="container">
       
        <div class="row">

            <div class="col-md-7"><h3>User  Profile</h3>
            
            

@php


    // dd($usersInfo);
@endphp

            
               <form action="{{ url('/user/profile/store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                       
                        <input type="text" class="form-control" required value="{{ $usersInfo->id}}" name="id"
                            >
                    </div>


                    <div class="mb-3">
                       
                        <input type="text" class="form-control" required value="{{ $usersInfo->name}}"  name="name"
                            >
                    </div>

            
                    <div class="mb-3">
                       
                        <input type="text" class="form-control" required value="{{ $usersInfo->email}}" name="email" id="email" 
                            >
                    </div>

{{-- 
                   <div class="mb-3">
                       
                        <input type="text" class="form-control" value="{{ $usersInfo->phone}}"  name="phone" 
                            >
                    </div> --}}

                    {{-- <div class="mb-3">
                        
                        <input type="text" class="form-control" value="{{ $usersInfo->Job_Id}}"  name="Job_Id" 
                            >
                    </div>

                    <div class="mb-3">
                       
                        <input type="text" class="form-control" value="{{ $usersInfo->Email}}"  name="salary"  
                            >
                    </div>  --}}



                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            
            
            
            </div>

            <div class="col-md-5">  </div>

        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

@endsection





