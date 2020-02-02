@extends('backend.main3')

@section('title', 'List Order Items')

@section('content')

    <div class="card">
                <div class="card-header ui-sortable-handle" style="cursor: move;">
                    <h3 class="card-title">
                      <i class="ion ion-clipboard mr-1"></i>
                      Danh sách  chi tiết đơn hàng
                    </h3>

                    
                </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">

                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Order ID</th>
                      <th>Tên sản phẩm</th>
                      <th>Số lượng</th>
                      <th>Giá</th>
                      <th>Giảm giá</th>
                    </tr>
                    </thead>
                    <tbody>
                     @foreach($order_items as $od)
 
                          <td>{{ $od->id }}</td>
                          <td>{{ $od->order_id }}</td>
                          <td>
                            
                            <?php
                                $pro = DB::table('products')->where('id',$od->product_id)->first();
                                if($pro) {
                                    echo $pro->name;
                                } else
                                   echo "null";
                            ?>
                          </td>
                          <td>{{ number_format($od->quantity) }}</td>
                          <td>{{ number_format($od->price) }} VNĐ</td>
                          <td>{{ number_format($od->sale_price) }} VNĐ</td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
            </div>
@stop