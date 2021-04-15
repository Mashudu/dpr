@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Verify Email</h3></div>
                <div class="card-body">
                   <p>You need to be  verified to access the  function </p>

                   <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">Resend Verification Email</button>

                   </form>
                </div>
               
            </div>
        </div>
    </div>
</div>

@endsection