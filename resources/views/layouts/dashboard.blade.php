<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>DPR</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
        <link href="{{ asset('cstm/css/styles.css')}}" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>      

    </head>
    
    <body class="sb-nav-fixed">
        <!-- -->
        
        <!-- -->
        <nav class="sb-topnav navbar navbar-expand navbar-danger bg-danger">
          <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    
            <a class="navbar-brand" href="#">DPR Site</a>
            <button id="btnToggle" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">
          
          <ul class="navbar-nav">
              <li class="nav-item active"> <a class="nav-link" href="{{ url('/') }}">Home </a> </li>
         </ul>
        
         
      </div>
      
          
            </div> <!-- navbar-collapse.// -->
          
          </nav>
            <button class="btn btn-link btn-sm order-1 order-lg-0"  hidden id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
              <div class="col-12 float-right">
                <ul class="navbar-nav ml-auto">
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
                   
                  
              
              </ul>
            </div>
            <!-- Navbar-->
             
        </nav>
        <div id="layoutSidenav">
           
            <div id="layoutSidenav_content">
                @yield('content')
            </div>
        </div>
 
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('cstm/js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('cstm/assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{ asset('cstm/assets/demo/chart-bar-demo.js')}}"></script>           
        <script src="{{ asset('cstm/assets/demo/chart-pie-demo.js')}}"></script>
        <script src="{{ asset('cstm/assets/demo/chart-bar-demo-2.js')}}"></script> 
         <script src="{{ asset('cstm/assets/demo/datatables-demo.js')}}"></script>       
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script>
          window.onload = function(){
        document.getElementById('sidebarToggle').click();
          }
      </script>
        <script>
            // Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#292b2c';
            
            // Bar Chart Example
             
            var statuses;
            var memberCount; 
            console.log("{{$businessUnit->id}}")
            
            $.get("{{ url('api/getProcessesByFunctionalAreaSummary/'. $businessUnit->id)}}", function(data){
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
            
            

        <script>
            $('#logout-button').on('click', function(e) {
         e.preventDefault();
         $('#logout-form').submit();
     });
        </script>

    <script>
        $(document).ready(function() {
       $('#businessUnit').on('change', function() {
           var stateID = $(this).val();
           if(stateID) {
               $.ajax({
                   url: '/depts/'+stateID,
                   type: "GET",
                   data : {"_token":"{{ csrf_token() }}"},
                   dataType: "json",
                   success:function(data) {
                   
                     if(data){
                       $('#dept').empty();
                       $('#dept').focus;
                       $('#dept').append('<option value="">-- Select Department --</option>'); 
                       $.each(data, function(key, value){   
                        for (let index = 0; index < value.length; index++) {
                            $('select[name="dept"]').append('<option value="'+ value[index].id +'">' + value[index].name+ '</option>');
            
                         }                      
                            });
                 }else{
                   $('#dept').empty();
                 }
                 }
               });
           }else{
             $('#dept').empty();
           }
       });
   });
   </script>
    


     
    </body>
</html>
