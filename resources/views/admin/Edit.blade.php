
@extends('admin_layout')
@section('admin_content')
<div style=" width: 400px; margin: auto;">
@if(session('edit'))
	<h6 class="alert alert-success"> {{session('edit')}}</h6>
@endif
	<form action="{{URL::to('/edit')}}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
    	<input type="hidden" class="form-control" value="{{$sp->id}}" name="id" require="">

		<label for="tensp" class="mr-sm-2">Tên sản phẩm:</label>
		<input type="text" class="form-control mb-2 mr-sm-2" value="{{$sp->tenSP}}" name="tensp" require="">
		<label for="gia" class="mr-sm-2">Giá bán (VNĐ):</label>
		<input type="number" class="form-control" value="{{$sp->gia}}" name="gia" require="">
		<label for="sl" class="mr-sm-2">Số lượng:</label>
		<input type="number" class="form-control mb-2 mr-sm-2" value="{{$sp->soLuong}}" name="sl" require="">
		<label for="loaisp" class="mr-sm-2">Loại sản phẩm:</label>
		<select class="form-control" name="loaisp">
        <option value="{{$sp->loaiSP}}">{{$loai->tenLoaiSP}}</option>
		@foreach($ds_loai as $key=>$danhmuc)
			<option value="{{$danhmuc->id}}">{{$danhmuc->tenLoaiSP}}</option>
		@endforeach
		</select>

        <div class="row" style="margin-top:10px;">
            <div class="col-sm-8">
                <label for="hinh" class="mr-sm-2">Hình ảnh:</label>
                <input type="file" class="form-control mb-2 mr-sm-2" value="" name="file" require="">
                
                
            </div>
            <div class="col-sm-2">
                <img src="{{asset('public/FE/images/'.$sp->hinh)}}" height = "80px" alt="">

            </div>
        </div>

		<input type="submit" class="btn btn-primary mb-2 " value="Sửa" name="edit" style="margin:10px;float:right;">
	</form>

</div>


@endsection