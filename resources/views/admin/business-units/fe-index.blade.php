@extends('layouts.main')
@section('content')

    <style>
        .col-xs-equal,
        .col-sm-equal,
        .col-md-equal,
        .col-lg-equal {
            position: relative;
            min-height: 1px;
            padding-right: 10px;
            padding-left: 10px;
        }

        # Next,
        we are adding here some media queries with various breakpoints .col-xs-equal {
            width: 20%;
            float: left;
        }

        @media (min-width: 768px) {
            .col-sm-equal {
                width: 20%;
                float: left;
            }
        }

        @media (min-width: 992px) {
            .col-md-equal {
                width: 20%;
                float: left;
            }
        }

        @media (min-width: 1200px) {
            .col-lg-equal {
                width: 20%;
                float: left;
            }
        }

    </style>
    <div class="container">

        <h1 class="mt-4">Welcome to {{ $bu->name }} </h1>
        <div>
            {!! $bu->description !!}
        </div>
        <div class="row">
            <div class="col-lg-equal col-md-equal col-sm-equal 
                                                    col-xs-equal">
                <div class="card border-success">
                    <div class="card-header">Total Processes</div>
                    <div class="card-body text-success">
                        <h5 class="card-title text-center">31</h5>
                        <p class="card-text text-center">100 % </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-equal col-md-equal col-sm-equal 
                                                    col-xs-equal">
                <div class="card border-success">
                    <div class="card-header">Total Complete</div>
                    <div class="card-body text-success">
                        <h5 class="card-title text-center">16</h5>
                        <p class="card-text text-center">52 % </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-equal col-md-equal col-sm-equal 
                                                        col-xs-equal">
                <div class="card border-danger">
                    <div class="card-header">Total In Progress</div>
                    <div class="card-body text-danger">
                        <h5 class="card-title text-center">4</h5>
                        <p class="card-text text-center">13 % </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-equal col-md-equal col-sm-equal 
                                                            col-xs-equal">
                <div class="card border-success">
                    <div class="card-header">To-DO</div>
                    <div class="card-body text-success">
                        <h5 class="card-title text-center">8</h5>
                        <p class="card-text text-center">9 % </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-equal col-md-equal col-sm-equal 
                                                            col-xs-equal">
                <div class="card border-danger">
                    <div class="card-header">Backlog</div>
                    <div class="card-body text-danger">
                        <h5 class="card-title text-center">8</h5>
                        <p class="card-text text-center">26 % </p>
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
                    <div class="card-body"><canvas id="myBarChart2" width="100%" height="50"></canvas></div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body"> <i class="fas fa-chart-area"></i> Revenue</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">R 61 900 000</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body"><i class="fas fa-cogs"></i> Efficiencies </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">42 492 Hours Saved</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area mr-1"></i>
                              Next  Three Priorities
                            </div>
                            <table class="table">
                                <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">Jira Number</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Benefits</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                  </tr>
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
                    <table class="table" id="dataTable">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Jira Number</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Benefits</th>
                            <th scope="col">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>In Dev</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>In Hypercare</td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>Complete</td>
                          </tr>
                        </tbody>
                      </table>
                      
                       
               
                 
                </div>
            </div>
            
        </div>


    </div>
  
     
@endsection
