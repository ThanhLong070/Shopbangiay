@extends('backend.main3')

@section('title', 'List Product')

@section('content')
<button type="button" class="btn btn-info float-left"><a href="{{route('product.create')}}" style="color: white"><i class="fas fa-plus"></i> Thêm sản phẩm</a></button>
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
      Danh sách sản phẩm
  </h3>

 
</div>
<!-- /.card-header -->
<div class="card-body p-0">
    <div class="table-responsive">

      <table class="table m-0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Tên hãng</th>
            <th>Mô tả</th>
            <th>Hình ảnh</th>
            <th>Giá sản phẩm</th>
            <th>Giá khuyến mãi</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @if(count($products))
        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>
                <?php
                $cate = DB::table('categories')->where('id',$product->cat_id)->first();
                if($cate) {
                    echo $cate->name;
                } else
                echo "null";
                ?>
            </td>
            <td>{!!$product->description!!}</td>
            <td><img src="{{$product->image}}" alt="" style="width: 100px"></td>
            <td>{{number_format($product->price),0,",","."}} VNĐ</td>
            <td>{{number_format($product->sale_price),0,",","."}} VNĐ</td>
            <td>
                <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary"><i class="fas fa-feather-alt"></i></a>
                <form action="{{route('product.destroy', $product->id)}}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Bạn có chắc không?')" class="btn btn-danger" href="{{route('product.destroy', $product->id)}}"><i class="fas fa-trash-alt"></i></button>
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