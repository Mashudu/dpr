@extends('layouts.main')
@section('content')

 <!-- ======= About Section ======= -->
 <section id="about" class="about">
    <div class="container">

      <div class="row content">
        <div class="col-lg-6">
          <h2>{{ $businessUnit->name }}</h2>
          <p>
          {!! $businessUnit->description !!}
          </p>
      
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0">
         <img src="{{ asset('img/about1.png') }}" />
        </div>
      </div>

    </div>
  </section><!-- End About Section -->

     <!-- ======= Services Section ======= -->
     <section id="services" class="services">
        <div class="container">
            <div class="section-title">
                <h2> Value Chain / Functional Areas</h2>
                <p>Value Chain</p>
              </div>
          <div class="row">
            <div class="row row-cols-1 row-cols-md-3 g-4">
               @foreach ($functionalAreas as $fa )
               <div class="col">
                 <div class="card h-100">
                   <img src="{{ asset('img/about1.png') }}" class="card-img-top" alt="{{ $fa->name }}">
                   <div class="card-body">
                     <h5 class="card-title">{{ $fa->name }}</h5>
                     <p class="card-text">{{ $fa->description }}</p>
                   </div>
                 </div>
               </div>
               @endforeach 
          
            
           
          </div>
  
        </div>
      </section>
      <section id="pricing" class="pricing">
         <div class="container">
             <div class="section-title">
                 <h2>Strategy</h2>
                 <p>Our Strategic Focus</p>
               </div>
           <div class="row">
   
             <div class="col-lg-4 col-md-6">
               <div class="box featured">
                 <h3>Efficiency</h3>
               
                 <ul>
                   <li>Reduction On Manual Hours</li>
                   <li>Improved Turn Around Times</li>
                   <li>Enabling  Cost Avoidance</li>
                   
                 </ul>
                 <h4>0<sup>hrs</sup><span> Saved</span></h4>
                 <div class="btn-wrap">
                   <a href="#" class="btn-buy">Contact Us</a>
                 </div>
               </div>
             </div>
   
             <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
               <div class="box featured">
                 <h3>Customer Experience</h3>
                
                 <ul>
                   <li>Reduction on Escalations</li>
                   <li>Reduction on Service requests</li>
                   <li></li>
                 </ul>
                 <h4>19<sup>Srs</sup><span> reduced</span></h4>
                 <div class="btn-wrap">
                   <a href="#" class="btn-buy">See More</a>
                 </div>
               </div>
             </div>
   
             <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
               <div class="box featured">
                 <h3>Revenue</h3>
                
                 <ul>
                   <li>Enabling Revenue  Uplift</li>
                   <li>Enabling revenue  leackage  prevention</li>
                   <li>Enabling  prevention of revenue  dilution</li>
                   
                 </ul>
                 <h4><sup>R</sup>29<span> enabled</span></h4>
                 <div class="btn-wrap">
                   <a href="#" class="btn-buy">See More..</a>
                 </div>
               </div>
             </div>
   
             
           </div>
   
         </div>
       </section><!-- End Pricing Section -->
      <!-- End Services Section -->
<!-- ======= Team Section ======= -->
<section id="team" class="team section-bg">
   <div class="container">
      <div class="section-title">
         <h2>Squad</h2>
         <p>Our Hardowrking Team</p>
      </div>
      <div class="row col-lg-12">
         <div class="col-lg-6">
            <div class="col-lg-12 mt-4 mt-lg-0">
               @foreach ( $squadMembers as $suadMember )
               <div class="member d-flex align-items-start">
                  <div class="pic"><img src="{{ asset('img/avatar-user.png') }}" class="img-fluid" alt=""></div>
                  <div class="member-info">
                     <h4>{{$suadMember->full_name  }}</h4>
                     <span>{{$suadMember->role  }}</span>
                     <p>{{$suadMember->email  }}</p>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
         <div class="col-lg-6">
            
                
             
                   <div class="address">
                     <i class="bi bi-geo-alt"></i>
                     <h4>Location:</h4>
                     <p>1st Floor, Renaissance Park, Midrand</p>
                   </div>
     
                   <div class="email">
                     <i class="bi bi-envelope"></i>
                     <h4>Email:</h4>
                     <p>rpa@vodacom.co.za</p>
                   </div>
     
                   <div class="phone">
                     <i class="bi bi-phone"></i>
                     <h4>Call:</h4>
                     <p>+27 63 6011 668</p>
                   </div>
      
     
             
     
             
     
                 <form action="forms/contact.php" method="post" role="form" class="">
                   <div class="row">
                     <div class="col-md-6 form-group">
                       <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                     </div>
                     <div class="col-md-6 form-group mt-3 mt-md-0">
                       <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                     </div>
                   </div>
                   <div class="form-group mt-3">
                     <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                   </div>
                   <div class="form-group mt-3">
                     <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                   </div>
                   <div class="form-group mt-3">
                     <div class="text-center"><button class="btn btn-primary" type="submit">Send Message</button></div>
                   </div>
                    
                 
                 </form>
     
            
     
             </div>
         </div>
      </div>
   </div>
</section>
<!-- End Team Section -->
   
@endsection