<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Login :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/BE/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/BE/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/BE/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/BE/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/BE/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="{{asset('public/BE/js/jquery2.0.3.min.js')}}"></script>
</head>
<body style="background-image:url(public/FE/images/banner2.webp);">
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Đăng Ký</h2>
	<?php
	$thong_bao = Session::get('thong_bao');
	if($thong_bao){
		echo '<span class="thong_bao">'.$thong_bao.'</span>';
		Session::put('thong_bao',null);
	} 
	?>
		<form action="{{URL::to('/register')}}" method="post">
			{{ csrf_field() }}
			<input type="text" class="ggg" name="ten" placeholder="Họ Tên" required="">
			<input type="munber" class="ggg" name="sdt" placeholder="Số Điện Thoại" >
			<input type="date" class="ggg" name="ngaysinh" required="">
            <label class="ggg" for="gioitinh">Giới Tính</label>
            <select class="ggg" id="gioitinh" >
                <option value="1">Nam</option>
                <option value="0">Nữ</option>
            </select>
			<input type="text" class="ggg" name="username" placeholder="Tài Khoản" required="">
			<input type="password" class="ggg" name="password" placeholder="Mật Khẩu" required="">
			<input type="password" class="ggg" name="re_password" placeholder="Nhập lại mật Khẩu" required="">
				<div class="clearfix"></div>
				<input type="submit" value="Đăng Ký" name="register">
		</form>
</div>


</div>
<script src="{{asset('public/BE/js/bootstrap.js')}}"></script>
<script src="{{asset('public/BE/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/BE/js/scripts.js')}}"></script>
<script src="{{asset('public/BE/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/BE/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('public/BE/js/jquery.scrollTo.js')}}"></script>
</body>
</html>
