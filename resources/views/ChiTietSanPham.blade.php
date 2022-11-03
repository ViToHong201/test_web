@extends('layout')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('public/FE/styles/single_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/FE/styles/single_responsive.css')}}">

<div class="container single_product_container">
		<div class="row">
			<div class="col">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="{{URL::to('/')}}">Trang Chủ</a></li>
						<li><a href="{{URL::to('/danhmuc')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>Danh Mục</a></li>
						<li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i>Chi Tiết</li>
					</ul>
				</div>

			</div>
		</div>
	<form method="get" action="{{URL::to('/addcart')}}">
		<div class="row">
		@foreach($all_product as $key => $sanpham)
		
			<div class="col-lg-7">
				<div class="single_product_pics">
					<div class="row">
						<div class="col-lg-9 image_col order-lg-2 order-1">
							<div class="single_product_image">
								<div class="single_product_image_background" style="background-image:url({{asset('public/FE/images/'.$sanpham->hinh)}})"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="product_details">
					<div class="product_details_title">
						<h2>{{$sanpham->tenSP}}</h2>
					</div>
					
					<div class="product_price">{{number_format($sanpham->gia)}} VNĐ</div>
					
					<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
						<span>Quantity:</span>
						<div class="quantity_selector">
							<span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
							<input name="soluong" id="quantity_value" value="1" style="width:30px;height:36px;border: none;text-align: center;font-size: 20px;">
							<span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
						</div>
						<span style="margin-left: auto;">Còn: {{$sanpham->soLuong}} sản phẩm</span>

					</div>
					@if(Session::get('soluong'))
						<div class="alert alert-danger" style="margin: 20px 0px auto;">
							<strong>Hết Hàng 😓 :</strong> Vui lòng giảm số lượng mua 🤗
						</div>
					@endif
					<input type="submit" class="red_button free_delivery d-flex flex-row align-items-center justify-content-center" style = "color:#FFF; background-color: black; width: -webkit-fill-available;" value="Thêm Vào Giỏ Hàng">
				</div>
			</div>
			<?php
			Session::put('tam',$sanpham->id);
			?>
			@endforeach
		</div>
	</form>
	</div>

@endsection('content')