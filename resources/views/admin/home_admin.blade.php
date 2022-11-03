
@extends('admin_layout')
@section('admin_content')

<style>
	.fill{
		height: 80px;
    	object-fit: fill;
	}
</style>
<div id="accordion" >	
	@if(Session::get('delete'))
	<div class=" mt-3" style="position: fixed;top: 100px;right: 32px;width:316px;">

         <div class="alert alert-info  alert-dismissible">
            <h5>Thông Báo!</h5> <br>{{Session::get('delete')}}
            <button type="button" class="close"style="position: fixed;top: 110px;right: 50px;" data-dismiss="alert" aria-label="Close">&times;</button>
         </div>
		 {{Session::put('delete',null)}}
	</div>
	@endif
	@foreach($all_product as $key=>$sanpham)
	@if($sanpham->soLuong==0)
	<section class="wrapper1" style="background-color:aqua;">
		
		<div class="row" >
			<div class="col-md-2"><img class="fill" src="{{asset('public/FE/images/'.$sanpham->hinh)}}" alt=""></div>
			<div class="col-md-4">
				<p>Tên SP:&emsp;&emsp;&emsp; {{$sanpham->tenSP}}</p>
				<p>Loại SP:&emsp;&emsp;&emsp;{{$sanpham->tenLoaiSP}}</p>
				<p>Giá Bán:&emsp;&emsp;&emsp;{{number_format($sanpham->gia)}} VNĐ</p>
				<p>Số Lượng Tồn:&emsp;{{$sanpham->soLuong}}</p>
			</div>
			<div class="col-md-4">
				<div class="col-sm-2">
					<a href="{{URL::to('edit/'.$sanpham->id)}}" class="btn btn-info">Edit</a>

				</div>
				<div class="col-sm-8">
					<a href="#{{$sanpham->id}}" class="btn btn-danger" data-toggle="collapse">Delete</a>
					<div id="{{$sanpham->id}}" class="collapse" data-parent="#accordion">
						Bạn có chắc muốn xóa sản phẩm này chứ ?
						<div class="row">
							<a href="#{{$sanpham->id}}" data-toggle="collapse" class="btn btn-danger">Hủy</a>
							<a href="{{URL::to('/delete/'.$sanpham->id)}}" class="btn btn-success">Đồng Ý</a>

						</div>

					</div>
				</div>

			</div>
		</div>
	</section>
	@else
	<section class="wrapper1">
		
		<div class="row" >
			<div class="col-md-2"><img class="fill" src="{{asset('public/FE/images/'.$sanpham->hinh)}}" alt=""></div>
			<div class="col-md-4">
				<p>Tên SP:&emsp;&emsp;&emsp; {{$sanpham->tenSP}}</p>
				<p>Loại SP:&emsp;&emsp;&emsp;{{$sanpham->tenLoaiSP}}</p>
				<p>Giá Bán:&emsp;&emsp;&emsp;{{number_format($sanpham->gia)}} VNĐ</p>
				<p>Số Lượng Tồn:&emsp;{{$sanpham->soLuong}}</p>
			</div>
			<div class="col-md-4">
				<div class="col-sm-2">
					<a href="{{URL::to('edit/'.$sanpham->id)}}" class="btn btn-info">Edit</a>

				</div>
				<div class="col-sm-8">
					<a href="#{{$sanpham->id}}" class="btn btn-danger" data-toggle="collapse">Delete</a>
					<div id="{{$sanpham->id}}" class="collapse" data-parent="#accordion">
						Bạn có chắc muốn xóa sản phẩm này chứ ?
						<div class="row">
							<a href="#{{$sanpham->id}}" data-toggle="collapse" class="btn btn-danger">Hủy</a>
							<a href="{{URL::to('/delete/'.$sanpham->id)}}" class="btn btn-success">Đồng Ý</a>

						</div>

					</div>
				</div>
				

			</div>
		</div>
	</section>
	@endif
	<hr style="height:2px;border-width:0;color:gray;background-color:gray;margin:5px auto;">
	@endforeach
</div>
	<!-- <img class="card-img-top" src="{{asset('public/BE/images/bg.jpg')}}" alt="Card image cap">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a> -->

@endsection