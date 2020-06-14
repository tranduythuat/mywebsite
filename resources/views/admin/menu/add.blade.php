@extends('layouts.admin')

@section('title')
  <title>Thêm menu</title>
@endsection


@section('content')
<div class="content-wrapper">
  @include('partials.content-header', ['name' => 'Menu', 'key' => 'Add'])

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <form action="{{ route('menus.store') }}" method="POST">
            @csrf 
            <div class="form-group">
              <label>Tên menu</label>
              <input  type="text" 
                      class="form-control"
                      name="name"
                      placeholder="Tên menu"
              >
            </div>
            <div class="form-group"> 
              <label>Chọn menu cha</label>
              <select class="custom-select" name="parent_id">
                <option value="0" hidden>Chọn danh mục cha</option>
                {!! $optionSelect !!}
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
