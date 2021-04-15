@extends('layouts.main')
@section('content')
<section id="features" class="features">
    <div class="container">

      <div class="section-title">
        <h2>Details for: </h2>
        <p>{{ $process->name }}</p>
      </div>

      <div class="row">
        <div class="col-lg-3">
          <ul class="nav nav-tabs flex-column">
            @foreach ($singleProcessList as $processValue)
            <li class="nav-item">
              <a class="nav-link 
              @if($loop->first) active show @endif" 
              data-bs-toggle="tab" href="#tab-{{ $processValue->order}}">{{ $processValue->col }}</a>
            </li>
            @endforeach
           
        
          </ul>
        </div>
        <div class="col-lg-9 mt-4 mt-lg-0">
          <div class="tab-content">
          @foreach ( $singleProcessList as $processValue )
          <div class="tab-pane
          @if($loop->first) active show @endif"  id="tab-{{ $processValue->order }}">
            <div class="row">
              <div class="col-lg-12 details order-2 order-lg-1">
                <h3>{{ $processValue->col }}</h3>
                <p class="font-italic">{{ $processValue->value }}</p>
                
              </div>
              
            </div>
          </div>
          @endforeach
           
             
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Features Section -->

@endsection