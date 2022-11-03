@extends('layout')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('public/FE/styles/categories_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/FE/styles/categories_responsive.css')}}">


	<div class="container product_section_container">
		<div class="row">
			<div class="col product_section clearfix">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="{{URL::to('/')}}">Trang Chủ</a></li>
						<li class="active"><a href="{{URL::to('/danhmuc')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>Danh Mục</a></li>
					</ul>
				</div>

				<!-- Sidebar -->

				<div class="sidebar">
					<div class="sidebar_section">
						<div class="sidebar_title">
							<h5>Loại Sản Phẩm</h5>
						</div>
						<ul class="sidebar_categories">
							<li class="active"><a href="{{URL::to('/danhmuc')}}" name="loaiSP" value ="0"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>Tất Cả</a></li>
							@foreach($all_category as $key => $loaisanpham)
								<li><a href="{{URL::to('/danhmuc/'.$loaisanpham->tenLoaiSP)}}" name="loaiSP" value ="{{$loaisanpham->tenLoaiSP}}">{{$loaisanpham->tenLoaiSP}}</a></li>
							@endforeach
						</ul>
					</div>

					<!-- Price Range Filtering -->
					<div class="sidebar_section">
						<div class="sidebar_title">
							<h5>Lọc Theo Giá</h5>
						</div>
						<p>
							<input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
						</p>
						<div id="slider-range"></div>
						<div class="filter_button"><span>Lọc</span></div>
					</div>

					

				</div>

				<!-- Main Content -->

				<div class="main_content">

					<!-- Products -->

					<div class="products_iso">
						<div class="row" style="margin-right: 30px;">
							<div class="col">

								<!-- Product Sorting -->

								<div class="product_sorting_container product_sorting_container_top">
									<ul class="product_sorting">
										<li>
											<span class="type_sorting_text">Default Sorting</span>
											<i class="fa fa-angle-down"></i>
											<ul class="sorting_type">
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default Sorting</span></li>
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Product Name</span></li>
											</ul>
										</li>
										<li>
											<span>Show</span>
											<span class="num_sorting_text">All</span>
											<i class="fa fa-angle-down"></i>
											<ul class="sorting_num">
												<li class="num_sorting_btn"><span>6</span></li>
												<li class="num_sorting_btn"><span>12</span></li>
											</ul>
										</li>
									</ul>
									<div class="pages d-flex flex-row align-items-center">
										<div class="page_current">
											<span>1</span>
											<ul class="page_selection">
												<li><a href="#">1</a></li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
											</ul>
										</div>
										<div class="page_total"><span>of</span> 3</div>
										<div id="next_page" class="page_next"><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
									</div>

								</div>

	
								<!-- Product Grid -->

								<div class="product-grid">
									@if(Session::get('loc'))
										
										@foreach($all_product_category as $key => $sanpham)
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
														<span class="product_price1" hidden>{{$sanpham->gia}} VNĐ</span>
														<span class="product_price2" value="{{$sanpham->loaiSP}}" hidden></span>
													</div>
												</div>
												<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
											</div>
										@endforeach
									
									@else
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
												<span class="product_price1" hidden>{{$sanpham->gia}} VNĐ</span>
												<span class="product_price2" value="{{$sanpham->loaiSP}}" hidden></span>
											</div>
										</div>
										<div class="red_button add_to_cart_button"><a href="{{URL::to('/chitiet/'.$sanpham->id)}}">add to cart</a></div>
									</div>
									@endforeach
								
								@endif
								</div>

								<!-- Product Sorting -->

								<div class="product_sorting_container product_sorting_container_bottom clearfix">
									<div class="pages d-flex flex-row align-items-center">
										<div class="page_current">
											<span>1</span>
											<ul class="page_selection">
												<li><a href="#">1</a></li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
											</ul>
										</div>
										<div class="page_total"><span>of</span> 3</div>
										<div id="next_page_1" class="page_next"><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
									</div>

								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



@endsection