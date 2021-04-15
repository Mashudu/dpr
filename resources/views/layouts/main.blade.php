<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>DPR SITE</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('fe/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('fe/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('fe/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fe/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fe/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('fe/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fe/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fe/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('fe/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('fe/assets/css/style.css') }}" rel="stylesheet">

    <!--Data Table Bootstrap -->
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!--custom css -->
    <link href="{{ asset('fe/assets/css/custom.css') }}" rel="stylesheet">


    <!-- =======================================================
  * Template Name: Sailor - v4.0.1
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
<?php 
if(isset($businessUnit))
{
  $buID=$businessUnit->id;
}
else{
  $buID=-1;
}
  
  ?>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="index.html">DPR </a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="{{ asset('fe/assets/img/logo.png') }}" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">

                <div style="float:left; margin-left:0;margin-right:0;margin-top:0; margin-bottom:0;">
                    <ul>
                        <li><a href="{{ url('/') }}" class="active">Home</a></li>

                        <li class="dropdown"><a href="#"><span>Our Story In different Countries</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li class="dropdown"><a href="#">South Africa</a>
                                    <ul>
                                        <li class="dropdown"><a href="#"><span>Business Units</span> <i
                                                    class="bi bi-chevron-right"></i></a>
                                            <ul>
                                              @foreach ($saBus as $saBu )
                                       <li><a  href="{{ url('business-units/'.$saBu->id) }}">{{ $saBu->name }}</a></li>
                                       @endforeach
                                            
                                               
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li class="dropdown"><a href="#">Lesotho</a>
                                  <ul>
                                      <li class="dropdown"><a href="#"><span>Business Units</span> <i
                                                  class="bi bi-chevron-right"></i></a>
                                          <ul>
                                            
                                            @foreach ($lesothoBus as $lesothoBu )
                                            <li><a  href="{{ url('business-units/'.$lesothoBu->id) }}">{{ $lesothoBu->name }}</a></li>
                                            @endforeach
                                          </ul>
                                      </li>
                                  </ul>
                              </li>


                            </ul>
                        </li>
                        @can('is-admin')
                        <li class="dropdown"><a href="#">Admin <i
                          class="bi bi-chevron-down"></i></a>
                          <ul>
                             
                                
 
                                    <li >
                                    <a  href="{{ route('admin.business-units.index') }}">Business Units</a>
                                    </li>
                                    <li >
                                    <a  href="{{ route('admin.functional-areas.index') }}">Functional Areas</a>
                                    </li>
                                    <li >
                                    <a  href="{{ route('admin.processes.index') }}">Processes</a>
                                    </li>
                                    <li >
                                    <a  href="{{  route('admin.benefits.index')}}">Process Benefits</a>
                                    </li>
                                    <a  href="{{  route('admin.glossary.index')}}">Glossary</a>
                                  </li>
                                    
                                  
                                    <li><a class="dropdown-item" href="{{ route('admin.benefit-types.index') }}">Benefit Types</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.statuses.index') }}">Statuses</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.squad-members.index') }}">Squad Settings</a></li>
                                 
                                 
                                    <li >
                                    <a class="nav-link active" aria-current="page" href="{{ url('admin/users') }}">Users</a>
                                    </li>
                                 
                           
                          
                                  
                              
                          </ul>
                      </li>
                      @endcan
                                                 
                        <li><a href="#">Latest News</a></li>
                        <li><a href="{{ route('pages.glossary') }}">Glossay</a></li>
                        <li><a href="{{ route('contact.index') }}">Contact</a></li>
                        <!-- Send  to the  far right  -->


                        <!-- Send  to the  far right  -->
                    </ul>
                </div>
                <style>
                    .disabled-link {
                        pointer-events: none;
                    }

                </style>
                <div style="float:right; margin-left:50px;margin-right:0px;margin-top:0px; margin-bottom:0px;">
                    <ul>
                   
                        <div class="btn-group">
                    
                                @if (Route::has('login'))
                           
                                   @auth
                                 <li>  <a href="{{ route('user.profile') }}" class="active"
                                   style="margin-left:0px;margin-right:0px; padding:0; text-decoration:underline">Profile</a></li>     <li><a href="#" class="active disabled-link"
                                    style="margin-left:0px;margin-right:0px;padding: 0px 3px 0px 3px;">|</a></li>
                                   <li ><a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                                      document.getElementById('logout-form').submit();"
                                     class="active"
                                     style="margin-left:0px;margin-right:0px; padding:0; text-decoration:underline">Logout</a>
                                    </li>
                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">
                                      @csrf
                                   </form>
                                   @else
                                   <li ><a href="{{ route('login') }}" class="active"
                                    style="margin-left:0px;margin-right:0px; padding:0; text-decoration:underline">Log in</a></li>
                                   
                                   @if (Route::has('register'))
                                   <li><a href="#" class="active disabled-link"
                                    style="margin-left:0px;margin-right:0px;padding: 0px 3px 0px 3px;">|</a></li>
                                   <li >  <a href="{{ route('register') }}" class="active" style="margin-left:0px;margin-right:0px; padding:0; text-decoration:underline"> Register</a></li>
                                   @endif
                                   @endauth
                               
                                @endif
                       
                            
                           
                        </div>



                    </ul>
                </div>


                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
           
        </div>
      
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
  
    <main>
      @if(Request::is('/'))
      <br>
      @include('partials.alerts')
      @yield('content')
@else
<div class="container">

  <br>
  <br>    
  <br>    
  <br>
  <br>
  @include('partials.alerts')
  @yield('content')
  <br>
  <br>
</div>
@endif
     

    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-info">
                            <h3>DPR</h3>
                            <p>
                              1st Floor, Renaissance Park, <br>
                              Midrand<br><br>
                                
                                <strong>Email:</strong> rpa@vodacom.co.za<br>
                            </p>
                            <div class="social-links mt-3">
                                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>                        
                            
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Focus Areas</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Digital Process Re Engineering</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Robotic Process Automation</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Intellligent Automation</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Big Data </a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">AI & Machine Learning</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Our Newsletter</h4>
                        <p>If  you are  interested in our  newsletter, please subscribe</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>DPR</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/sailor-free-bootstrap-theme/ -->
               <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('fe/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('fe/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('fe/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('fe/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('fe/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('fe/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('fe/assets/js/main.js') }}"></script>

    <!-- Data Tables Js Files-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>

    <!--Chart js   -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
   

    <!--custom js  files-->
    <script src="{{ asset('fe/assets/js/dataTables.js') }}"></script>
    <script src="{{ asset('fe/assets/js/functions.js') }}"></script>

    <script src="https://cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>

    <script>
 Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#292b2c';
            
            // Bar Chart Example
             
            var statuses;
            var memberCount; 

            
            $.get("{{ url('api/getProcessesByFunctionalAreaSummary/'. $buID)}}", function(data){
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
  CKEDITOR.replace( 'description' );
</script>
<script>
  CKEDITOR.replace( 'problem' );
</script>
<script>
  CKEDITOR.replace( 'solution' );
</script>
<script>
  CKEDITOR.replace( 'benefit_description' );
</script>
</body>

</html>
