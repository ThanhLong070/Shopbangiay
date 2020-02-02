@extends('backend.main3')

@section('title', 'List Order')

@section('content')

<div class="card">
  <div class="card-header ui-sortable-handle" style="cursor: move;">
    <h3 class="card-title">
      <i class="ion ion-clipboard mr-1"></i>
      Danh sách đơn hàng
    </h3>

    
  </div>
  <!-- /.card-header -->
  <div class="card-body p-0">
    <div class="table-responsive">

      <table class="table m-0">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Khách hàng</th>
            <th>Tổng tiền</th>
            <th>Ghi chú</th>
            <th>Trạng thái</th>
            <th>Hình thức thanh toán</th>
          </tr>
        </thead>
        <tbody>
         @foreach($orders as $od)
         
         <td>{{ $od->id }}</td>
         <td>
          
          <?php
          $cus = DB::table('customers')->where('id',$od->customer_id)->first();
          if($cus) {
            echo $cus->name;
          } else
          echo "null";
          ?>
        </td>
        <td>{{ number_format($od->total) }} VNĐ</td>
        <td>{{ $od->note }}</td>
        <td>{{ $od->status }}</td>
        <td>{{ $od->payment }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<!-- /.table-responsive -->
</div>
</div>
@stop