@extends('layouts.dashboard')

{{-- We configure three options:
      1. title
      2. sidebar
      3. (main) content
  --}}

@section('title', 'Parent Dashboard')

@section('sidebar')
    {{-- call Parent's custom sidebar --}}
    @include('pupilparent.layout.sidebar')
@endsection


@section('content')
<div class="container">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i> Generate Reports</a> --}}
    </div>
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome, {{ Auth::user()->name }}</div>
            </div>
        </div>


        <hr>
        
    <!-- restore the table here -->
    </div>
    <h5 class="h5 mb-0 text-gray-800 text-uppercase">Ward's Summary</h5>
    <br>
    {{-- @foreach ($pupilparents->pupil as $ward)
        
    <p>Ward: {{$ward->name}}</p>
    @endforeach --}}

    <p>ID: {{ $pupilparents->pupil->id}}</p>
    <p>Name: {{ $pupilparents->pupil->name}}</p>
    <p>Email: {{ $pupilparents->pupil->email}}</p>
    <p>Class: {{ $pupilparents->pupil->classroom->name}}</p>

</div>
@endsection
