@extends('layouts.admin')

@section('title')
  <title>Danh sách sản phẩm</title>
@endsection

@push('style')
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
  <link rel="stylesheet" href="{{ asset('admins/product/index.css') }}">
@endpush

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('partials.content-header', ['name' => 'Product', 'key' => 'List'])
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
            <a href="{{ route('products.create') }}" class="btn btn-primary float-right m-2"><i class='far fa-plus-square'></i> Thêm mới</a>
        </div>
        <div class="col-md-12">
          <table class="table" id="tbProduct">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên</th>
                <th scope="col">Giá</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Tùy chọn</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product_item)
                <tr>
                  <th scope="row">{{ $product_item->id }}</th>
                  <td>{{ $product_item->name }}</td>
                  <td>{{ number_format($product_item->price) . ' VNĐ' }}</td>
                  <td>
                    <img class="image_product" src="{{ $product_item->feature_image_path }}" alt="">
                  </td>
                  <td>{{ optional($product_item->category)->name }} </td>
                  <td>
                      <a href="{{ route('products.edit', ['id' => $product_item->id]) }}" class="btn btn-warning">Edit</a>
                      <a href="javascript:;" class="btn btn-danger delete-product-{{ $product_item->id }}" onclick="deleteProduct({{ $product_item->id }})">Delete</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-md-12">
          {{ $products->links() }}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<script src="{{ asset('admins/product/deleteProduct.js') }}"></script>
@endpush