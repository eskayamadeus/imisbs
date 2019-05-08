<!-- this page is to add CLASSROOM details in admin panel. @ admin/teaching_facilities/add -->
@extends('layouts.dashboard')

@section('title','Add Classroom')

@section('sidebar')
  <!-- call Admin's custom sidebar -->
  @include('admin.layout.sidebar')
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Classroom</h1>
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
      <a href="">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-lg font-weight-bold text-primary text-uppercase">Add Classroom</div>
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
        <a href="{{ route('admin.facilities.teaching_facilities.classrooms')}}" class="">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-lg font-weight-bold text-success text-uppercase">View Classrooms</div>
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
    @include('partials.success')
    @include('partials.warning')
    <h5 class="h5 mb-0 text-gray-800 text-uppercase">New Classroom Form</h5>
    <br>

    <!-- Content Row -->

    <div class="row">

        <!-- Find docs at https://github.com/LaravelCollective/docs/blob/5.4/html.md -->
        <div class="col-6 mb-4">
            {{-- 'action' => 'AdminController@createClassroom' , --}}
        {!! Form::open(['action' => 'AdminController@createClassroom', 'class' => 'form']) !!}
            <!--format for using the form generation -->
            <!-- Form::elementType('name', 'output', [any optional parameters]) !!} -->

            <!-- also note -->
            <!-- After creating a label, any form element you create with a name matching the label name will automatically receive an ID matching the label name as well. -->
            
            <div class="form-group">
                <!-- Name -->
                {!! Form::label('name', 'Classroom Name') !!}
                {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter classroom name e.g. Class 1 / Form 3']) !!}
            </div>

            <div class="form-group">
                <!-- Staff -->
                {!! Form::label('staff', 'Staff Name') !!}
                {!! Form::select('staff', $staffName, null, ['class' => 'form-control', 'placeholder' => 'Select teacher...']); !!}
            </div>

            <!--Submit -->
            {!! Form::submit('Add Record', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
        </div>
        
    </div>


</div>
<!-- /.container-fluid -->
@endsection
