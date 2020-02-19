@extends('customer.main2')
@section('content2')
<!-- Start Banner Area -->
<?php
if (Auth::check()) {
    $user = Auth::user();
}
?>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Checkout</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="single-product.html">Checkout</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
    <div class="container">
      
     
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h3>Thông tin người mua</h3>
                    <form class="row contact_form" enctype="multipart/form-data" action="{{ route('checkout.store') }}" method="post" novalidate="novalidate">
                        @csrf
                        <div class="col-md-12 form-group p_star">
                            <label for="name">Họ và tên:</label>
                            <input type="text" class="form-control" id="fullname" name="name" value="{{ old('name',isset($user->name)? $user->name: null) }}">
                        </div>
                        @if($errors->has('name'))
                            {{ $errors->first('name') }}
                        @endif
                        <div class="col-md-6 form-group p_star">
                            <label for="phone">Số điện thoại:</label>
                            <input type="text" class="form-control" id="number" name="phone" value="{{ old('phone',isset($user->phone)? $user->phone: null) }}">
                        </div>
                        @if($errors->has('phone'))
                            {{ $errors->first('phone') }}
                        @endif
                        <div class="col-md-6 form-group p_star">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email',isset($user->email)? $user->email: null) }}">
                        </div>
                        @if($errors->has('email'))
                            {{ $errors->first('email') }}
                        @endif
                        <div class="col-md-12 form-group p_star">
                            <label for="address">Địa chỉ:</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address',isset($user->address)? $user->address: null) }}">
                        </div>
                        @if($errors->has('address'))
                            {{ $errors->first('address') }}
                        @endif
                        <div class="col-md-12 form-group p_star">
                            <select class="country_select" style="display: none;" name="payment" value='{{ old('payment') }}'>
                                <option value="1">Phương thức thanh toán</option>
                                <option value="Kiểm tra hàng rồi thanh toán">Kiểm tra hàng rồi thanh toán</option>
                                <option value="Thanh toán trực tuyến">Thanh toán trực tuyến</option>
                            </select>
                        </div>
                        @if($errors->has('payment'))
                            {{ $errors->first('payment') }}
                        @endif
                        <div class="col-md-12 form-group">
                            <label for="note">Ghi chú đơn hàng:</label>
                            <textarea class="form-control" name="note" id="note" rows="10">{{ old('note') }}</textarea>
                        </div>
                        @if(!isset($user))
                        <div class="col-md-12 form-group">
                            <label for="createAccount"> <input type="checkbox" id="createAccount" name="createAccount">Tạo tài khoản mới?</label>
                            <input type="password" placeholder="Mật khẩu *" name="password" class="password" style="display: none;" autocomplete="off">
                        </div>
                        @endif
                        <div class="col-md-12 form-group">
                            <button type="submit" name="dat-hang" class="genric-btn success circle">Đặt hàng</button>

                        </div>
                    </form>
                        </div>
                        <div class="col-lg-4">
                            <div class="order_box" style="width: 400px;">                           
                                <h2>Đơn hàng của bạn</h2>
                                <ul class="list">
                                    <li><a href="#">Sản phẩm <span>Thành tiền</span></a></li>
                                    
                                    @foreach($cart->items as  $item)
                                    @php 

                                    $thanhtien = $item['price']*$item['quantity'];

                                    @endphp

                                    <li>
                                        <a href="#">{{ $item['name'] }} <span class="middle">x 0{{ $item['quantity'] }}</span><span class="last">{{ number_format($thanhtien) }}VNĐ</span></a></li>

                                        @endforeach
                                    </ul>
                                    <ul class="list list_2">
                                        <li><a href="#">Tổng cộng <span>{{ number_format($cart->total_price) }}VNĐ</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--================End Checkout Area =================-->
@stop()

@section('script')
<script>
    $('#createAccount').change(function () {

        if ($(this).is(":checked")) {
            $('.password').css('display', 'block');
        }
        else {
            $('.password').css('display', 'none');
        }
    });

</script>
@stop