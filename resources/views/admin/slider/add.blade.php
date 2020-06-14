@extends('layouts.admin')

@section('title')
  <title>Thêm slider</title>
@endsection
 
@push('style')

@endpush

@section('content')
<div class="content-wrapper">
  @include('partials.content-header', ['name' => 'Slider', 'key' => 'Add'])

  <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
    @csrf 
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tên slider</label>
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
                    <label>Hình ảnh đại diện</label>
                    <input  type="file" 
                            class="form-control-file  @error('slider_image_path') is-invalid @enderror"
                            name="slider_image_path" 
                    >
                    @error('slider_image_path')
                        <span class="errors">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nhập mô tả</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror">{!! old('description') !!}</textarea>
                    @error('description')
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