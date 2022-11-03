@extends('layout')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('public/FE/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/FE/styles/responsive.css')}}">

	<!-- Slider -->

	<div class="main_slider container" style="background:#fff url(public/FE/images/banner{{rand(1,4)}}.webp) no-repeat center" >
		<div class="container fill_height">
			<div class="row align-items-center fill_height">
				<div class="col">

				</div>
			</div>
		</div>
	</div>

	<!-- Banner -->

	<div class="banner">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url(public/FE/images/banner{{rand(1,2)}}.webp)">
					</div>
				</div>
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url(public/FE/images/banner{{rand(3,4)}}.webp)">
					</div>
				</div>
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url(public/FE/images/banner{{rand(5,6)}}.webp)">
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- New Arrivals -->

	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>Sản Phẩm Mới !!!</h2>
					</div>
				</div>
			</div>
			<!-- <div class="row align-items-center">
				<div class="col text-center">
					<div class="new_arrivals_sorting">
						<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">all</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".women">women's</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".accessories">accessories</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".men">men's</li>
						</ul>
					</div>
				</div>
			</div> -->
			<div class="row" style="margin-right: 15px;">
				<div class="col">
					<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>


								@foreach($all_product as $key => $sanpham)
									<div class="product-item men">
										<div class="product discount product_filter">
											<div class="product_image">
											<img src="{{URL::to('public/FE/images/'.$sanpham->hinh)}}" alt="">
											</div>
											<div class="favorite favorite_left"></div>
											<!-- <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span></span></div> -->
											<div class="product_info">
												<h6 class="product_name"><a href="{{URL::to('/chitiet/'.$sanpham->id)}}">{{$sanpham->tenSP}}</a></h6>
												<div class="product_price">{{number_format($sanpham->gia)}} VNĐ</div>
												<span name="gia" hidden>{{$sanpham->gia}} VNĐ</span>
												<span name="id" hidden>{{$sanpham->id}}</span>
												<span name="soluong" value="1" hidden></span>
											</div>
										</div>
										<div class="red_button add_to_cart_button"><a href="{{URL::to('/chitiet/'.$sanpham->id)}}">add to cart</a></div>
									</div>
								@endforeach
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Deal of the week -->

	<div class="deal_ofthe_week">
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="deal_ofthe_week_img">
                    <img src="{{asset('public/FE/images/sale.jpg')}}" alt="">

					</div>
				</div>
				<div class="col-lg-6 text-right deal_ofthe_week_col">
					<div class="deal_ofthe_week_content d-flex flex-column align-items-center">
						<div class="section_title">
							<h2>Kết Thúc Sự Kiện</h2>
						</div>
						<ul class="timer">
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="day" class="timer_num">03</div>
								<div class="timer_unit">Day</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="hour" class="timer_num">15</div>
								<div class="timer_unit">Hours</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="minute" class="timer_num">45</div>
								<div class="timer_unit">Mins</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="second" class="timer_num">23</div>
								<div class="timer_unit">Sec</div>
							</li>
						</ul>
						<div class="red_button deal_ofthe_week_button"><a href="{{URL::to('/danhmuc')}}">shop now</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Best Sellers -->

	<div class="best_sellers">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>Cháy Hàng !!!</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="product_slider_container">
						<div class="owl-carousel owl-theme product_slider">

							<!-- Slide 1 -->
							@foreach($best_saller as $key => $banchay)
								<div class="owl-item product_slider_item">
									<div class="product-item">
										<div class="product discount">
											<div class="product_image">
										<img src="{{asset('public/FE/images/'.$banchay->hinh)}}" alt="">

											</div>
											<div class="favorite favorite_left"></div>
											<!-- <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div> -->
											<div class="product_info">
												<h6 class="product_name"><a href="{{URL::to('/chitiet/'.$sanpham->id)}}">{{$banchay->tenSP}}</a></h6>
												<div class="product_price">{{number_format($banchay->gia)}} VNĐ</div>
											</div>
										</div>
									</div>
								</div>
							@endforeach
						</div>

						<!-- Slider Navigation -->

						<div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
							<i class="fa fa-chevron-left" aria-hidden="true"></i>
						</div>
						<div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
							<i class="fa fa-chevron-right" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection