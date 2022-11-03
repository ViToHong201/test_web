<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class AdminController extends Controller
{
   public function admin_login()
   {
    return view('admin.admin_login');
   }


     public function index()
    {
        if(Session::get('ten_quan_ly')){
            $all_product = DB::table('loaisanpham')->join('sanpham','sanpham.loaiSP','=','loaisanpham.id')->get();
            $all_category = DB::table('loaisanpham')->get();
            
            return view('admin.home_admin')->with('all_product',$all_product)->with('all_category',$all_category);
        }
    return view('admin.admin_login');
        
    }

    public function Edit_Product($id){

        $sp = DB::table('sanpham')->where('id',$id)->first();
        $loai = DB::table('loaisanpham')->where('id',$sp->loaiSP)->first();
        $ds_loai = DB::table('loaisanpham')->get();
       
        return view('admin.Edit')->with('sp',$sp)->with('ds_loai',$ds_loai)->with('loai',$loai);
    }

    public function logout(){
        session()->flush();
        return Redirect::to('/admin');
    }


   public function check_admin(Request $request){
	
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = DB::table('quanly')->where('username',$username)->where('password',$password)->first();
    Session::put('admin',$result);
    if($result==null){
        Session::put('thong_bao','Tài khoản hoặc mật khẩu không đúng !!!');
        return view('admin.admin_login');
    }
    else{
        $all_product = DB::table('sanpham')->join('loaisanpham','sanpham.loaiSP','=','loaisanpham.id')->get();
        $all_category = DB::table('loaisanpham')->get();
        Session::put('ten_quan_ly',$result->tenQL);
        Session::put('ma_quan_ly',$result->id);
        return view('admin.home_admin')->with('all_product',$all_product)->with('all_category',$all_category);
    }
   }


    public function add_Product(){
    
        $all_product_category = DB::table('loaisanpham')->get();

     return view('admin.AddProduct')->with('danhmuc',$all_product_category);
    }

    public function post_add_Product(Request $request){
        $ten = $request->tensp;
        $gia = $request->gia;
        $soluong= $request->sl;
        $loaisp = $request->loaisp;

        $hinh = $request->file('file');

        $getnameimg = $hinh->getClientOriginalExtension();
        // $nameimg = current(explode('.',$getnameimg));
        $newimg = time().'.'.$getnameimg; 
        $hinh->move('public/FE/images',$newimg);
        // $hinh->move('FE/images',$hinh->getClientOriginalName());

        $t= DB::table('sanpham')->insert(['tenSP'=>$ten,'gia'=>$gia,'soLuong'=>$soluong,'loaiSP'=>$loaisp,'hinh'=>$newimg]);
        return redirect()->back()->with('status','Thêm Thành Công');
    }

    public function post_Edit_Product(Request $request){
        $id = $request->id;
        $ten = $request->tensp;
        $gia = $request->gia;
        $soluong= $request->sl;
        $loaisp = $request->loaisp;

        $hinh = $request->file('file');
        if($hinh){
            $getnameimg = $hinh->getClientOriginalExtension();
            $newimg = time().'.'.$getnameimg; 
            $hinh->move('public/FE/images',$newimg);
            $t= DB::table('sanpham')->where('id',$id)->update(['tenSP'=>$ten,'gia'=>$gia,'soLuong'=>$soluong,'loaiSP'=>$loaisp,'hinh'=>$newimg]);
        }
        else{
            $t= DB::table('sanpham')->where('id',$id)->update(['tenSP'=>$ten,'gia'=>$gia,'soLuong'=>$soluong,'loaiSP'=>$loaisp]);
        }
        // $sp = DB::table('sanpham')->where('id',$id)->first();
        // $loai = DB::table('loaisanpham')->where('id',$sp->loaiSP)->first();
        // $ds_loai = DB::table('loaisanpham')->get();
       
        return Redirect::to('/edit/'.$id)->with('edit','Sửa Thành Công');
    }

    public function Bao_Cao(){

        $hoadon = DB::table('khachhang')->join('hoadon','khachhang.id','=','hoadon.maKH')->whereDate('ngayMua',date("Y/m/d"))->get();

        return view('admin.BaoCao')->with('hoadon',$hoadon);
    }

    public function Delete($id){

        $sp= DB::table('sanpham')->where('id',$id)->first();
       
         DB::table('sanpham')->where('id',$id)->delete();

        return redirect()->back()->with('delete','Đã Xóa Sản Phẩm '.$sp->tenSP.' Thành Công');
    }

}
