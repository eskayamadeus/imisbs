@extends('layouts.dashboard')

{{-- We configure three options:
      1. title
      2. sidebar
      3. (main) content
  --}}

@section('title','School Settings')

@section('sidebar')
  <!-- call Admin's custom sidebar -->
  @include('admin.layout.sidebar')
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
      <i class="fas fa-download fa-sm text-white-50"></i> Generate Reports</a> --}}
  </div>

  <hr>
    <h5 class="h5 mb-0 text-gray-800 text-uppercase">School Settings</h5>
    <br>

    {{-- name
    location
    region
    academic year --}}
    <!-- Find docs at https://github.com/LaravelCollective/docs/blob/5.4/html.md -->
        <div class="col-6 mb-4">
            {{-- 'action' => 'AdminController@createStaff' , --}}
            {{--  --}}
            @include('partials.success')
            @include('partials.warning')
        {!! Form::open(['action' => ['AdminController@updateSchool', $school->id], 'method' => 'POST', 'class' => 'form']) !!}
             @method('PATCH')
            <!--format for using the form generation -->
            <!-- Form::elementType('name', 'output') !!} -->

            <!-- also note -->
            <!-- After creating a label, any form element you create with a name matching the label name will automatically receive an ID matching the label name as well. -->
            
            <div class="form-group">
                <!-- School Name -->
                {!! Form::label('name', 'School Name') !!}
                {!! Form::text('name', $school->name, ['class' => 'form-control', 'placeholder' => 'Enter school name' ]) !!}
            </div>

            <div class="form-group">
                <!-- School Location -->
                {!! Form::label('location', 'School Location') !!}
                {!! Form::text('location', $school->location, ['class' => 'form-control', 'placeholder' => 'School Location (city/town)']) !!}
            </div>

            <div class="form-group">
                <!-- Region -->
                {!! Form::label('region', 'region') !!}
                {!! Form::select('region', [
                    'Upper West' => 'Upper West', 
                    'Upper East' => 'Upper East', 
                    'Northern' => 'Northern', 
                    'North East' => 'North East', 
                    'Savannah' => 'Savannah', 
                    'Brong Ahafo' => 'Brong Ahafo', 
                    'Bono East' => 'Bono East', 
                    'Oti' => 'Oti', 
                    'Ahafo' => 'Ahafo', 
                    'Ashanti' => 'Ashanti', 
                    'Eastern' => 'Eastern', 
                    'Volta' => 'Volta', 
                    'Western' => 'Western', 
                    'Western North' => 'Western North', 
                    'Central' => 'Central', 
                    'Greater Accra' => 'Greater Accra',
                    ], $school->region, ['class' => 'form-control', 'placeholder' => 'Select a region']); !!}
            </div>

            <div class="form-group">
                <!-- Academic Year -->
                {!! Form::label('year', 'Academic Year') !!}
                {!! Form::text('year', $school->academic_year, ['class' => 'form-control', 'placeholder' => 'Enter Academic Year. eg. 2019']) !!}
            </div>

            <!--Submit -->
            {!! Form::submit('Update School Info', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
        </div>


</div>
<!-- /.container-fluid -->
@endsection
