@extends('admin_layout')
@section('admin_content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <?php 
        $doanhthu=0;
        foreach($hoadon as $key=>$hd){
            $doanhthu+=$hd->tongTien;
        }
        
        ?>
<div class="row">
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header">

                <h6>Doanh Thu Ngày {{date('d/m/Y')}}</h6>
            </div>
            <div class="card-body bg-info">
                <h2 class="">{{number_format($doanhthu)}} VNĐ</h2>
            </div>
        </div>

    </div>
    <div class="col-sm-6">
        <table class="table table-striped" style="color:black;font-weight:800">
        <thead>
        <tr>
            <th>Tên Khách Hàng</th>
            <th>Tổng Hóa Đơn</th>
            <th>Trạng Thái</th>
        </tr>
        </thead>
        <tbody>
        @foreach($hoadon as $key=>$hoaD)
        <tr>
            <td>{{$hoaD->tenKH}}</td>
            <td>{{number_format($hoaD->tongTien)}} VNĐ</td>
            <td>{{$hoaD->trangThai}}</td>
        </tr>

        @endforeach
        </tbody>
    </table>
    </div>
</div>

@endsection