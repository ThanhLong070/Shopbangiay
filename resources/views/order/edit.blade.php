@extends('backend.main3')
@section('title', 'Chi tiết hóa đơn')
{{--@section('css')--}}
    {{--<link rel="stylesheet" href="admin_assets/vendors/bower_components/dropzone/dist/dropzone.css">--}}
    {{--<link rel="stylesheet"--}}
          {{--href="admin_assets/vendors/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css">--}}

    {{--<link rel="stylesheet" href="admin_assets/vendors/bower_components/trumbowyg/dist/ui/trumbowyg.min.css">--}}
    {{--<link rel="stylesheet" href="admin_assets/vendors/bower_components/select2/dist/css/select2.min.css">--}}
    {{--<link rel="stylesheet" href="admin_assets/vendors/bower_components/rateYo/min/jquery.rateyo.min.css">--}}
    {{--<link rel="stylesheet" href="admin_assets/vendors/bower_components/rateYo/min/jquery.rateyo.min.css">--}}
{{--@stop--}}
@section('content')
    <div class="content__inner">
        <header class="content__title">

            <h1>Mã đơn hàng: #{{$order->id }}</h1>
            <small>
                In mẫu hóa đơn đã sẵn sàng. Vui lòng sử dụng Google Chrome hoặc bất kỳ trình duyệt Webkit nào khác để in
                tốt hơn.
            </small>
        </header>
        @if(Session::has('message'))
            <div class="alert alert-{{Session::get('level')}}">
                {{Session::get('message')}}
            </div>
        @endif

        <div class="invoice" style="padding: 15px;">
            <div class="invoice__header">
                <img class="invoice__logo" src="{{asset('home')}}/img/logo.png" alt="" height="90px" width="auto">
            </div>

            <div class="row invoice__address">
                <div class="col-6">
                    <div class="text-right">
                        <p>Đơn hàng gửi đi từ</p>

                        <h4>Thanh Long Shop</h4>

                        <address>
                           234 Phạm Văn Đồng,Bắc Từ Liêm, Hà Nội<br>
                            Việt Nam
                        </address>

                        0337067439<br/>
                        thanhlongshop@gmail.com
                    </div>
                </div>

                <div class="col-6">
                    <div class="text-left">
                        <p>Người nhận</p>

                        <h4>{{$order->customer->name}}</h4>

                        <address>
                            {{$order->customer->address}}<br>
                            Việt Nam
                        </address>

                        0{{$order->customer->phone}}<br/>
                        {{$order->customer->email}}
                    </div>
                </div>
            </div>

            <div class="row invoice__attrs">
                <div class="col-3">
                    <div class="invoice__attrs__item">
                        <small>Mã hóa đơn#</small>
                        <h3>{{$order->id}}</h3>
                    </div>
                </div>

                <div class="col-3">
                    <div class="invoice__attrs__item">
                        <small>Ngày đặt hàng</small>
                        <h3>{{$order->created_at->format('d-m-Y')}}</h3>
                    </div>
                </div>

                <div class="col-3">
                    <div class="invoice__attrs__item">
                        <small>Thanh toán</small>
                        <h3>@if($order->payment== 'credit')
                                Chuyển khoản
                            @else
                                SHIP COD
                            @endif
                        </h3>
                    </div>
                </div>

                <div class="col-3">
                    <div class="invoice__attrs__item">
                        <small>Tổng tiền</small>
                        <h3>{{number_format($order->total,0,'.',' ')}} VND</h3>
                    </div>
                </div>
            </div>


            <table class="table table-bordered invoice__table">
                <thead>
                <tr class="text-uppercase">
                    <th>Sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
                </thead>
                <tbody>
                @if($order->detail)
                    @foreach($order->detail as $item)
                        <tr>
                            <td style="width: 50%">
                                {{$item->product->name}}
                            </td>
                            <td>{{number_format($item->price,0,'.',' ') }} VNĐ</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{number_format($item->price*$item->quantity,0,'.',' ') }} VNĐ</td>
                        </tr>
                    @endforeach
                 @else
                    <h3>Không có đơn hàng nào</h3>
                @endif
                <tr>
                    <td colspan="3">Tổng tiền</td>
                    <td>{{number_format($order->total,0,'.',' ') }} VND</td>
                </tr>
                </tbody>
            </table>

            <div class="invoice__remarks">
                <h5>Ghi chú</h5>
                <p>{{$order->note}}</p>

                <h5 class="mt-5">Tình trạng đơn hàng</h5>
                <form action="{{route('order.update',$order->id)}}" method="POST">
                    {!! csrf_field() !!}

                    <select name="status" id="">
                        <option value="0" {{($order->status==0)? "selected": null}}>Chưa xử lý</option>
                        <option value="1" {{($order->status==1)? "selected": null}}>Đang giao hàng</option>
                        <option value="2" {{($order->status==2)? "selected": null}}>Đã hoàn thành</option>
                        <option value="3" {{($order->status==3)? "selected": null}}>Huỷ đơn hàng</option>
                    </select>
                    <br>
                    <br>
                    <span class="btn btn-dark" onclick="window.history.back();"> Quay lại</span>
                    <button type="submit" class="btn btn-dark">Cập nhật đơn hàng</button>
                </form>
            </div>
        </div>
    </div>

@stop
@section('script')

    {{--<script src="admin_assets/vendors/bower_components/autosize/dist/autosize.min.js"></script>--}}
    {{--<script src="admin_assets/vendors/bower_components/trumbowyg/dist/trumbowyg.min.js"></script>--}}
    {{--<script src="admin_assets/vendors/bower_components/rateYo/min/jquery.rateyo.min.js"></script>--}}
    {{--<script src="admin_assets/vendors/bower_components/select2/dist/js/select2.full.min.js"></script>--}}
    {{--<script src="admin_assets/vendors/bower_components/jquery-text-counter/textcounter.min.js"></script>--}}
    {{--<script src="admin_assets/vendors/bower_components/flatpickr/dist/flatpickr.min.js"></script>--}}

    {{--<script>--}}
        {{--$(document).ready(function () {--}}
            {{--$('input[type="radio"]').on('change', function () {--}}
                {{--var val = $(this).val();--}}
                {{--$.ajax({--}}
                    {{--url: '{{route('category.ajax')}}',--}}
                    {{--type: 'post',--}}
                    {{--dataType: 'text',--}}
                    {{--data: {value: val, action: "loadCate"}--}}
                {{--})--}}
                    {{--.done(function (data) {--}}
                        {{--$('#parentIdSelect').html(data);--}}
                    {{--})--}}
                    {{--.fail(function (e) {--}}
                        {{--alert(e.message);--}}
                    {{--})--}}
            {{--});--}}
        {{--})--}}
    {{--</script>--}}
@stop