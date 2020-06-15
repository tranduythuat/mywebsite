@extends('layouts.admin')

@section('title')
  <title>Thêm user</title>
@endsection
 
@push('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admins/product/add.css') }}">
@endpush

@section('content')
<div class="content-wrapper">
  @include('partials.content-header', ['name' => 'User', 'key' => 'Add'])

  <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
    @csrf 
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tên</label>
                    <input  type="text" 
                            class="form-control @error('name') is-invalid @enderror"
                            name="name"
                            value="{{ old('name') ?? null}}"
                            placeholder="Nhập tên"
                    >
                    @error('name')
                        <span class="errors">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input  type="email" 
                            class="form-control @error('email') is-invalid @enderror"
                            name="email"
                            value="{{ old('email') ?? null}}"
                            placeholder="Nhập Email"
                    >
                    @error('email')
                        <span class="errors">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input  type="password" 
                            class="form-control @error('password') is-invalid @enderror"
                            name="password"
                            placeholder="Nhập password"
                    >
                    @error('password')
                        <span class="errors">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Chọn vai trò</label>
                    <select name="role_id[]" class="form-control select2_init_role @error('role_id') is-invalid @enderror" multiple>
                        <option value=""></option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('role_id')
                        <span class="errors">{{ $message }}</span>
                    @enderror
                </div>

            </div>      
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $('.select2_init_role').select2({
            'placeholder': 'Chọn vai trò'
        });
    </script>
@endpush