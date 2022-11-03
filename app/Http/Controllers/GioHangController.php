<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class GioHangController extends Controller
{
 

    public function get_Cart(){
       
        $cart = Session::get('cart');
        if($cart==null){
            Session::put('tongGioHang',null);
        }
        return view('khachhang.GioHang')->with('cart',$cart);
        
    }

    public function add_Cart(Request $request){
        $tongGioHang = 0;
        if(Session::get('user')){
  
            //lấy ID sản phẩm
            $data1 = Session::get('tam');
            

            //chuyển dữ liệu từ session sang data2
            $data2 = Session::get('cart');

           
            //lấy dữ liệu từ ID
            $info = DB::table('sanpham')->where('id',$data1)->first();
            Session::put('soluong',null);
            if($data2!=null){
                Session::put('cart',null);
                
                 //xóa dữ liệu session
                 Session::put('tongGioHang',null);
                foreach($data2 as $phantu=>$arr){

                    if($data1 == $arr['id']){   

                        $arr['soluongmua']+=$request->soluong;
                        if($info->soLuong >= $arr['soluongmua']){
                            $data = ['id'=>$arr['id'],
                            'tensanpham'=>$info->tenSP,
                            'gia'=>$info->gia,
                            'hinh'=>$info->hinh,
                            'soluongton'=>$info->soLuong,
                            'soluongmua'=> $arr['soluongmua']
                            ];
                            Session::push('cart',$data);
                        }
                        else{
                            Session::push('soluong',$arr);
                            return Redirect::to("/chitiet/{$arr['id']}");
                        }
                       

                    }
                    else{
                        
                        if($arr['soluongton'] >= $arr['soluongmua']){
                            $data = ['id'=>$arr['id'],
                                'tensanpham'=>$arr['tensanpham'],
                                'gia'=>$arr['gia'],
                                'hinh'=>$arr['hinh'],
                                'soluongton'=>$arr['soluongton'],
                                'soluongmua'=>$arr['soluongmua']
                                ];

                                Session::push('cart',$data);
                        }
                        else{
                            Session::push('soluong',$arr);
                            return Redirect::to("/chitiet/{$arr['id']}");
                        }

                    }
                    
                }
                $data3 =Session::get('cart');
                if($data3==$data2){
                    $data = ['id'=>$data1,
                                'tensanpham'=>$info->tenSP,
                                'gia'=>$info->gia,
                                'hinh'=>$info->hinh,
                                'soluongton'=>$info->soLuong,
                                'soluongmua'=>$arr['soluongmua']
                                ];

                                Session::push('cart',$data);
                }
                foreach(Session::get('cart') as $key=>$tong){
                    $tongGioHang += $tong['soluongmua']*$tong['gia']; 
                }
               
                Session::put('tongGioHang',$tongGioHang);
                return Redirect::to('/');
            }
            else{

                if($info->soLuong >= $request->soluong){
                    $tongGioHang += $request->soluong*$info->gia;
                        
                    Session::put('tongGioHang',$tongGioHang);
    
                    $data = array('0'=>['id'=>$data1,
                            'tensanpham'=>$info->tenSP,
                            'gia'=>$info->gia,
                            'hinh'=>$info->hinh,
                            'soluongton'=>$info->soLuong, 
                            'soluongmua'=>$request->soluong
                            ]);
                    Session::put('cart',$data);
                    
                    return Redirect::to('/');
                }
                else{
                    Session::push('soluong',$data1);
                    return Redirect::to("/chitiet/{$data1}");
                }
               

            }
           
        }
        else{
            return Redirect::to('/login');
        }
    }

    public function remove_Cart($id){
        $tongGioHang = 0;
        $data = Session::get('cart');
        Session::put('cart',null);
        foreach($data as $key=>$sp){
            if($sp['id'] !=  $id){   
                                
                $data1 = ['id'=>$sp['id'],
                        'tensanpham'=>$sp['tensanpham'],
                        'gia'=>$sp['gia'],
                        'hinh'=>$sp['hinh'],
                        'soluongton'=>$sp['soluongton'],
                        'soluongmua'=> $sp['soluongmua']
                        ];
                    Session::push('cart',$data1);
                 
            }
        }
            
        $data = Session::get('cart');
        Session::put('tongGioHang',null);
            if($data!=null){
                foreach($data as $key=>$tong){
                    $tongGioHang += $tong['soluongmua']*$tong['gia']; 
                }
                Session::put('tongGioHang',$tongGioHang);
            }
       

        return Redirect::to('/giohang');
    }


}
