@extends('customer.main2')
@section('content2')
<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Confirmation</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Confirmation</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Order Details Area =================-->
	<section class="order_details section_gap">
		<div class="container">
			<h3 class="title_confirmation">Cảm ơn bạn. Đơn đặt hàng của bạn đã được nhận.</h3>
			<div class="row order_d_inner">
			
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Thông tin đặt hàng</h4>
						{{-- 
						<ul class="list">
							@foreach($orders as $order)
							<li><a href ="#"><span>Số thứ tự</span>{{ $order->customer_id}}</a></li>
							<li><a href="#"><span>Tổng cộng</span> : {{ number_format($order->total) }}VNĐ</a></li>
							<li><a href="#"><span>Payment type</span> : {{ $order->payment }}</a></li>
							@endforeach
						</ul> --}}
					</div>
				</div>
		
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Địa chỉ thanh toán</h4>
						<ul class="list">
							<li><a href="#"><span>Street</span> : 56/8</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Địa chỉ giao hàng</h4>
						<ul class="list">
							<li><a href="#"><span>Street</span> : {{ $orders['customer_id'] }}</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="order_details_table">
				<h2>Chi tiết đặt hàng</h2>
				<div class="table-responsive">
					@foreach($cart->items as  $item)
					 @php 

                                    $thanhtien = $item['price']*$item['quantity'];

                    @endphp
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Sản phẩm</th>
								<th scope="col">Số lượng</th>
								<th scope="col">Thành tiền</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<p>{{ $item['name'] }} </p>
								</td>
								<td>
									<h5>x 0{{ $item['quantity'] }}</h5>
								</td>
								<td>
									<p>{{ number_format($thanhtien) }}VNĐ</p>
								</td>
							</tr>
					
							<tr>
								<td>
									<h4>Tổng Phụ</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>{{ number_format($cart->total_price) }}VNĐ</p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Shipping</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>$50.00</p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Tổng cộng</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>{{ number_format($cart->total_price) }}VNĐ</p>
								</td>
							</tr>
						</tbody>
					</table>
					@endforeach
				</div>
			</div>
		</div>
	</section>
	<!--================End Order Details Area =================-->
@stop()