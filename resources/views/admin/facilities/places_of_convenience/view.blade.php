<!-- this page is to display PUPIL details in admin panel. @ admin/users/staff/view -->
@extends('layouts.dashboard')

@section('title','Teaching Facilities')

@section('sidebar')
  <!-- call Admin's custom sidebar -->
  @include('admin.layout.sidebar')
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Place of Convenience</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
      <i class="fas fa-download fa-sm text-white-50"></i> Generate Reports</a>
  </div>
  <hr>
  <h3>Categories</h3>
    <ul>
      <li><a href="{{ route('admin.facilities.washrooms.view') }}">Washroom</a></li>
      <li><a href="{{ route('admin.facilities.canteens.view') }}">Canteen</a></li>
      <li><a href="{{ route('admin.facilities.dispensaries.view') }}">Dispensary</a></li>
      
    </ul>

  <!-- Content Row -->

  


</div>
<!-- /.container-fluid -->
@endsection
