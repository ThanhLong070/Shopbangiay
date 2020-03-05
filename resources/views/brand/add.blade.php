@extends('backend.main3')

@section('title','Thêm thương hiệu ')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Thêm mới thương hiệu</h1>
            <hr>
            @if(Session::has('msg'))
                <div class="alert alert-{{Session::get('level')}}">
                    {{Session::get('msg')}}
                </div>
            @endif
            @include('backend.blocks.error')
            <form method="POST" enctype="multipart/form-data" action="{{ route('brand.store') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Tên thương hiệu:</label>
                    <input id="name" name="name" class="form-control" value="{{old('name')}}" placeholder="eg: Nike">
                </div>
                @if($errors->has('name'))
                    {{ $errors->first('name') }}
                @endif
                <div class="row">
                    <div class="col-md-4">
                        <label for="price">Logo thương hiệu:</label>
                        <fieldset class="form-group">

                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn btn-info ">
                                        <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input id="thumbnail" class="form-control" type="text" name="image">
                            </div>
                            <img id="holder" style="margin-top:15px;max-height:100px;">

                        </fieldset>
                </div>
                <input type="submit" value="Lưu" class="btn btn-success btn-lg btn-block">
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
