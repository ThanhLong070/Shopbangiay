
@extends('customer.main')
@section('content')
	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Cửa hàng</h1>
					<nav class="d-flex align-items-center">
						<a href="{{ route('home') }}">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a href="{{ route('about') }}">Cửa hàng</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-filter mt-50">
					<div class="top-filter-head">Bộ lọc sản phẩm</div>
					<div class="common-filter">
						<div class="head">Thương hiệu</div>
						<form action="#">
							<ul>
								@foreach($listBrands as $brand)
									<li class="filter-list">
										<label class="inline">
											<a href="{{route('getBrand',$brand->id)}}">{{$brand->name}} </a><span>({{ $brand->product->count() }})</span>
										</label>
									</li>
								@endforeach

							</ul>
						</form>
					</div>
				</div>
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">
				
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">

						@if(count($listProducts) >0)

							@foreach($listProducts as $pro)
							<!-- single product -->
							<div class="col-lg-4 col-md-6">
								<div class="single-product">
									<img class="img-fluid" src="{{ $pro->image }}" alt="" style="width: 254.98px;height: 271.45px;">
									<div class="product-details">
										<h6><a href="{{ route('view',['slug'=>$pro->slug]) }}">{{ $pro->name }}</a></h6>

										@if($pro->sale_price > 0)
										<div class="price">
											<h6>{{ number_format($pro->sale_price,0,'.',' ') }} VNĐ</h6>
											<h6 class="l-through">{{ number_format($pro->price,0,'.',' ') }} VNĐ</h6>
										</div>
										@else
											<h6 class="l-through">{{ number_format($pro->price,0,'.',' ') }} VNĐ</h6>
										@endif

										<div class="prd-bottom">

											<a href="{{ route('cart.add',['id'=>$pro->id]) }}" class="social-info">
												<span class="ti-bag"></span>
												<p class="hover-text">add to bag</p>
											</a>

										</div>
									</div>
								</div>
							</div>

							@endforeach
						@else
							<h3>Chưa có sản phẩm nào!</h3>
						@endif
					</div>
				</section>
				<!-- End Best Seller -->
				
			</div>
		</div>
	</div>

	@stop()