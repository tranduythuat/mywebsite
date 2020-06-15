@extends('layouts.admin')

@section('title')
  <title>Thêm vai trò</title>
@endsection
 
@push('style')

@endpush

@section('content')
<div class="content-wrapper">
  @include('partials.content-header', ['name' => 'Role', 'key' => 'Add'])

  <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
    @csrf 
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tên vai trò</label>  
                    <input  type="text" 
                            class="form-control @error('name') is-invalid @enderror"
                            name="name"
                            value="{{ old('name' ) }}"
                            placeholder="Tên slider"
                    >
                    @error('name')
                        <span class="errors">{{ $message }}</span>
                    @enderror
                </div>        
                <div class="form-group">
                    <label>Mô tả vai trò</label>
                    <textarea name="display_name" class="form-control @error('display_name') is-invalid @enderror">{!! old('display_name') !!}</textarea>
                    @error('display_name')
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

@endpush