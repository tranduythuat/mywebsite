
@extends('layouts.admin')

@section('title')
  <title>Sửa setting</title>
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('admins/setting/style.css') }}">
@endpush

@section('content')
<div class="content-wrapper">
  @include('partials.content-header', ['name' => 'Setting', 'key' => 'Edit'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('settings.update', ['id' => $setting->id]) }}" method="POST">
                        @method('PUT')
                        @csrf 
                        <div class="form-group">
                            <label>Config key</label>
                            <input  type="text" 
                                    class="form-control  @error('config_key') is-invalid @enderror"
                                    name="config_key"
                                    value="{{ $setting->config_key }}"
                                    placeholder="Nhập config key"
                            >
                            @error('config_key')
                                <span class="errors">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Config value</label>
                            @if (request()->type === "Text")
                                <input  type="text" 
                                        class="form-control @error('config_value') is-invalid @enderror"
                                        name="config_value"
                                        value="{{ $setting->config_key }}"
                                        placeholder="Nhập config value"
                                >
                            @elseif(request()->type === "Textarea")
                                <textarea  class="form-control @error('config_value') is-invalid @enderror" name="config_value" rows="5">{{ $setting->config_key }}</textarea>
                            @endif

                            @error('config_key')
                                <span class="errors">{{ $message }}</span>
                            @enderror
                        </div> 
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
