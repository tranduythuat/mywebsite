@extends('layouts.admin')

@section('title')
  <title>Danh sách setting</title>
@endsection

@push('style')
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
@endpush

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('partials.content-header', ['name' => 'Setting', 'key' => 'List'])
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
          <div class="dropdown show">
            <a class="btn btn-secondary dropdown-toggle" style="float: right" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Add
            </a>
          
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="{{ route('settings.create') . '?type=Text' }}">Text</a>
              <a class="dropdown-item" href="{{ route('settings.create') . '?type=Textarea' }}">Textarea</a>
            </div>
          </div>
        </div>
        <br>
        <br>
        <div class="col-md-12">
          <table class="table" id="tbSetting">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Config key</th>
                <th scope="col">Config value</th>
                <th scope="col">Type</th>
                <th scope="col">Tùy chọn</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($settings as $setting)
                <tr>
                    <th scope="row">{{ $setting->id }}</th>
                    <td>{{ $setting->config_key }}</td>
                    <td>{{ $setting->config_value }}</td>
                    <td>{{ $setting->type }}</td>
                    <td>
                        <a href="{{ route('settings.edit', ['id' => $setting->id]) . '?type=' . $setting->type }}" class="btn btn-warning">Edit</a>
                        <a href="javascript:;" class="btn btn-danger delete-setting-{{ $setting->id }}" onclick="deleteSetting({{ $setting->id }})">Delete</a>
                      </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-md-12">
          {{ $settings->links() }}
        </div>
      </div>
    </div>
  </div>
</div>



@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<script src="{{ asset('admins/setting/delete.js') }}"></script>
@endpush