@extends('backend.main3')

@section('title', 'Sửa danh mục')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Sửa danh mục</h1>
            <hr>
            @if(Session::has('msg'))
                <div class="alert alert-{{Session::get('level')}}">
                    {{Session::get('msg')}}
                </div>
            @endif
            @include('backend.blocks.error')
            <form method="POST" action="{{ route('category.update', $category->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Tên danh mục:</label>
                    <input id="name" name="name" class="form-control" value="{{$category->name}}">
                </div>
                <div class="form-group">
                    <label for="categorySelect">Chọn danh mục cha:</label>
                    <select class="form-control" name="sltParent" value="{{$category->category_parent}}">
                        <option value="0" selected>Chọn danh mục</option>
                        <?php showCategories($allCate,0,"•",$category["category_parent"]) ?>
                    </select>
                </div>
                <input type="submit" value="Lưu" class="btn btn-success btn-lg btn-block">
                {{--<input type="hidden" name="_token" value="{{ Session::token() }}">--}}
            </form>
        </div>
    </div>

@stop()

