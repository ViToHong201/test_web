<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Auth;   

session_start();

class KhachHangController extends Controller
{
    public function get_login(){
        return view('khachhang.login');
    }

    public function post_login(Request $request){
        $info = DB::table('khachhang')->where('username',$request->username)->where('password',$request->password)->first();
        if($info){
            Session::put('user', $info);
            return Redirect::to('/');
        }
        else{
            Session::put('thong_bao','Tài khoản hoặc Mật khẩu không đúng !!!');
            return Redirect::to('/login');
        }
    }

    public function get_register(){
        return view('khachhang.register');
    }

    public function post_register(Request $request){
        $username = $request->username;
        $password = $request->password;
        $re_password = $request->re_password;
        $ten = $request->ten;
        $sdt = $request->sdt;
        $ngaysinh = $request->ngaysinh;
        $gioitinh = $request->gioitinh;
        
        if($password != $re_password){
            Session::put('thong_bao','Mật khẩu nhập lại không trùng khớp !!!');
            return Redirect::to('/register');
        }

        $user = DB::table('khachhang')->where('username',$username)->first();
        if($user){
            Session::put('thong_bao','Tài khoản đã tồn tại !!!');
            return Redirect::to('/register');
        }

        $new_user = DB::table('khachhang')->insert(['tenKH'=>$ten,'ngaySinh'=>$ngaysinh,
                                                    'gioiTinh'=>$gioitinh,'sdt'=>$sdt,
                                                    'username'=>$username,'password'=>$password]);
        return Redirect::to('/login');
    }

    public function logout(){
        Session::put('user',null);
        session()->flush();
        return Redirect::to('/');
    }

    public function add_Bill(){
        $user = Session::get('user');
        $tong = Session::get('tongGioHang');
        $sanpham =Session::get('cart');
        Session::put('soluong',null);
        foreach($sanpham as $key=>$sp){
            if($sp['soluongton'] >= $sp['soluongmua']){
                DB::table('sanpham')->where('id',$sp['id'])->update(['soLuong'=>$sp['soluongton']-$sp['soluongmua']]);
            }
            else{
                Session::push('soluong',$sp);
                return Redirect::to('/giohang');
            }
        }
        DB::table('khachhang')->where('id',$user->id)->update(['soTien'=>$user->soTien-$tong]);

        DB::table('hoadon')->insert(['maKH'=>$user->id,
                                    'tongTien'=>$tong 
                                    ]);
        Session::put('user',DB::table('khachhang')->where('id',$user->id)->first());                       
        Session::put('cart',null);       
        return Redirect::to('/giohang');
    }

}
