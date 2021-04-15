@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Create Business Unit</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.business-units.store') }}">
                            @include('admin.business-units.partials.form',['create'=>true])
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>


@endsection
