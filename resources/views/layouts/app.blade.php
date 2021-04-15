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
      <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
         crossorigin="anonymous"></script>
      <!-- Bootstrap files (jQuery first, then Popper.js, then Bootstrap JS) -->
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" type="text/javascript"></script>
      <script type="text/javascript">
         /// some script
         
         // jquery ready start
         $(document).ready(function() {
         	// jQuery code
         
         	//////////////////////// Prevent closing from click inside dropdown
             $(document).on('click', '.dropdown-menu', function (e) {
               e.stopPropagation();
             });
         
             // make it as accordion for smaller screens
             if ($(window).width() < 992) {
         	  	$('.dropdown-menu a').click(function(e){
         	  		e.preventDefault();
         	        if($(this).next('.submenu').length){
         	        	$(this).next('.submenu').toggle();
         	        }
         	        $('.dropdown').on('hide.bs.dropdown', function () {
         			   $(this).find('.submenu').hide();
         			})
         	  	});
         	}
         	
         }); // jquery end
      </script>
      <style type="text/css">
         @media (min-width: 992px){
         .dropdown-menu .dropdown-toggle:after{
         border-top: .3em solid transparent;
         border-right: 0;
         border-bottom: .3em solid transparent;
         border-left: .3em solid;
         }
         .navbar{ margin:0px  }
         .dropdown-menu .dropdown-menu{
         margin-left:0; margin-right: 0;
         }
         .bg-red{
         background-color:red;
         }
         .dropdown-menu li{
         position: relative;
         }
         .nav-item .submenu{ 
         display: none;
         position: absolute;
         left:100%; top:-7px;
         }
         .nav-item .submenu-left{ 
         right:100%; left:auto;
         }
         .dropdown-menu > li:hover{ background-color: #f1f1f1 }
         .dropdown-menu > li:hover > .submenu{
         display: block;
         }
         }
      </style>
   </head>
   <?php 
if(isset($businessUnit))
{
  $buID=$businessUnit->id;
}
else{
  $buID=-1;
}
  
  ?>
   <div class="navbar-wrap">
      <nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark bg-danger">
         <div class="container">
            <a class="navbar-brand" href="#">Brand</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">
               <button id="btnToggle" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="main_nav">
                  <ul class="navbar-nav">
                     <li class="nav-item active"> <a class="nav-link" href="{{ url('/') }}">Home </a> </li>
                     <li class="nav-item"><a class="nav-link" href="#"> About </a></li>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">  Foot Print  </a>
                        <ul class="dropdown-menu">
                           <li>
                              <a class="dropdown-item" href="#">South Africa &raquo </a>
                              <ul class="submenu dropdown-menu">
                                 <li>
                                    <a class="dropdown-item" href="">Business Units &raquo </a>
                                    <ul class="submenu dropdown-menu">
                                       @foreach ($saBus as $saBu )
                                       <li><a class="dropdown-item" href="{{ url('business-units/'.$saBu->id) }}">{{ $saBu->name }}</a></li>
                                       @endforeach
                                    </ul>
                                 </li>
                              </ul>
                           </li>
                           <li>
                              <a class="dropdown-item" href="#">OPCOS &raquo </a>
                              <ul class="submenu dropdown-menu">
                                 <li>
                                    <a class="dropdown-item" href="">Business Units &raquo </a>
                                    <ul class="submenu dropdown-menu">
                                       <!--     <li><a class="dropdown-item" href="">Consumer Business Unit (CBU)</a></li>
                                          <li><a class="dropdown-item" href="">Vodacom Business (VB)</a></li> -->
                                    </ul>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <li class="nav-item"><a class="nav-link" href="#"> Glosarry of Terms </a></li>
                     <li class="nav-item"><a class="nav-link" href="#"> Contact us </a></li>
                     <li class="nav-item"><a class="nav-link" href="#"> Help? </a></li>
                  </ul>
                  
                  <ul class="navbar-nav float-right">
                     <div class="d-flex">
                        @if (Route::has('login'))
                        <div class="navbar-nav">
                           @auth
                           <a href="{{ route('user.profile') }}" class="nav-link-auth">Profile</a>
                           <li class="nav-item"><a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                              document.getElementById('logout-form').submit();"
                              class="nav-link">Logout</a>
                            </li>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">
                              @csrf
                           </form>
                           @else
                           <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Log in</a></li>
                           
                           @if (Route::has('register'))
                          
                           <li class="nav-item">  <a href="{{ route('register') }}" class="nav-link">| Register</a></li>
                           @endif
                           @endauth
                        </div>
                        @endif
                     </div>
                  </ul>
               </div>
               <!-- navbar-collapse.// -->
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
      </div> <!-- navbar-collapse.// -->
      </div> <!-- container.// -->
      </nav>
   </div>
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
      integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
   <!-- Option 2: Separate Popper and Bootstrap JS -->
   <!--
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
      -->
   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
   <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
   <script>
      Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                 Chart.defaults.global.defaultFontColor = '#292b2c';
                 
                 // Bar Chart Example
            
                 var statuses;
                 var memberCount; 
     
                 
                 $.get("{{ url('api/getProcessesByFunctionalAreaSummary/'.$buID)}}", function(data){
                   var data2  =  $.parseJSON(data);
                 console.log(data2);
                 statuses = [];
                  memberCount =[]; 
                 
                   for (var i in data2) {
                 
                     memberCount.push(data2[i].number_of_processes);
                     statuses.push(data2[i].name);
                    
                   }
                  console.log(statuses);
                  console.log(memberCount);
                 
                  
                 
                
                 
                 
                 
                 var ctx = document.getElementById("myBarChart");
                 var myBarChart = new Chart(ctx, {
                   type: 'bar',
                   data: {
                     labels: statuses,
                     datasets: [{
                       label: "Number Of Processes",
                       backgroundColor: "rgba(2,117,216,1)",
                       borderColor: "rgba(2,117,216,1)",
                       data: memberCount,
                     }],
                   },
                   options: {
                     scales: {
                       xAxes: [{
                         time: {
                           unit: 'number'
                         },
                         gridLines: {
                           display: false
                         },
                         ticks: {
                           maxTicksLimit: memberCount.length+5
                         }
                       }],
                       yAxes: [{
                         ticks: {
                           min: 0,
                           max: memberCount.length+5,
                           maxTicksLimit: memberCount.length+5
                         },
                         gridLines: {
                           display: true
                         }
                       }],
                     },
                     legend: {
                       display: false
                     }
                   }
                 });
             });
     
         </script>
     
</html>