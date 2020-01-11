@extends('customer.main2')
@section('content2')
<!-- Start Banner Area -->
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
                        <h3>Thông tin người mua</h3>
                        <form class="row contact_form" enctype="multipart/form-data" action="{{ route('checkout.store') }}" method="post" novalidate="novalidate">
                            @csrf
                            <div class="col-md-12 form-group p_star">
                                <label for="name">Họ và tên:</label>
                                <input type="text" class="form-control" id="fullname" name="name" value="{{old('name')}}">
                            </div> 
                            @if($errors->has('name'))
                            {{ $errors->first('name') }}
                            @endif
                            <div class="col-md-6 form-group p_star">
                                <label for="phone">Số điện thoại:</label>
                                <input type="text" class="form-control" id="number" name="phone" value="{{old('phone')}}">
                            </div>
                            @if($errors->has('phone'))
                            {{ $errors->first('phone') }}
                            @endif
                            <div class="col-md-6 form-group p_star">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
                            </div>
                            @if($errors->has('email'))
                            {{ $errors->first('email') }}
                            @endif
                            <div class="switch-wrap d-flex justify-content-between " style="margin-left: 17px;">
                                <p> Bạn có muốn lập tài khoản mới</p>
                                <div class="confirm-checkbox">
                                    <input type="checkbox" id="confirm-checkbox">
                                    <label for="confirm-checkbox"></label>
                                </div>
                            </div>
                            <div class="col-md-6 form-group p_star" id="autoUpdate" style="display: none;">
                                <label for="email">Mật khẩu:</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
                            <script>
                                    $(document).ready(function(){
                                    $('#confirm-checkbox').change(function(){
                                    if(this.checked)
                                    $('#autoUpdate').show('slow');
                                    else
                                    $('#autoUpdate').hide('slow');

                                    });
                                    });
                            </script>
                            <div class="col-md-12 form-group p_star">
                                <label for="address">Địa chỉ:</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
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
                            <div class="col-md-12 form-group">
                                <label for="note">Ghi chú đơn hàng:</label>
                                <textarea class="form-control" name="note" id="note" rows="10">{{ old('note') }}</textarea>
                            </div>
                            <div class="col-md-12 form-group">
                                    <button type="submit" name="dat-hang" class="genric-btn success circle">Đặt hàng</button>
                                  
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">                           
                            <h2>Đơn hàng của bạn</h2>
                            <ul class="list">
                                <li><a href="#">Sản phẩm <span>Thành tiền</span></a></li>
                                @foreach($cart->items as  $item)
                                @php 

                                    $thanhtien = $item['price']*$item['quantity'];

                                @endphp

                                <li><a href="#">{{ $item['name'] }} <span class="middle">x 0{{ $item['quantity'] }}</span><span class="last">{{ number_format($thanhtien) }}VNĐ</span></a></li>

                                @endforeach
                            </ul>
                            <ul class="list list_2">
                                <li><a href="#">Tổng cộng <span>{{ number_format($cart->total_price) }}VNĐ</span></a></li>
                            </ul>
                            <div class="payment_item">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" name="selector">
                                    <label for="f-option5">Kiểm tra thanh toán</label>
                                    <div class="check"></div>
                                </div>
                                <p>Vui lòng gửi bản kiểm tra đến Tên Cửa hàng, Phố Cửa hàng, Cửa hàng Thị trấn, Cửa hàng Bang / Quận, Mã bưu điện.</p>
                            </div>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" name="selector">
                                    <label for="f-option6">Momo </label>
                                    <img src="{{ asset('home') }}/img/product/card.jpg" alt="">
                                    <div class="check"></div>
                                </div>
                                <p>Thanh toán qua Momo; bạn có thể thanh toán bằng thẻ tín dụng nếu bạn không có tài khoản Momo.</p>
                            </div>
                            <div class="creat_account">
                                <input type="checkbox" id="f-option4" name="selector">
                                <label for="f-option4">Tôi đã đọc và chấp nhận các </label> 
                                <a href="#"> điều khoản và điều kiện *</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->
    @stop()