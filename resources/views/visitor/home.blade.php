@extends('layouts.dashboard')

{{-- We configure three options:
      1. title
      2. sidebar
      3. (main) content
  --}}

@section('title', 'Visitor Dashboard')

@section('sidebar')
    <!-- call Pupil's custom sidebar -->
    @include('visitor.layout.sidebar')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in as Visitor!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
