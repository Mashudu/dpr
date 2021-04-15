@extends('layouts.main')
@section('content')
<section id="features" class="features">
    <div class="container">

      <div class="section-title">
        <h2>Glossary</h2>
        <p>Most  Important terms</p>
      </div>

      <div class="row">
        <div class="col-lg-3">
          <ul class="nav nav-tabs flex-column">
            @foreach ($glossaries as $glossary)
            <li class="nav-item">
              <a class="nav-link 
              @if($loop->first) active show @endif" 
              data-bs-toggle="tab" href="#tab-{{ $glossary->id}}">{{ $glossary->name }}</a>
            </li>
            @endforeach
           
        
          </ul>
        </div>
        <div class="col-lg-9 mt-4 mt-lg-0">
          <div class="tab-content">
          @foreach ( $glossaries as $glossary )
          <div class="tab-pane
          @if($loop->first) active show @endif"  id="tab-{{ $glossary->id }}">
            <div class="row">
              <div class="col-lg-12 details order-2 order-lg-1">
                <h3>{{ $glossary->name }}</h3>
                <p class="font-italic">{!! $glossary->description !!}</p>
                
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