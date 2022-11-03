<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Fontend
Route::get('/', 'SanPhamController@get_Best_Seller');
Route::get('/chitiet/{maSP}','SanPhamController@get_Product');
Route::get('/danhmuc','SanPhamController@get_All_Product');
Route::get('/danhmuc/{tenLoaiSP}','SanPhamController@filter_category');


Route::get('/lienhe', function () {
    return view('LienHe');
});


Route::get('/giohang','GioHangController@get_Cart');
Route::get('/addcart','GioHangController@add_Cart');
Route::get('/removecart/{id}','GioHangController@remove_Cart');


Route::get('/login','KhachHangController@get_login');
Route::post('/login','KhachHangController@post_login');

Route::get('/register','KhachHangController@get_register');
Route::post('/register','KhachHangController@post_register');
Route::get('/logout','KhachHangController@logout');
Route::get('/addbill','KhachHangController@add_Bill');

// Backend
Route::get('/admin','AdminController@admin_login');
Route::post('/admin/dashboard','AdminController@check_admin');
Route::get('/admin/dashboard','AdminController@index');
Route::get('/addproduct','AdminController@add_Product');
Route::post('/addproduct','AdminController@post_add_Product');
Route::get('/edit/{id}','AdminController@Edit_Product');
Route::post('/edit','AdminController@post_Edit_Product');
Route::get('/logoutadmin','AdminController@logout');
Route::get('/baocao','AdminController@Bao_Cao');
Route::get('/delete/{id}','AdminController@Delete');


