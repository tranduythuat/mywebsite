@extends('layouts.admin')

@section('title')
  <title>Danh sách menu</title>
@endsection

@push('style')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
@endpush

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('partials.content-header', ['name' => 'Menu', 'key' => 'List'])
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
          {{-- <a href="{{ route('categories.create') }}" class="btn btn-primary float-right m-2">Thêm mới</a> --}}
        </div>
        <div class="col-md-12">
          <table class="table" id="tbCategories">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              {{-- @foreach ($categories as $category)
                <tr>
                  <th scope="row">{{ $category->id }}</th>
                  <td>{{ $category->name  }}</td>
                  <td>
                      <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-default">Edit</a>
                      <a href="javascript:;" class="btn btn-danger" onclick="category.delete({{ $category->id }})">Delete</a>
                  </td>
                </tr>
              @endforeach --}}
            </tbody>
          </table>
        </div>
        <div class="col-md-12">
          {{-- {{ $categories->links() }} --}}
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="" method="POST" id="formDele">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script>
  var category = {} || category;
  
  category.delete = function(id) {  
    $("#formDele").attr(`action`, `/categories/delete/${id}`);
    $("#exampleModal").modal('show');
  }
</script>
@endpush