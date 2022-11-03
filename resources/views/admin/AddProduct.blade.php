
@extends('admin_layout')
@section('admin_content')
<div style=" width: 400px; margin: auto;">
@if(session('status'))
	<div class=" mt-3" style="position: fixed;top: 100px;right: 32px;width:316px;">

         <div class="alert alert-info  alert-dismissible">
            <h5>Thông Báo!</h5> <br>{{session('status')}}
            <button type="button" class="close"style="position: fixed;top: 110px;right: 50px;" data-dismiss="alert" aria-label="Close">&times;</button>
         </div>
	</div>
@endif
	<form action="{{URL::to('/addproduct')}}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}

		<label for="tensp" class="mr-sm-2">Tên sản phẩm:</label>
		<input type="text" class="form-control mb-2 mr-sm-2" placeholder="Tên sản phẩm" name="tensp" require="">


		<label for="gia" class="mr-sm-2">Giá bán (VNĐ):</label>
		<input type="number" class="form-control" placeholder="Giá bán" name="gia" require="">

	
		

		<label for="sl" class="mr-sm-2">Số lượng:</label>
		<input type="number" class="form-control mb-2 mr-sm-2" placeholder="Số lượng" name="sl" require="">
		<label for="loaisp" class="mr-sm-2">Loại sản phẩm:</label>
		<select class="form-control" name="loaisp">

		@foreach($danhmuc as $key=>$danhmuc)
			<option value="{{$danhmuc->id}}">{{$danhmuc->tenLoaiSP}}</option>
		@endforeach
		</select>

		<label for="hinh" class="mr-sm-2">Hình ảnh:</label>
		<input type="file" class="form-control mb-2 mr-sm-2" placeholder="" name="file" require="">

		<input type="submit" class="btn btn-primary mb-2 " value="Thêm Mới" name="add" style="margin:10px;float:right;">
	</form>

</div>


@endsection