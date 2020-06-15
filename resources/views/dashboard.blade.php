@extends('layouts.admin')

@section('title')
  <title>Dashboard</title>
@endsection


@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('partials.content-header', ['name' => 'Dashboard'])
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          Welcome to admin!
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

