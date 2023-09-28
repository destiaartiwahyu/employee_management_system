@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
        <div class="flex items-center justify-center">
            <div class="flex flex-col justify-around">
                <div class="space-y-6">
                    <h1 class="text-5xl font-extrabold tracking-wider text-center text-gray-600 mb-5">
                      Employee Management System
                    </h1>
                    <div class="row">
                        <div class="col-lg-3 col-6">                            
                            <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $total_user }}</h3>
                                <p>Users</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="/user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>                            
                        <div class="col-lg-3 col-6">                        
                            <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $total_division }}</h3>
                                <p>Divison</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="/division" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>                            
                        <div class="col-lg-3 col-6">                      
                            <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $total_position }}</h3>
                                <p>Position</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="/position" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>                            
                        <div class="col-lg-3 col-6">                  
                            <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $total_user_position }}</h3>
                                <p>User Position</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="/position-user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>                       
                    </div>

                    <div class="row mt-3 ml-1">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header border-0">
                                    <h3 class="card-title">Last 5 User</h3>
                                    <div class="card-tools">
                                    <a href="/user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped table-valign-middle">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>No Hp</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($user_limit as $list)
                                            <tr>
                                                <td>{{ $list->name }}</td>
                                                <td>{{ $list->phone_number }}</td>
                                                <td>{{ $list->email }}</td>
                                                <td>{{ $list->role }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header border-0">
                                    <h3 class="card-title">Last 5 Division</h3>
                                    <div class="card-tools">
                                    <a href="/division" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped table-valign-middle">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Deskripsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($division_limit as $list)
                                            <tr>
                                                <td>{{ $list->name }}</td>
                                                <td>{{ $list->description }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header border-0">
                                    <h3 class="card-title">Last 5 Position</h3>
                                    <div class="card-tools">
                                    <a href="/position" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped table-valign-middle">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Division</th>
                                                <th>Level</th>
                                                @if(Auth::user()->role == "admin")
                                                  <th>Salary</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($position_limit as $list)
                                            <tr>
                                                <td>{{ $list->name }}</td>
                                                <td>{{ $list->divisionBelongsTo->name }}</td>
                                                <td>{{ $list->level }}</td>
                                                @if(Auth::user()->role == "admin")
                                                  <td>{{ number_format($list->salary,2,",",".")}}</td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header border-0">
                                    <h3 class="card-title">Last 5 User Position</h3>
                                    <div class="card-tools">
                                    <a href="/position-user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped table-valign-middle">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Division</th>
                                                <th>Level</th>
                                                @if(Auth::user()->role == "admin")
                                                <th>Salary</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($user_position_limit as $list)
                                            <tr>
                                                <td>{{ $list->userBelongsTo->name }}</td>
                                                <td>{{ $list->positionBelongsTo->divisionBelongsTo->name }}</td>
                                                <td>{{ $list->positionBelongsTo->level }}</td>
                                                @if(Auth::user()->role == "admin")
                                                <td>{{ number_format($list->positionBelongsTo->salary,2,",",".")}}</td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
