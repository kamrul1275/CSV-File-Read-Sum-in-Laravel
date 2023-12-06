 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Laravel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
   
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">


                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard')}}">Home</a> 
                  </li>



                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('create.salary')}}">Salarry</a>
                  </li>

                  
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('create.employe')}}">Employe</a>
                  </li>

                 

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li> --}}
                    {{-- @dd(request()->user()->name) --}}

                    {{-- <li class="nav-item">
                        <a class="nav-link" href="">Profile</a>
                    </li> --}}


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                           {{Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="{{ url('/user/profile/'.Auth::user()->id) }}">Profile</a></li>
                          <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                      </li>

                @endguest
            </ul>
  
        </div>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
