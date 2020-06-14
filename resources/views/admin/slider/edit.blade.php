@extends('layouts.admin')

@section('title')
  <title>Sửa slider</title>
@endsection
 
@push('style')
  <link rel="stylesheet" href="{{ asset('admins/slider/style.css') }}">
@endpush

@section('content')
<div class="content-wrapper">
  @include('partials.content-header', ['name' => 'Slider', 'key' => 'Edit'])

  <form action="{{ route('sliders.update', ['id' => $slider->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf 
    @method('PUT')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tên slider</label>
                    <input  type="text" 
                            class="form-control @error('name') is-invalid @enderror"
                            name="name"
                            value="{{ $slider->name }}"
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
                    <div class="col-md-4">
                      <div class="row">
                        <img class="image-slider-edit" src="{{ URL::to('/') }}/storage/slider/{{ auth()->id() }}/{{ $slider->image_path }}" alt="">
                      </div>
                    </div>
                    @error('slider_image_path')
                        <span class="errors">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nhập mô tả</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror">{!! $slider->name !!}</textarea>
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