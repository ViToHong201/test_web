
@extends('layout')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset('public/FE/styles/giohang.css')}}">

  <main>
   
    <div class="basket">
      
      <div class="basket-labels">
        <ul>
          <li class="item item-heading">Item</li>
          <li class="price">Price</li>
          <li class="quantity">Quantity</li>
          <li class="subtotal">Subtotal</li>
        </ul>
      </div>
      
      @if($cart != null)
        @foreach($cart as $k=>$sanpham)

            <div class="basket-product">
            <div class="item">
              <div class="product-image">
                <img src="{{asset('public/FE/images/'.$sanpham['hinh'])}}" alt="Placholder Image 2" class="product-frame">
              </div>
              <div class="product-details">
                <h1><strong><span class="item-quantity">{{$sanpham['tensanpham']}}</span></strong></h1>
                
              </div>
            </div>
            <div class="price">{{number_format($sanpham['gia'])}} VNĐ</div>
            <div class="quantity">
              <input type="number" value="{{$sanpham['soluongmua']}}" min="1" class="quantity-field">
            </div>
            <div class="subtotal text-danger">{{number_format($sanpham['gia']*$sanpham['soluongmua'])}} VNĐ</div>
            <div class="remove">
              <a class="btn" href="{{URL::to('/removecart/'.$sanpham['id'])}}">Xóa Khỏi Giỏ Hàng</a>
            </div>
          </div>
        @endforeach


      @else
          <div class="jumbotron text-danger">
              <h2 class="text-danger">Chưa Có Sản Phẩm Nào Trong Giỏ Hàng</h2>
              <a class="btn btn-info text-light" href="{{URL::to('/danhmuc')}}">Mua Sắm Thôi !!!</a>
            </div>
      @endif
     
  
  
     
    </div>
    <aside>
      <div class="summary">
        <div class="summary-total-items"><span class="total-items"></span> Items in your Bag</div>
        <div class="summary-subtotal">
          <div class="subtotal-title">Subtotal</div>
            <?php 
            $tongTien =  Session::get('tongGioHang'); 
            echo'<div class="subtotal-value final-value" id="basket-subtotal">'.number_format($tongTien). ' VNĐ </div>' 
            ?>
          <div class="summary-promo hide">
            <div class="promo-title">Promotion</div>
            <div class="promo-value final-value" id="basket-promo"></div>
          </div>
        </div>
        <div class="summary-delivery">
          <select name="delivery-collection" class="summary-delivery-selection">
              <option value="0" selected="selected">Select Collection or Delivery</option>
             <option value="collection">Collection</option>
             <option value="first-class">Royal Mail 1st Class</option>
             <option value="second-class">Royal Mail 2nd Class</option>
             <option value="signed-for">Royal Mail Special Delivery</option>
          </select>
        </div>
        <div class="summary-total">
          <div class="total-title">Total</div>
          <?php 
            $tongTien =  Session::get('tongGioHang'); 
            echo'<div class="total-value final-value" id="basket-total">'.number_format($tongTien). ' VNĐ </div>' 
            ?>
        </div>
        <div class="summary-checkout">
          @if($tongTien!=null)
          <button type="button" class="checkout-cta btn btn-primary" data-toggle="modal" data-target="#myModal">Thanh Toán</button>
          @else
          <button type="button" class="checkout-cta btn btn-primary" data-toggle="modal" data-target="#myModal" disabled = true> Thanh Toán</button>
          @endif
          <!-- <button class="checkout-cta">Thanh Toán</button> -->
        </div>
      </div>
    </aside>
    <style>
              .bg{
                background-color:aliceblue;
              }
              .modal-header .close{
                margin:unset !important;
              }
              .none{
                border-style: none;
                background-color:aliceblue !important;

              }
              .inline{
                display: inherit;
                margin-left: 208px;
              }
              .inline input{
               color:red;
              }
            </style>
        <!-- The Modal -->
      <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title" style="margin:auto;">Hóa Đơn</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            
            <!-- Modal body -->
            <div class="modal-body bg">
              <?php 
                $user = Session::get('user');
              
              ?>
              <form method="get" action="{{URL::to('/addbill')}}"  class="form-inline" > 
                      <lable class=" none form-control" for="tenKH">Tên KH:</lable>
                      <input type="text" class="none form-control" name="tenKH" value="{{$user->tenKH}}" disabled = true >
                      <lable class="none form-control" for="id"> Mã KH:</lable>
                      <input type="text" class="none form-control"  name="id"  value="{{$user->id}}" style="width:50px"  disabled = true>

                      <h6 style="margin: auto;">---------------------- Danh sách sản phẩm ----------------------</h6>
                      @if(Session::get('cart')!=null)
                        @foreach(Session::get('cart') as $key=>$sanpham)
                        <div class="form-inline">
                          <lable class=" none form-control" for="sp">-</lable>
                          <input type="text" class="none form-control"  name="sp"  value="{{$sanpham['tensanpham']}}"  disabled = true>
                          <lable class=" none form-control" for="sp">Số lượng: {{$sanpham['soluongmua']}}</lable>
                        </div>
                        @endforeach
                        <div class="inline">
                          <lable class=" none form-control" for="total">Total:</lable>
                          <input type="text" class="none form-control"  name="total"  value="{{number_format($tongTien)}} VNĐ"  disabled = true>
                        </div>
                      @endif
                    <div class="modal-footer">
                      <input type="submit"  class="btn btn-info" name="thanhtoan"  value="Thanh Toán">
                    </div>

              </form>
            </div>
            
            <!-- Modal footer -->
            
            
          </div>
        </div>
      </div>
  </main>

  

<script src="{{asset('public/FE/js/giohang.js')}}"></script>

@endsection