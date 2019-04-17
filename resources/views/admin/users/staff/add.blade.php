<!-- this page is to add STAFF details in admin panel. @ admin/users/staff/add -->
@extends('layouts.dashboard')

@section('title','Add Staff')

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
      <a href="#" class="disabled">
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
    @include('partials.success')
    @include('partials.warning')
    <h5 class="h5 mb-0 text-gray-800 text-uppercase">New Staff Form</h5>
    <br>

    <!-- Content Row -->

    <div class="row">

        <!-- Find docs at https://github.com/LaravelCollective/docs/blob/5.4/html.md -->
        <div class="col-6 mb-4">
            {{-- 'action' => 'AdminController@createStaff' , --}}
        {!! Form::open(['action' => 'AdminController@createStaff', 'class' => 'form']) !!}
            <!--format for using the form generation -->
            <!-- Form::elementType('name', 'output') !!} -->

            <!-- also note -->
            <!-- After creating a label, any form element you create with a name matching the label name will automatically receive an ID matching the label name as well. -->
            
            <div class="form-group">
                <!-- Name -->
                {!! Form::label('name', 'Staff Full Name') !!}
                {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter staff full name']) !!}
            </div>

            <div class="form-group">
                <!-- Email -->
                {!! Form::label('email', 'E-Mail Address') !!}
                {!! Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Enter email']) !!}
            </div>

            <div class="form-group">
                <!-- Password will be automatically set as a readable property with value 'secret'--> 
                {!! Form::label('password', 'Password') !!}
                {!! Form::text('password', 'secret', ['class' => 'form-control', 'placeholder' => 'Enter email', 'readonly']) !!}
            </div>

            <div class="form-group">
                <!-- Subject -->
                {!! Form::label('subject', 'subject') !!}
                {!! Form::text('subject', '', ['class' => 'form-control', 'placeholder' => 'Subject']) !!}
            </div>

            <div class="form-group">
                <!-- Class -->
                {!! Form::label('class', 'class') !!}
                {!! Form::text('class', '', ['class' => 'form-control', 'placeholder' => 'Assigned class']) !!}
            </div>

            <div class="form-group">
                <!-- Special Role -->
                {!! Form::label('role', 'Special Role') !!}
                {!! Form::text('role', '', ['class' => 'form-control', 'placeholder' => 'Enter role']) !!}
            </div>

            <!--Submit -->
            {!! Form::submit('Add Record', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
        </div>
        
    </div>


</div>
<!-- /.container-fluid -->
@endsection
