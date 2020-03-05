<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Thanh Long Shop</title>
	<!--
		CSS
		============================================= -->
		<link rel="stylesheet" href="{{asset('home')}}/css/linearicons.css">
		<link rel="stylesheet" href="{{asset('home')}}/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{asset('home')}}/css/themify-icons.css">
		<link rel="stylesheet" href="{{asset('home')}}/css/bootstrap.css">
		<link rel="stylesheet" href="{{asset('home')}}/css/owl.carousel.css">
		<link rel="stylesheet" href="{{asset('home')}}/css/nice-select.css">
		<link rel="stylesheet" href="{{asset('home')}}/css/nouislider.min.css">
		<link rel="stylesheet" href="{{asset('home')}}/css/ion.rangeSlider.css" />
		<link rel="stylesheet" href="{{asset('home')}}/css/ion.rangeSlider.skinFlat.css" />
		<link rel="stylesheet" href="{{asset('home')}}/css/magnific-popup.css">
		<link rel="stylesheet" href="{{asset('home')}}/css/main.css">
	</head>

	<body>

		<!-- Start Header Area -->
		<header class="header_area sticky-header">
			<div class="main_menu">
				<nav class="navbar navbar-expand-lg navbar-light main_box">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="{{route('home')}}"><img src="{{asset('home')}}/img/logo.png" alt=""></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
						aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="{{route('home')}}">Trang chủ</a></li>
							<li class="nav-item"><a href="{{route('about')}}" class="nav-link ">Cửa hàng</a></li>
							{{-- <li class="nav-item"><a class="nav-link" href="{{route('tracking')}}">Tracking</a></li> --}}
							<li class="nav-item"><a class="nav-link" href="{{route('getContactUs')}}">Liên hệ</a></li>

							@if(Auth::check())
								<li class="nav-item"><a class="nav-link" href="javascript:void(0)"><i class="fa fa-user" aria-hidden="true"></i> {{Auth::user()->name}}</a></li>
								@if(Auth::user()->role ==1 )
										<li class="nav-item"><a class="nav-link" href="{{route('backend')}}"> Quản trị</a></li>
										<li class="nav-item"><a class="nav-link" href="{{url('logout')}}">Đăng xuất</a></li>
								@else
										<li class="nav-item"><a class="nav-link" href="{{url('logout')}}">Đăng xuất</a></li>
								@endif
							@else
							<li class="nav-item"><a class="nav-link" href="{{route('login')}}">Đăng nhập</a></li>
							<li class="nav-item"><a class="nav-link" href="{{route('register')}}">Đăng kí</a></li>
							@endif
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="{{route('cart')}}" class="cart" style="color:black"><span class="ti-bag"></span>
								(
								{{ $cart->total_quantity }} -
								{{ number_format($cart->total_price,0,'.',' ') }}VNĐ
								)
							</a></li>
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between" action="{{route('search')}}" method="GET">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here" name="keyword">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End Header Area -->

	<!-- Nội dung thay thế -->

	@yield('content');

	<!-- Start related-product Area -->
	<section class="related-product-area section_gap_bottom">
		@if(count($slideBlackFriday))
			@foreach($slideBlackFriday as $item)
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-6 text-center">
							<div class="section-title">
								<h1>{{ $item->title}}</h1>
								<p>{{ $item->descriptions }}</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-9">
							<div class="row">
								
								@if($mainProducts)

								@foreach($mainProducts as $pro)
								<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
									<div class="single-related-product d-flex">
										<a href="#"><img src="{{ $pro->image }}" alt="" style="width: 70px;height: auto;"></a>
										<div class="desc">
											<a href="{{ route('view',['slug'=>$pro->slug]) }}" class="title">{{ $pro->name }}</a>

											@if($pro->sale_price > 0)
											<div class="price">
												<h6>{{ number_format($pro->sale_price,0,'.',' ') }} VNĐ</h6>
												<h6 class="l-through">{{ number_format($pro->price,0,'.',' ') }} VNĐ</h6>
											</div>
											@else 
												<h6 class="l-through">{{ number_format($pro->price,0,'.',' ') }} VNĐ</h6>
											@endif
										</div>
										
									</div>
								</div>
								@endforeach
								@else 
								<h3>Không có sản phẩm nào</h3>
								@endif


							</div>
						</div>
						<div class="col-lg-3">
							<div class="ctg-right">
								<a href="#" target="_blank">
									<img class="img-fluid d-block mx-auto" src="{{ $item->image }}" alt="" style="width: 255px;height: 301.03px;">
								</a>
							</div>
						</div>
					</div>
				</div>
			@endforeach	
		@endif
	</section>
	<!-- End related-product Area -->

	<!-- start footer Area -->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Thông tin về chúng tôi</h6>
						<p>
							Số điện thoại: {{$siteSettings['phone']}}. <br>
							Email: {{$siteSettings['email']}}. <br>
							Địa chỉ: {{$siteSettings['address']}}.
						</p>
					</div>
				</div>
				<div class="col-lg-4  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Bản tin</h6>
						<p>Luôn cập nhật với bản mới nhất của chúng tôi</p>
						<div class="" id="mc_embed_signup">

							<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
							method="get" class="form-inline">

							<div class="d-flex flex-row">

								<input class="form-control" name="EMAIL" placeholder="Nhập địa chỉ Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập địa chỉ Email '"
								required="" type="email">


								<button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
								<div style="position: absolute; left: -5000px;">
									<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
								</div>

									<!-- <div class="col-lg-4 col-md-4">
												<button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
											</div>  -->
										</div>
										<div class="info"></div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-lg-3  col-md-6 col-sm-6">
							<div class="single-footer-widget mail-chimp">
								<h6 class="mb-20">Nguồn cấp dữ liệu</h6>
								<ul class="instafeed d-flex flex-wrap">
									<li><img src="{{asset('home')}}/img/i1.jpg" alt=""></li>
									<li><img src="{{asset('home')}}/img/i2.jpg" alt=""></li>
									<li><img src="{{asset('home')}}/img/i3.jpg" alt=""></li>
									<li><img src="{{asset('home')}}/img/i4.jpg" alt=""></li>
									<li><img src="{{asset('home')}}/img/i5.jpg" alt=""></li>
									<li><img src="{{asset('home')}}/img/i6.jpg" alt=""></li>
									<li><img src="{{asset('home')}}/img/i7.jpg" alt=""></li>
									<li><img src="{{asset('home')}}/img/i8.jpg" alt=""></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-2 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Theo dõi chúng tôi trên</h6>
								<p>Mạng xã hội</p>
								<div class="footer-social d-flex align-items-center">
									<a href="https://www.facebook.com/BachkhoaAptech236HoangQuocViet"><i class="fa fa-facebook"></i></a>
									<a href="https://www.facebook.com/BachkhoaAptech236HoangQuocViet"><i class="fa fa-twitter"></i></a>
									<a href="https://www.facebook.com/BachkhoaAptech236HoangQuocViet"><i class="fa fa-dribbble"></i></a>
									<a href="https://www.facebook.com/BachkhoaAptech236HoangQuocViet"><i class="fa fa-behance"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
						<p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Bản quyền &copy;<script>document.write(new Date().getFullYear());</script> Tất cả các quyền | Mẫu này được tạo <i class="fa fa-heart-o" aria-hidden="true"></i> bởi <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
					</div>
				</div>
			</footer>
			<!-- End footer Area -->

			<script src="{{asset('home')}}/js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
			crossorigin="anonymous"></script>
			<script src="{{asset('home')}}/js/vendor/bootstrap.min.js"></script>
			<script src="{{asset('home')}}/js/jquery.ajaxchimp.min.js"></script>
			<script src="{{asset('home')}}/js/jquery.nice-select.min.js"></script>
			<script src="{{asset('home')}}/js/jquery.sticky.js"></script>
			<script src="{{asset('home')}}/js/nouislider.min.js"></script>
			<script src="{{asset('home')}}/js/countdown.js"></script>
			<script src="{{asset('home')}}/js/jquery.magnific-popup.min.js"></script>
			<script src="{{asset('home')}}/js/owl.carousel.min.js"></script>
			<!--gmaps Js-->
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
			<script src="{{asset('home')}}/js/gmaps.min.js"></script>
			<script src="{{asset('home')}}/js/main.js"></script>
			<script src="{{asset('home')}}/js/myScript.js"></script>

	
		</body>

		</html>