@extends('app.layout')

@section('content')
    <div class="container">


        <div class="row">


            <h1>create part</h1>


       <div class="col-md-12">

        <form>



            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="name">
            </div>


            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>



            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone">
            </div>
          
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

       </div>

        </div>
    </div>
@endsection
