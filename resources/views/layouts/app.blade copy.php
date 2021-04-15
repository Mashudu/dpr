<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">






</head>
<!--<nav class="navbar navbar-expand-sm navbar-light bg-danger">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Areas
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            South Africa
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="#">OPCOS</a>
                            </li>
                         </ul
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">OPCOS</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Glossary Of Terms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
            </ul>

            <div class="d-flex">
                @if (Route::has('login'))
                    <div class="">
                        @auth
                            <a href="{{ route('user.profile') }}" class="nav-link-auth">Profile</a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                                           document.getElementById('logout-form').submit();"
                                class="nav-link-auth">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">
                                @csrf

                            </form>
                        @else
                            <a href="{{ route('login') }}" class="nav-link-auth">Log in</a>
                            |
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-link-auth">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif


            </div>

        </div>
    </div>
</nav> -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="main_nav">
  <ul class="navbar-nav">
      <li class="nav-item active"> <a class="nav-link" href="#">Home </a> </li>
      <li class="nav-item"><a class="nav-link" href="#"> About </a></li>
      <li class="nav-item"><a class="nav-link" href="#"> Services </a></li>
      <li class="nav-item dropdown">
         <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown">  More items  </a>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#"> Submenu item 1</a></li>
              <li><a class="dropdown-item" href="#"> Submenu item 2 </a></li>
          </ul>
      </li>
  </ul>
    </div> <!-- navbar-collapse.// -->
  </nav>

    {{-- stuff for the admin --}}
    @can('is-admin')
<nav class="navbar navbar-expand-sm navbar-light bg-info">
 
    <div class="container-fluid">
     
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
           
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.business-units.index') }}">Business Units</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.functional-areas.index') }}">Functional Areas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.processes.index') }}">Processes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{  route('admin.benefits.index')}}">Process Benefits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Glossary</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Settings
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('admin.benefit-types.index') }}">Benefit Types</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.statuses.index') }}">Statuses</a></li>
                        <li><a class="dropdown-item" href="#">Squad Settings</a></li>
                    </ul>
                </li>
        
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('admin/users') }}">Users</a>
                </li>
         


            </ul>



        </div>
    </div>
</nav>
@endcan
               


<body>

    <main class="container">
        <br>
        @include('partials.alerts')
        <br>
        @yield('content')
    </main>

</body>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
</script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
        -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dtUsers').DataTable();
    });
    $(document).ready(function() {
        $('#dt').DataTable();
    });

    



</script>

<script>
    $(document).ready(function(){
  $('.alert-success').fadeIn().delay(5000).fadeOut();
    });

    $(document).ready(function(){
  $('.alert-danger').fadeIn().delay(5000).fadeOut();
    });
</script>

</html>
