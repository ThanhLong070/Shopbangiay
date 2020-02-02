@extends('backend.main3')

@section('title', 'List Category')

@section('content')
<button type="button" class="btn btn-info float-left"><a href="{{route('category.create')}}" style="color: white"><i class="fas fa-plus"></i> Thêm danh mục</a></button>
<br>
<br>
@if(Session::has('msg'))
<div class="alert alert-{{Session::get('level')}}">
    {{Session::get('msg')}}
</div>
@endif
<div class="card">
  <div class="card-header ui-sortable-handle" style="cursor: move;">
    <h3 class="card-title">
      <i class="ion ion-clipboard mr-1"></i>
      Danh sách danh mục
  </h3>

 {{--  <div class="card-tools">
      <ul class="pagination pagination-sm">
        <li class="page-item"><a href="#" class="page-link">«</a></li>
        <li class="page-item"><a href="#" class="page-link">1</a></li>
        <li class="page-item"><a href="#" class="page-link">2</a></li>
        <li class="page-item"><a href="#" class="page-link">3</a></li>
        <li class="page-item"><a href="#" class="page-link">»</a></li>
    </ul>
</div> --}}
</div>
<!-- /.card-header -->
<div class="card-body p-0">
    <div class="table-responsive">

      <table class="table m-0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tên danh mục</th>
            <th>Danh mục cha</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @if(count($categories))
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
            <td>
                <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary"><i class="fas fa-feather-alt"></i></a>
                <form action="{{route('category.destroy', $category->id)}}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Bạn có chắc không?')" class="btn btn-danger" href="{{route('category.destroy', $category->id)}}"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
        @else
        <h4 class="card-title">Không có dữ liệu</h4>
        @endif
    </tbody>
</table>
</div>
<!-- /.table-responsive -->
</div>
</div>
@stop