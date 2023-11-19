
@extends('app.layout')
@section('content')

    <h2 class="text-center py-4">Employee Salary</h2>

    <div class="container">
    

        <div class="row">

            <div class="col-md-6">

                @if (Session::has('success'))
                    <h3 class="text-success">{{ Session::get('success') }}</h3>
                @endif


                <form action="/salary/import" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" accept=".csv">
                    <button type="submit">Salary Import</button>
                </form>

            </div>
      

            <div class="col-md-6"></div>


        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    

    @endsection
