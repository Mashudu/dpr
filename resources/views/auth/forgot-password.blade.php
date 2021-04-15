@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Reset Password</h3></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                         
                        <div class="form-group">
                            <label class="small mb-1" for="email">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" name="email" id="email" type="email" aria-describedby="emailHelp" placeholder="Enter email address" value="{{ old('email') }}"/>
                            @error('email')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block" type="submit" >Request New password</button></div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection