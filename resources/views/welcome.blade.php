@extends('layouts.main')
@section('content')
@include('partials.home-header')
 <!-- ======= About Section ======= -->
 <section id="about" class="about">
    <div class="container">

      <div class="row content">
        <div class="col-lg-6">
          <h2>About DPR</h2>
          <h3>DIGITAL PROCESS  RE-ENGINEERING TEAM</h3>
          <img src="{{ asset('img/about1.png') }}" />
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0">
          <p>
            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
            culpa qui officia deserunt mollit anim id est laborum
          </p>
          <ul>
            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequa</li>
            <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in</li>
          </ul>
          <p class="font-italic">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua.
          </p>
        </div>
      </div>

    </div>
  </section><!-- End About Section -->

     <!-- ======= Services Section ======= -->
     <section id="services" class="services">
        <div class="container">
            <div class="section-title">
                <h2>Specialty</h2>
                <p>OUR Specialty</p>
              </div>
          <div class="row">
            <div class="col-md-6">
              <div class="icon-box">
                <i class="bi bi-briefcase"></i>
                <h4><a href="#">Intelligent Automation</a></h4>
                <p>Our team uses Intteligent Automation to automate  business processes  and  create  value for  business</p>
              </div>
            </div>
            <div class="col-md-6 mt-4 mt-md-0">
              <div class="icon-box">
                <i class="bi bi-card-checklist"></i>
                <h4><a href="#">Process Re Engineering</a></h4>
                <p>Through the  re-engineering of  processes, we are  able to  unlock value  through  re-imagining  processes  and  reducing waste.</p>
              </div>
            </div>
            <div class="col-md-6 mt-4 mt-md-0">
              <div class="icon-box">
                <i class="bi bi-bar-chart"></i>
                <h4><a href="#">Big Data</a></h4>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
              </div>
            </div>
            <div class="col-md-6 mt-4 mt-md-0">
              <div class="icon-box">
                <i class="bi bi-binoculars"></i>
                <h4><a href="#">Artificial Intelligence</a></h4>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
              </div>
            </div>
            <div class="col-md-6 mt-4 mt-md-0">
              <div class="icon-box">
                <i class="bi bi-brightness-high"></i>
                <h4><a href="#">Machine Learning</a></h4>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
              </div>
            </div>
            <div class="col-md-6 mt-4 mt-md-0">
              <div class="icon-box">
                <i class="bi bi-calendar4-week"></i>
                <h4><a href="#">System Integration</a></h4>
                <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
              </div>
            </div>
          </div>
  
        </div>
      </section><!-- End Services Section -->

      <section id="pricing" class="pricing">
        <div class="container">
            <div class="section-title">
                <h2>Strategy</h2>
                <p>Our Strategic Focus</p>
              </div>
          <div class="row">
  
            <div class="col-lg-4 col-md-6">
              <div class="box featured">
              
                <h3>   <i class="bi bi-gear-wide-connected"></i> Efficiency</h3>
              
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua.</p>
                 
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
              <div class="box featured">
             
                <h3>    <i class="bi bi-emoji-smile-fill"></i> 
                  
                  Customer Experience</h3>
               
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.</p>
               
              
              
                
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
              <div class="box featured">
            
                <h3>     <i class="bi bi-bar-chart"></i> Revenue</h3>
               
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua.</p>
                 
              </div>
            </div>
  
            
          </div>
  
        </div>
      </section><!-- End Pricing Section -->
@endsection