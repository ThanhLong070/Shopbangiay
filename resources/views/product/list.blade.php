@extends('backend.main3')

@section('title', 'List Product')

@section('content')
    <button type="button" class="btn btn-info float-left"><a href="{{route('product.create')}}" style="color: white"><i
                    class="fas fa-plus"></i> Thêm sản phẩm</a></button>
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

                <table class="table m-0" id="data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Tên thương hiệu</th>
                        <th>Tên danh mục</th>
                        <th>Hình ảnh</th>
                        <th>Giá sản phẩm</th>
                        <th>Giá khuyến mãi</th>
                        <th>Số lượng</th>
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
                                    $brand = DB::table('brands')->where('id', $product->brand_id)->first();
                                    if ($brand) {
                                        echo $brand->name;
                                    } else
                                        echo "null";
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $cate = DB::table('categories')->where('id', $product->cat_id)->first();
                                    if ($cate) {
                                        echo $cate->name;
                                    } else
                                        echo "null";
                                    ?>
                                </td>
                                <td><img src="{{$product->image}}" alt="" style="width: 100px"></td>
                                <td>{{number_format($product->price,0,'.',' ')}} VNĐ</td>
                                <td>{{number_format($product->sale_price,0,'.',' ')}} VNĐ</td>
                                <td>{{$product->number}}</td>
                                <td>
                                    <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary"><i
                                                class="fas fa-feather-alt"></i></a>
                                    <a data-id="{{$product->id}}" class="delete btn btn-danger"
                                       href="javascript:void(0)"><i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    @else
                        <h4 class="card-title">Không có dữ liệu</h4>
                    @endif
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
    </div>
@stop

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $(document).on('click', '.delete', function () {
                if (confirm('Bạn có chắc muốn xóa?')) {
                    var id = $(this).attr('data-id');
                    var url = '{!! route('product.ajax')!!}';
                    $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: {id: id, action: 'delete'}
                    })
                        .done(function (data) {
                            if (data == true) {
                                $('#data-table').load(window.location.href + " #data-table>tbody");
                            } else
                                alert('no');
                        });
                }
            });
        });
    </script>

@stop