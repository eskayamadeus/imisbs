<!-- this page is to display STAFF details in admin panel. @ admin/users/staff/view -->
@extends('layouts.dashboard')

@section('title','Staff')

@section('sidebar')
  <!-- call Admin's custom sidebar -->
  @include('admin.layout.sidebar')
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Staff</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
      <i class="fas fa-download fa-sm text-white-50"></i> Generate Reports</a>
  </div>
    <hr>
    <h5 class="h5 mb-0 text-gray-800 text-uppercase">Options</h5>
    <br>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    <a href="{{ route('admin.user.staff.add') }}">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-lg font-weight-bold text-primary text-uppercase">Add Staff</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-plus fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ route('admin.user.staff')}}" class="">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-lg font-weight-bold text-success text-uppercase">View Staff</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-eye fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            {{-- <div class="col mr-2">
              <div class="text-lg font-weight-bold text-info text-uppercase">Academic Performance</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div> --}}
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            {{-- <div class="col mr-2">
              <div class="text-lg font-weight-bold text-warning text-uppercase">Modify School Settings</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>

  <hr>
    <h5 class="h5 mb-0 text-gray-800 text-uppercase">Staff Summary</h5>
    <br>

  <!-- Content Row -->

  <div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Staff Overview</h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
              <div class="dropdown-header">Dropdown Header:</div>
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
                    @if(count($staff) > 0)
                        <h5>Here you can view all staff.</h5>
                          <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Subject</th>
                                <th>Class</th>
                                <th>Special Roles</th>
                                <th>Edit</th>
                                <th>Delete</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($staff as $staff)
                              <tr>
                                  <td>{{$staff->id}}</td>
                                  <td>{{$staff->name}}</td>
                                  <td>{{$staff->email}}</td>
                                  <td>{{$staff->subject}}</td>
                                  <td>{{$staff->class}}</td>
                                  <td>{{$staff->role}}</td>
                                  <td><a href="#" class="btn btn-primary"><i class="fas fa-pen"></i></a></td>
                                  {{-- <td><a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a></td> --}}
                                  <td>
                                    {!!Form::open(['action'=>['AdminController@destroyStaff', $staff->id], 'method'=>'POST'])!!}
                                        <!--Laravel can let us use a Delete request type to delete forms. We need to spoof it as shown below, rather than just using the main form method-->
                                        {{Form::hidden('_method', 'DELETE')}}
                                        <!--Submit-->
                                        {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                  </td>
                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                    @else
                        <h5>You have no posts. <a href="/posts/create">Create one</a></h5>
                    @endif
          {{-- <div class="chart-area">
            <canvas id="myAreaChart"></canvas>
          </div> --}}
         
        </div>
      </div>
    </div>

    
  </div>


</div>
<!-- /.container-fluid -->
@endsection
