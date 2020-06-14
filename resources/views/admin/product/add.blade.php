@extends('layouts.admin')

@section('title')
  <title>Thêm sản phẩm</title>
@endsection
 
@push('style')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('admins/product/add.css') }}">
@endpush

@section('content')
<div class="content-wrapper">
  @include('partials.content-header', ['name' => 'Product', 'key' => 'Add'])

  <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf 
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Tên sản phẩm</label>
              <input  type="text" 
                      class="form-control @error('name') is-invalid @enderror"
                      name="name"
                      value="{{ old('name') }}"
                      placeholder="Tên sản phẩm"
              >
              @error('name')
                <span class="errors">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label>Giá sản phẩm</label>
              <input  type="text" 
                      class="form-control @error('price') is-invalid @enderror"
                      name="price"
                      value="{{ old('price') }}"
                      placeholder="Nhập giá sản phẩm"
              >
              @error('price')
                <span class="errors">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label>Hình ảnh đại diện</label>
              <input  type="file" 
                      class="form-control-file"
                      name="feature_image_path" 
              >
            </div>
            <div class="form-group">
              <label>Hình ảnh chi tiết</label>
              <input  type="file" 
                      class="form-control-file"
                      name="image_path[]"
                      multiple
              > 
            </div>
            <div class="form-group"> 
              <label>Chọn danh mục</label>
              <select class="form-control select2_init @error('category_id') is-invalid @enderror" name="category_id">
                <option value="" hidden>Chọn danh mục</option>
                {!! $htmlOption !!}
              </select>
              @error('category_id')
                <span class="errors">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label>Nhập tag cho sản phẩm</label>
              <select name="tags[]" class="form-control tag_select_choose" multiple="multiple">
                
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Nhập nội dung</label>
              <textarea name="contents" class="form-control tinymce_editor_init @error('content') is-invalid @enderror" rows="8">{!! old('contents') !!}</textarea>
            </div>
            @error('content')
              <span class="errors">{{ $message }}</span>
            @enderror
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
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{ asset('admins/product/add.js') }}"></script>
@endpush