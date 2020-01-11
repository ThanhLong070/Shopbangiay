@extends('backend.main3')

@section('title', 'List Order')

@section('content')

    <div class="card">
                <div class="card-header ui-sortable-handle" style="cursor: move;">
                    <h3 class="card-title">
                      <i class="ion ion-clipboard mr-1"></i>
                      Danh sách khách hàng
                    </h3>

                    <div class="card-tools">
                      <ul class="pagination pagination-sm">
                        <li class="page-item"><a href="#" class="page-link">«</a></li>
                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">»</a></li>
                      </ul>
                    </div>
                </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">

                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Customer ID</th>
                      <th>Họ và tên</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Số điện thoại</th>
                      <th>Ghi chú</th>
                    </tr>
                    </thead>
                    <tbody>
                     @foreach($customer as $cus)
                        <tr>
                          <td>{{ $cus->id }}</td>
                          <td>{{ $cus->name }}</td>
                          <td>{{ $cus->email }}</td>
                          <td>{{ $cus->address }}</td>
                          <td>{{ $cus->phone }}</td>
                          <td>{{ $cus->note }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
            </div>
@stop