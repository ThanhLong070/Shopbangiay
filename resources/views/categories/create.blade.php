@extends('backend.main3')

@section('title', 'Thêm mới danh mục')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Thêm mới danh mục</h1>
            <hr>
            @if(Session::has('msg'))
                <div class="alert alert-{{Session::get('level')}}">
                    {{Session::get('msg')}}
                </div>
            @endif
            @include('backend.blocks.error')
            <form method="POST" enctype="multipart/form-data" action="{{ route('category.store') , url('img') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Tên danh mục:</label>
                    <input id="name" name="name" class="form-control" value="{{old('name')}}">
                </div>
                  @if($errors->has('name'))
                    {{ $errors->first('name') }}
                @endif
                <div class="form-group">
                    <label for="categorySelect">Chọn danh mục cha:</label>
                <select class="form-control" name="sltParent">
                    <option value="0" selected>Chọn danh mục</option>
                    <?php showCategories($allCate,0,"•",old('sltParent'))?>
                </select>
                </div>
                  @if($errors->has('sltParent'))
                    {{ $errors->first('sltParent') }}
                @endif
                <input type="submit" value="Lưu" class="btn btn-success btn-lg btn-block">
            </form>
        </div>
    </div>

@stop

