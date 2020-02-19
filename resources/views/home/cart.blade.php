@extends('customer.main2')
@section('content2')
<!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Giỏ hàng</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{route('home')}}">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{route('cart')}}">Giỏ hàng</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                  
                    <table class="table">
                        <thead>
                            <tr>

                                <th scope="col">STT</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Thành tiền</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($cart->items))

                            <?php $n=1; ?>
                            @foreach($cart->items as  $item)
                            @php 

                                    $thanhtien = $item['price']*$item['quantity'];

                            @endphp
                            <tr>
                                <td>{{ $n }}</td>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="{{ $item['image'] }}" alt="" style="width: 100px;height: auto;">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="media-body">
                                            <p>{{ $item['name'] }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <form  method="get" action="{{ route('cart.update',['id' => $item['id']]) }}" class="form-inline" role="form">
                                        <div class="form-group">
                                          
                                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" class="form-control" style="width: 80px;">
                                            <input type="submit" value="Cập nhật" class="genric-btn info radius">
                                            {{-- <input type="number" name="qty" id="sst" maxlength="12" value="{{ $item['quantity'] }}" title="Quantity:"
                                                class="input-text qty"> --}}
                                            
                                         </div>
                                         {{-- <button type="submit" class="btn btn-primary btn-xs">Cập nhật</button> --}}

                                    </form>
                                    
                                    {{-- <a href="{{ route('cart.update',['id'=>$item['id']]) }}" class="btn btn-xs btn-success">Cập nhật</a> --}}
                                </td>
                                <td>
                                    <h5>{{ number_format($item['price']) }}VNĐ</h5>
                                </td>

                                <td>
                                    <h5>{{ number_format($thanhtien) }}VNĐ</h5>
                                </td>
                                <td>
                                    <a href="{{ route('cart.remove',['id'=>$item['id']]) }}" class="genric-btn danger radius" onclick="return confirm('Bạn có muốn xóa sản phẩm này không ?')">Xóa</a>
                                </td>
                                <?php $n++;?>
                            </tr>
                            @endforeach
                       

                        </tbody>
                        
                            <tr>
                                <td colspan="7" style="text-align: center;">
                                    <h3>Tổng tiền: <span>{{ number_format($cart->total_price) }}VNĐ</span></h3>
                                </td>
                            </tr>
                       
                        <tfoot>
                            <tr>
                                <td colspan="7" style="text-align: center;"> 
                                    <a class="genric-btn info radius" href="{{ route('about') }}">Tiếp tục mua hàng</a>
                                    <a class="genric-btn danger radius" href="{{ route('cart.clear') }}" onclick="return confirm('Bạn có muốn xóa hết không ?')">Xóa hết</a>
                                    <a class="genric-btn success radius" href="{{ route('checkout.create') }}">Thanh toán</a>                              
                                </td>                                
                            </tr>
                        </tfoot>
                    </table>
                    @else
                    <div class="alert alert-warning">    
                        <strong>Giỏ hàng trống.</strong> Quý khách vui lòng thếm sản phẩm vào giỏ hàng.
                        <a href="{{ route('about') }}" class="genric-btn info radius">Tiếp tục mua hàng nhé</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
@stop