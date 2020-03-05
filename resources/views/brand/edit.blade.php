@extends('backend.main3')
@section('title','Sửa thương hiệu ')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Sửa thương hiệu</h1>
            <hr>
            @if(Session::has('msg'))
                <div class="alert alert-{{Session::get('level')}}">
                    {{Session::get('msg')}}
                </div>
            @endif
            @include('backend.blocks.error')
            <form method="POST" action="{{ route('brand.update', $brand->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Tên thương hiệu:</label>
                    <input id="name" name="name" placeholder="eg: Nike" class="form-control" value="{!! old('name',isset($brand)? $brand->name:null) !!}" required>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="price">Logo thương hiệu:</label>
                        <fieldset class="form-group">

                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn btn-info">
                                        <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input id="thumbnail" class="form-control" type="text" name="image"
                                       value="{!! old('image',isset($brand)? $brand->logo:null) !!}">
                            </div>
                            <img id="holder" style="margin-top:15px;max-height:100px;">
                            @if(isset($brand->logo))
                                <img src="{{$brand->logo}}" alt="{{$brand->name}}" style="max-height: 120px; margin-top: 30px;">
                            @endif

                        </fieldset>
                    </div>
                    <input type="submit" value="Cập nhật" class="btn btn-success btn-lg btn-block">
                </div>
            </form>
        </div>

    </div>

@stop
@section('script')

    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>

        $('#lfm').filemanager('file');
        $('#lfm').filemanager('image');
    </script>
@stop
