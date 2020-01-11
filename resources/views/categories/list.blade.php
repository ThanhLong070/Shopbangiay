@extends('backend.main3')

@section('title', 'List Category')

@section('content')
    <a href="{{route('category.create')}}" class="btn btn-primary">Thêm danh mục</a>
    <br>
    <br>
    @if(Session::has('msg'))
        <div class="alert alert-{{Session::get('level')}}">
            {{Session::get('msg')}}
        </div>
    @endif
    @if($categories)
        <table class="table">
            <thead>
            <tr>
                <td>ID</td>
                <td>Tên danh mục</td>
                <td>Danh mục cha</td>
                <td>Hành động</td>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <?php
                        $parent = DB::table('categories')->where('id',$category->category_parent)->first();
                        if($parent) {
                            echo $parent->name;
                        } else
                            echo "null";
                        ?>
                    </td>
                    <td><a href="{{route('category.edit', $category->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a> <br>
                        <form action="{{route('category.destroy', $category->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Bạn có chắc không?')" class="btn btn-danger" style="display: block;float: right;margin-right: 16px; margin-top: -37px;"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@stop