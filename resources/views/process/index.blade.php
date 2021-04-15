@extends('layouts.main')
@section('content')
<section id="features" class="features">
    <div class="container">

      <div class="section-title">
        <h2>Details for: </h2>
        <p>{{ $process->name }}</p>
      </div>

   

    </div>
  </section><!-- End Features Section -->

  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-8 entries">

          <article class="entry">

          

            <h2 class="entry-title">
              <a href="#">Process Description</a>
            </h2>
 
            <div class="entry-content">

              <p style ="text-align: justify;">
                {!! $process->description !!}
              </p>
              
            </div>

          </article><!-- End blog entry -->

          <article class="entry">

            
            <h2 class="entry-title">
              <a href="#">The Business Problem </a>
            </h2>

           

            <div class="entry-content">
              <p>
                {!! $process->problem !!}     </p>
              
            </div>

          </article><!-- End blog entry -->

          <article class="entry">

          

            <h2 class="entry-title">
              <a href="blog-single.html">The Solution</a>
            </h2>

            

            <div class="entry-content">
              <p>
               {!! $process->solution !!}        </p>
              
            </div>

            <h2 class="entry-title">
              <a href="#">Process Diagram High Level</a>
            </h2>
            <br>
            <hr>
            <div class="entry-img">
              <img src="{{ asset('process-maps/'.$process->image_url) }}" alt="" class="img-fluid">
            <br>
            <br>
            </div>
          </article><!-- End blog entry -->

          

        </div><!-- End blog entries list -->

        <div class="col-lg-4">

          <div class="sidebar">

           

            <h3 class="sidebar-title">Business benefits Benefits</h3>
            <div class="sidebar-item categories">
              {!! $process->benefit_description !!}
            </div><!-- End sidebar categories-->

             

          </div><!-- End sidebar -->

        </div><!-- End blog sidebar -->

      </div>

    </div>
  </section><!-- End Blog Section -->
@endsection