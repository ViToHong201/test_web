<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class SanPhamController extends Controller
{
    public function get_All_Product(){
        Session::put('loc',null);
        $all_product = DB::table('sanpham')->where('soLuong','>',0)->get();
        $all_category = DB::table('loaisanpham')->get();
        return view('DanhMuc')->with('all_product',$all_product)->with('all_category',$all_category);
    }

    
    public function get_Product($product_id){
        $all_product = DB::table('sanpham')->where('id',$product_id)->get();
        return view('ChiTietSanPham')->with('all_product',$all_product);
    }


    public function get_Best_Seller(){
        
         
        $all_product = DB::table('sanpham')->where('soLuong','>',0)->inRandomOrder()->take(10)->get();
        
        $best_seller = DB::table('sanpham')->where('soLuong','>',0)->orderby('soLuong','asc')->take(7)->get();

        return view('welcome')->with('best_saller',$best_seller)->with('all_product',$all_product);
    }

    public function filter_category($category_product_name){
        $all_product = DB::table('sanpham')->where('soLuong','>',0)->get();
        $all_category = DB::table('loaisanpham')->get();
        $all_product_category = DB::table('sanpham')->join('loaisanpham','sanpham.loaiSP','=','loaisanpham.id')->where('loaisanpham.tenLoaiSP',$category_product_name)->where('soLuong','>',0)->get();
        Session::put('loc','lọc thành công');
        return view('DanhMuc')->with('all_product_category',$all_product_category)->with('all_product',$all_product)->with('all_category',$all_category);
    }

    
}
