@extends('layouts.admin')

@section('title')
  <title>Danh sách vai trò</title>
@endsection

@push('style')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
<link rel="stylesheet" href="{{ asset('admins/slider/style.css') }}">
@endpush

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('partials.content-header', ['name' => 'Role', 'key' => 'List'])
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif
 

      <div class="row">
        <div class="col-md-12">
          <a href="{{ route('roles.create') }}" class="btn btn-primary float-right m-2"><i class='far fa-plus-square'></i> Thêm mới</a>
        </div>
        <div class="col-md-12">
          <table class="table" id="tbSlider">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên vai trò</th>
                <th scope="col">Mô tả vai trò</th>
                <th scope="col">Tùy chọn</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td scope="row">{{ $role->id }}</td>
                        <td scope="row">{{ $role->name }}</td>
                        <td scope="row">{{ $role->display_name }}</td>
                        <td>
                            {{-- <a href="{{ route('sliders.edit', ['id' => $sliderItem->id]) }}" class="btn btn-default">Edit</a>
                            <a href="javascript:;" class="btn btn-danger delete-slider-{{ $sliderItem->id }}" onclick="deleteSlider({{ $sliderItem->id }})">Delete</a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-md-12">
          {{ $roles->links() }}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<script src="{{ asset('admins/slider/deleteSlider.js') }}"></script>
@endpush