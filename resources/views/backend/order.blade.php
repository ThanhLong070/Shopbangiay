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
        <td>{{ number_format($od->total,0,'.',' ') }} VNĐ</td>
        <td>{{ $od->note }}</td>
        <td>
              @if($od->status == 0)
                <a data-id="{{$od->id}}" class="update btn btn-success"
                   href="javascript:void(0)"
                   data-toggle="tooltip" title="Đã hoàn thành!"><i
                          class="fas fa-feather-alt"></i>
                </a>
              @endif
              <a href="{{route('order.edit',$od->id)}}" data-toggle="tooltip"
                 title="Chi tiết đơn hàng" class="btn btn-info"> <i class="fas fa-eye"></i>
              </a>
              <a data-id="{{$od->id}}" class="delete btn btn-danger"
                 href="javascript:void(0)"><i
                        class="fas fa-trash-alt"></i>
              </a>
        </td>
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