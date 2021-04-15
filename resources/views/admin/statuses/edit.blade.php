@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Edit Status</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.statuses.update',$status->id) }}">
                            @method('PATCH')
                          @include('admin.statuses.partials.form',['create'=>false])
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>


@endsection
