@extends('backend.main3')
@section('title', 'Danh sách')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Quản lý đơn hàng</h4>
            <a href="{{route('chuaXuLy')}}" class="btn btn-dark float-right">Đơn hàng chưa xử lý </a>

            <div class="table-responsive">
                <table class="table" id="data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Khách hàng</th>
                        <th>Địa chỉ</th>
                        <th>Tổng tiền</th>
                        <th>Thanh toán</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($listOrders))
                        @foreach($listOrders as $item)
                            <tr>
                                <td><a href="#">#{{$item->id}}</a></td>
                                <td>{{$item->customer->name}}</td>
                                <td>{{$item->customer->address}}</td>
                                <td>{{number_format($item->total,0,'.',' ')}} VNĐ</td>
                                <td>@if($item->payment=="credit")
                                        Chuyển khoản
                                    @else
                                        Ship cod
                                    @endif

                                </td>
                                <td>@if($item->status==0)
                                        Chưa xử lý
                                    @elseif($item->status==1)
                                        Đang giao hàng
                                    @elseif($item->status==2)
                                        Đã hoàn thành
                                    @elseif($item->status==3)
                                        Đã hủy
                                    @endif
                                </td>
                                <td>{{$item->created_at->format('d-m-Y')}}</td>
                                <td>
                                    @if($item->status == 0)
                                        <a data-id="{{$item->id}}" class="update btn btn-success"
                                           href="javascript:void(0)"
                                           data-toggle="tooltip" title="Đã hoàn thành!"><i
                                                    class="fas fa-feather-alt"></i>
                                        </a>
                                    @endif
                                    <a href="{{route('order.edit',$item->id)}}" data-toggle="tooltip"
                                       title="Chi tiết đơn hàng" class="btn btn-info"> <i class="fas fa-eye"></i>
                                    </a>

                                    <a data-id="{{$item->id}}" class="delete btn btn-danger"
                                       href="javascript:void(0)"><i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        {{$listOrders->render()}}
                    </tbody>
                    @else
                        <h4 class="card-title">Không có đơn hàng nào!</h4>
                    @endif
                </table>
            </div>
        </div>
    </div>

@stop
@section('script')
    {{--<script src="admin_assets/vendors/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>--}}
    {{--<script src="admin_assets/vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>--}}
    {{--<script src="admin_assets/vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>--}}
    {{--<script src="admin_assets/vendors/bower_components/jszip/dist/jszip.min.js"></script>--}}
    {{--<script src="admin_assets/vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>--}}

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
                    var url = '{!! route('order.ajax')!!}';
                    $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: {id: id, action: 'delete'}
                    })
                        .done(function (data) {
                            if (data == true) {
                                $('#data-table').load(window.location.href + " #data-table>tbody");
                            }
                            else
                                alert('no');
                        });
                }
            });
            $(document).on('click', '.update', function () {
                if (confirm('Đơn hàng đã hoàn thành?')) {
                    var id = $(this).attr('data-id');
                    var url = '{!! route('order.ajax')!!}';
                    $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: {id: id, action: 'update'}
                    })
                        .done(function (data) {
                            if (data == true) {
                                $('#data-table').load(window.location.href + " #data-table>tbody");
                            }
                            else
                                alert('Cập nhật không thành công');

                        });


                }
            });
        });
    </script>

@stop