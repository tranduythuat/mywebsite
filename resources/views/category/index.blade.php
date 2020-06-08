@extends('layouts.admin')

@section('title')
  <title>Danh sách danh mục</title>
@endsection
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('partials.content-header', ['name' => 'Category', 'key' => 'List'])
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      @if (session('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
      @endif
      <div class="row">
        <div class="col-md-12">
          <a href="{{ route('categories.create') }}" class="btn btn-primary float-right m-2">Thêm mới</a>
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $category)
                <tr>
                  <th scope="row">{{ $category->id }}</th>
                  <td>{{ $category->name  }}</td>
                  <td>
                      <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-default">Edit</a>
                      <a href="javascript:;" class="btn btn-danger" onclick="category.delete({{ $category->id }})">Delete</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-md-12">
          {{ $categories->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script> --}}
<script>
    var category = {} || category;
    $.ajaxSetup({
      $(document).ready(function () {
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content');
          }
        });
      });
      
    category.delete = function(id)
    {
      // bootbox.alert("This is the default alert!");
      // bootbox.confirm({
      //   message: "This is a confirm with custom button text and color! Do you like it?",
      //   buttons: {
      //       confirm: {
      //           label: 'Yes',
      //           className: 'btn-success'
      //       },
      //       cancel: {
      //           label: 'No',
      //           className: 'btn-danger'
      //       }
      //   },
      //   callback: function (result) {
      //     if(result){
            $.ajax({
              type: "DELETE",
              url: "/categories/delete/" + id,
              dataType: "json",
              success: function (data) {
                console.log(data);
              }
            });
      //     }
      //   }
      // });
    }
</script>
@endsection
