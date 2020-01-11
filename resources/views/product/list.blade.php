@extends('backend.main3')

@section('title', 'Danh sách sản phẩm')

@section('content')
    <a href="{{route('product.create')}}" class="btn btn-primary">Thêm sản phẩm</a>
    <br>
    <br>
    @if(Session::has('msg'))
        <div class="alert alert-{{Session::get('level')}}">
            {{Session::get('msg')}}
        </div>
    @endif
    @if($products)
        <table class="table">
            <thead>
            <tr>
                <td>ID</td>
                <td>Tên sản phẩm</td>
                <td>Tên hãng</td>
                <td>Mô tả</td>
                <td>Hình ảnh</td>
                <td>Giá sản phẩm</td>
                <td>Giá khuyến mãi</td>
                <td>Hành động</td>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product['name']}}</td>
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
                    <td><a href="{{route('product.edit', $product->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a> <br>
                        <form action="{{route('product.destroy', $product->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" style="display: block;float: right;margin-right: -16px; margin-top: -37px;"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@stop