@extends('layouts.main')
@section('content')
<div class="container">
   <div class="col-lg-6">
      <h2>{{ $businessUnit->name }}</h2>
   </div>
   {!! $businessUnit->description !!}
   <br>
   <br>
   <div class="row">
      <div class="col-lg-equal col-md-equal col-sm-equal 
         col-xs-equal">
         <div class="card border-success">
            <div class="card-header">Total Processes</div>
            <div class="card-body text-success">
               <h5 class="card-title text-center">{{ $totalProcesses[0]->number_of_processes }}</h5>
               <p class="card-text text-center">100 % </p>
            </div>
         </div>
      </div>
      <div class="col-lg-equal col-md-equal col-sm-equal 
         col-xs-equal">
         <div class="card border-success">
            <div class="card-header">Total Complete</div>
            <div class="card-body text-success">
               <h5 class="card-title text-center"> {{ $totalProcessesComplete[0]->number_of_processes }}</h5>
               <p class="card-text text-center">{{ round($percentageComeple,2)  }} % </p>
            </div>
         </div>
      </div>
      <div class="col-lg-equal col-md-equal col-sm-equal 
         col-xs-equal">
         <div class="card border-danger">
            <div class="card-header">Total In Progress</div>
            <div class="card-body text-danger">
               <h5 class="card-title text-center">{{ $totalProcessesInProgress[0]->number_of_processes }}</h5>
               <p class="card-text text-center">{{ round($percentageInProgress,2) }} % </p>
            </div>
         </div>
      </div>
      <div class="col-lg-equal col-md-equal col-sm-equal 
         col-xs-equal">
         <div class="card border-success">
            <div class="card-header">Total To-Do</div>
            <div class="card-body text-success">
               <h5 class="card-title text-center">{{ $totalProcessesToDo[0]->number_of_processes }}</h5>
               <p class="card-text text-center">{{ round($percentageToDo,2) }} % </p>
            </div>
         </div>
      </div>
      <div class="col-lg-equal col-md-equal col-sm-equal 
         col-xs-equal">
         <div class="card border-danger">
            <div class="card-header">Total Backlog</div>
            <div class="card-body text-danger">
               <h5 class="card-title text-center">{{ $totalProcessesBacklog[0]->number_of_processes }}</h5>
               <p class="card-text text-center">{{ round($percentageBacklog,2) }} % </p>
            </div>
         </div>
      </div>
   </div>
   <hr>
   <br>
   <div class="row">
      <div class="col-xl-6">
         <div class="card mb-4">
            <div class="card-header">
               <i class="fas fa-chart-area mr-1"></i>
               Processes per Functional Area
            </div>
            <div class="card-body">
               <canvas id="myBarChart" width="100%" height="117" ></canvas>
            </div>
         </div>
      </div>
      <div class="col-xl-6"  >
         <div class="row" >
            @foreach ( $benefitsList as $benefit)
            <div class="col-xl-6 col-md-3">
               <div class="card text-white mb-1
                  @if($loop->iteration % 2 == 0)
                  bg-primary
                  @else
                  bg-success
                  @endif                   
                  ">
                  <div class="card-body"> <i class="fas fa-chart-area"></i> <small>{{ $benefit->benefit_type }}</small></div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                     <a class="small text-white stretched-link" href="#">
                     {{ $benefit->unit_left }}     {{ number_format(round($benefit->total_benefit_value,2)) }}     {{ $benefit->unit_right }} 
                     </a>
                     <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
               </div>
            </div>
            @endforeach
            <div class="col-xl-12 col-md-12">
               <div class="card mb-4">
                  <div class="card-header">
                     <i class="fas fa-chart-area mr-1"></i>
                     Next  Three Priorities
                  </div>
                  <table class="table table-sm w-auto text-xsmall">
                     <thead class="thead-dark">
                        <tr>
                           <th scope="col">Process ID</th>
                           <th scope="col">Name</th>
                           <th scope="col">Description</th>
                           <th scope="col">Benefits</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ( $priorityList as $process )
                        <tr>
                           <th scope="row"> {{ $process->id }}</th>
                           <td>{{ $process->name }}</td>
                           <td>{{ $process->description }}</td>
                           <td>{{ $process->benefit_description }}</td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="card mb-4">
            <div class="card-header">
               <i class="fas fa-chart-bar mr-1"></i>
               List  of Processes
            </div>
            <table class="table" id="dataTableProcesses">
               <thead class="thead-dark">
                  <tr>
                     <th scope="col">Process ID</th>
                     <th scope="col">Name</th>
                     <th scope="col">Description</th>
                     <th scope="col">Benefits</th>
                     <th scope="col">Status</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($processList as $process )
                  <tr>
                     <th scope="row">{{ $process->id }}</th>
                     <td> <a href ="{{ url('process/'.$process->id)  }}"> {{ $process->name }}</a></td>
                     <td>{{ $process->description }}</td>
                     <td>{{ $process->benefit_description }}</td>
                     <td>{{ $process->status }}</td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
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