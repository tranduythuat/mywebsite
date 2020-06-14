@extends('layouts.admin')

@section('title')
  <title>Edit Menu</title>
@endsection


@section('content')
<div class="content-wrapper">
  @include('partials.content-header', ['name' => 'Menu', 'key' => 'Edit'])

  <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            <form action="{{ route('menus.update', ['id' => $menuById->id]) }}" method="post">
                @csrf 
                @method('PUT')
                <div class="form-group">
                    <label>Tên danh mục</label>
                    <input  type="text" 
                            class="form-control"
                            name="name"
                            value="{{ $menuById->name }}"
                            placeholder="Tên danh mục"
                    >
                </div>
                <div class="form-group"> 
                    <label>Chọn danh mục cha</label>
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
