@extends('customer.main')
@section('content')
<!-- start banner Area -->
	<section class="banner-area">
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-start">
				<div class="col-lg-12">
					<div class="active-banner-slider owl-carousel">
						<!-- single-slide -->
						@foreach($slides as $key=>$slide)
						<div class="row single-slide align-items-center d-flex item-slide item-slide-{{$key+1}}">
							<div class="col-lg-5 col-md-6 slide-desc slide-desc-{{$key+1}}">
								<div class="banner-content">
									@if(isset($slide->title))
									<h1>{{$slide->title}}</h1>
									@endif
									@if(isset($slide->descriptions))
									<p>{{$slide->descriptions}}</p>
									@endif
									@if(isset($slide->title_link))
									<div class="add-bag d-flex align-items-center">
										<a class="add-btn" href="{{ route('about') }}"><span class="lnr lnr-cross"></span></a>
										<span class="add-text text-uppercase">{{$slide->title_link}}</span>
									</div>
									@endif
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="{{$slide->image}}" alt="" style="height: 380.8px;width: 635px;">
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- start features Area -->
	<section class="features-area section_gap">
		<div class="container">
			<div class="row features-inner">
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="{{asset('home')}}/img/features/f-icon1.png" alt="">
						</div>
						<h6>{{$siteSettings['cot1']}}</h6>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="{{asset('home')}}/img/features/f-icon2.png" alt="">
						</div>
						<h6>{{$siteSettings['cot2']}}</h6>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="{{asset('home')}}/img/features/f-icon3.png" alt="">
						</div>
						<h6>{{$siteSettings['cot3']}}</h6>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="{{asset('home')}}/img/features/f-icon4.png" alt="">
						</div>
						<h6>{{$siteSettings['cot4']}}</h6>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end features Area -->

	<!-- Start category Area -->
	<section class="category-area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-12">
					<div class="row">
						@if(count($slideHinhLonTren))
							@foreach($slideHinhLonTren as $item)
								<div class="col-lg-8 col-md-8">
									<div class="single-deal">
										<div class="overlay"></div>
										<img class="img-fluid w-100" src="{{$item->image}}" alt="" style="height: 191.48px;width:476.66px">
										<a href="{{$item->image}}" class="img-pop-up" target="_blank">
											<div class="deal-details">
												<h6 class="deal-title">{{($item->title)}}</h6>
											</div>
										</a>
									</div>
								</div>
							@endforeach	
						@endif
						@if(count($slide2HinhNho))
							@foreach($slide2HinhNho as $item)
								<div class="col-lg-4 col-md-4">
									<div class="single-deal">
										<div class="overlay"></div>
										<img class="img-fluid w-100" src="{{$item->image}}" alt="" style="height: 191.78px;width:223.33px">
										<a href="{{$item->image}}" class="img-pop-up" target="_blank">
											<div class="deal-details">
												<h6 class="deal-title">{{($item->title)}}</h6>
											</div>
										</a>
									</div>
								</div>
							@endforeach	
						@endif
						@if(count($slideHinhLonDuoi))
							@foreach($slideHinhLonDuoi as $item)
								<div class="col-lg-8 col-md-8">
									<div class="single-deal">
										<div class="overlay"></div>
										<img class="img-fluid w-100" src="{{$item->image}}" alt="" style="height: 191.48px;width:476.66px">
										<a href="{{$item->image}}" class="img-pop-up" target="_blank">
											<div class="deal-details">
												<h6 class="deal-title">{{($item->title)}}</h6>
											</div>
										</a>
									</div>
								</div>
							@endforeach	
						@endif
					</div>
				</div>
				@if(count($slideBlackFriday))
					@foreach($slideBlackFriday as $item)
						<div class="col-lg-4 col-md-6">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="{{$item->image}}" alt="" style="height: 431.19px;width:350px">
								<a href="{{$item->image}}" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">{{($item->title)}}</h6>
									</div>
								</a>
							</div>
						</div>
					@endforeach	
				@endif
			</div>
		</div>
	</section>
	<!-- End category Area -->

	<!-- start product Area -->
	<section class="owl-carousel active-product-area section_gap">
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>Sản phẩm mới nhất</h1>
							<p>Những mẫu giày được giới trẻ ưa thích hiện nay.</p>
						</div>
					</div>
				</div>
				<div class="row">
					@foreach($products as $pro)
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="{{ $pro->image }}" alt="" style="width: 255px;height: 271.47px;">
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
				</div>
			</div>
		</div>
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>Sản phẩm bán chạy</h1>
							<p>Những mẫu giày được giới trẻ ưa thích hiện nay.</p>
						</div>
					</div>
				</div>
				<div class="row">
					@foreach($products as $pro)
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="{{ $pro->image }}" alt="" style="width: 255px;height: 271.47px;">
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
				</div>
			</div>
		</div>
	</section>
	<script type="text/javascript">
		
	</script>
	<!-- end product Area -->

	<!-- Start exclusive deal Area -->
	<section class="exclusive-deal-area">
		<div class="container-fluid">
			<div class="row justify-content-center align-items-center">
				@if(count($slideCountdown))
					@foreach($slideCountdown as $item)
						<div class="col-lg-6 no-padding exclusive-left">
							<div class="row clock_sec clockdiv" id="clockdiv">
								<div class="col-lg-12">
									<h1>{{ $item->title  }}</h1>
									<p>{{ $item->descriptions }}</p>
								</div>
								<div class="col-lg-12">
									<div class="row clock-wrap">
										<div class="col clockinner1 clockinner">
											<h1 class="days">150</h1>
											<span class="smalltext">Days</span>
										</div>
										<div class="col clockinner clockinner1">
											<h1 class="hours">23</h1>
											<span class="smalltext">Hours</span>
										</div>
										<div class="col clockinner clockinner1">
											<h1 class="minutes">47</h1>
											<span class="smalltext">Mins</span>
										</div>
										<div class="col clockinner clockinner1">
											<h1 class="seconds">59</h1>
											<span class="smalltext">Secs</span>
										</div>
									</div>
								</div>
							</div>
							<a href="{{ route('about') }}" class="primary-btn">{{ $item->title_link}}</a>
						</div>
					@endforeach	
				@endif		
				<div class="col-lg-6 no-padding exclusive-right">
					<div class="active-exclusive-product-slider">
						<!-- single exclusive carousel -->
						@foreach($products as $pro)
						<div class="single-exclusive-slider">
							<img class="img-fluid" src="{{ $pro->image }}" alt="">
							<div class="product-details">
								@if($pro->sale_price > 0)
									<div class="price">
										<h6>{{ number_format($pro->sale_price,0,'.',' ') }} VNĐ</h6>
										<h6 class="l-through">{{ number_format($pro->price,0,'.',' ') }} VNĐ</h6>
									</div>
									@else 
										<h6 class="l-through">{{ number_format($pro->price,0,'.',' ') }} VNĐ</h6>
									@endif

								<h4>{{ $pro->name }}</h4>
								<div class="add-bag d-flex align-items-center justify-content-center">
									<a class="add-btn" href="{{ route('cart.add',['id'=>$pro->id]) }}"><span class="ti-bag"></span></a>
									<span class="add-text text-uppercase">Thêm vào giỏ</span>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End exclusive deal Area -->

	<!-- Start brand Area -->
	<section class="brand-area section_gap">
		<div class="container">
			<div class="row">
				<a class="col single-img" href="#">
					<img class="img-fluid d-block mx-auto" src="{{asset('home')}}/img/brand/1.png" alt="">
				</a>
				<a class="col single-img" href="#">
					<img class="img-fluid d-block mx-auto" src="{{asset('home')}}/img/brand/2.png" alt="">
				</a>
				<a class="col single-img" href="#">
					<img class="img-fluid d-block mx-auto" src="{{asset('home')}}/img/brand/3.png" alt="">
				</a>
				<a class="col single-img" href="#">
					<img class="img-fluid d-block mx-auto" src="{{asset('home')}}/img/brand/4.png" alt="">
				</a>
				<a class="col single-img" href="#">
					<img class="img-fluid d-block mx-auto" src="{{asset('home')}}/img/brand/5.png" alt="">
				</a>
			</div>
		</div>
	</section>
	<!-- End brand Area -->

	
@stop()