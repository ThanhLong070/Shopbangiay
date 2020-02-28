@extends('backend.main3')
@section('content')
<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $product_count }}</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $cus_count }}<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $cus_count }}</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $cus_count }}</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
 <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Đơn hàng mới nhất</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
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
                        <tr>
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
                              @if($od->status==0)
                                  Chưa xử lý
                              @elseif($od->status==1)
                                  Đang giao hàng
                              @elseif($od->status==2)
                                  Đã hoàn thành
                              @elseif($od->status==3)
                                  Đã hủy
                              @endif
                          </td>
                          <td>
                              @if($od->payment=="credit")
                                  Chuyển khoản
                              @else
                                  Ship cod
                              @endif
                          </td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>
  @stop()