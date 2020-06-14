@extends('layouts.admin')

@section('title')
  <title>Sửa sản phẩm</title>
@endsection
 
@push('style')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('admins/product/add.css') }}">
@endpush

@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Product', 'key' => 'Edit'])

    <form action="{{ route('products.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf 
        @method('PUT')
        <div class="content">
            <div class="container-fluid">
                <div class="row"> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input  type="text" 
                                    class="form-control"
                                    name="name"
                                    value="{{ $product->name }}"
                                    placeholder="Tên sản phẩm"
                            >
                        </div>
                        <div class="form-group">
                            <label>Giá sản phẩm</label>
                            <input  type="text" 
                                    class="form-control"
                                    name="price"
                                    value="{{ $product->price }}"
                                    placeholder="Nhập giá sản phẩm"
                            >
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh đại diện</label>
                            <input  type="file" 
                                    class="form-control-file"
                                    name="feature_image_path" 
                            >
                            <div class="col-md-12">
                                <div class="row">
                                    <img class="product_image_edit" src="{{ $product->feature_image_path }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh chi tiết</label>
                            <input  type="file" 
                                    class="form-control-file"
                                    name="image_path[]"
                                    multiple
                            > 
                            <div class="col-md-12 feature_image_container">
                                <div class="row">
                                    @foreach ($product->productImages as $productImageItem)
                                        <div class="col-md-4">
                                            <img class="product_image_edit" src="{{ $productImageItem->image_path }}" alt="">
                                        </div> 
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group"> 
                            <label>Chọn danh mục</label>
                            <select class="form-control select2_init" name="category_id">
                                <option value="0" hidden>Chọn danh mục</option>
                                {!! $htmlOption !!}
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nhập tag cho sản phẩm</label>
                            <select name="tags[]" class="form-control tag_select_choose" multiple="multiple">
                                @foreach ($product->tags as $productTagItem)
                                    <option value="{{ $productTagItem->name }}" selected>
                                        {{ $productTagItem->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nhập nội dung</label>
                            <textarea name="contents" class="form-control tinymce_editor_init" rows="8">
                                {{ $product->content }}
                            </textarea>
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
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{ asset('admins/product/add.js') }}"></script>
@endpush