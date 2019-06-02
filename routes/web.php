	<?php

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
use App\TinTuc;
use App\LoaiTin;
use App\TheLoai;
Route::get('/', function () {
    return view('welcome');
});
Route::get('thu',function(){
	$loaiTin = LoaiTin::find(1);
	echo $loaiTin->Ten;
});
// Thể loại có id = 1 có những loại tin gì
// test

Route::get('test',function(){
	return view('admin.theloai.danhsach');
});
// end-test

// đăng nhập
Route::get('admin/dangnhap','userController@getDangnhapAdmin');
Route::post('admin/dangnhap','userController@postDangnhapAdmin')->name('loginDangNhap');
// logout
Route::get('admin/dangxuat','userController@getDangXuatAdmin');
Route::group(['prefix'=>'admin','middleware'=>'loginMiddleware'],function(){
	Route::group(['prefix'=>'loaitin'],function(){
		Route::get('danhsach','loaitinController@getDanhsach');
		Route::get('sua/{id}','loaitinController@getSua');
		Route::post('sua/{id}','loaitinController@postSua');
		Route::get('them','loaitinController@getThem');
		Route::post('them','loaitinController@postThem')->name('themLoaiTin');
		Route::get('xoa/{id}','loaitinController@getXoa');
	});
	Route::group(['prefix'=>'theloai'],function(){
		Route::get('danhsach','theloaiController@getDanhsach');
		Route::get('sua/{id}','theloaiController@getSua');
		Route::post('sua/{id}','theloaiController@postSua');
		Route::get('them','theloaiController@getThem');
		Route::post('them','theloaiController@postThem')->name('themTheLoai');
		Route::get('xoa/{id}','theloaiController@getXoa');
	});
	Route::group(['prefix'=>'tintuc'],function(){
		Route::get('danhsach','tintucController@getDanhsach');
		Route::get('sua/{id}','tintucController@getSua');
		Route::post('sua/{id}','tintucController@postSua');
		Route::get('them','tintucController@getThem');
		Route::post('them','tintucController@postThem')->name('themTinTuc');
		Route::get('xoa/{id}','tintucController@getXoa');
	});
	Route::group(['prefix'=>'slide'],function(){
		Route::get('danhsach','slideController@getDanhsach');
		Route::get('sua/{id}','slideController@getSua');
		Route::post('sua/{id}','slideController@postSua');
		Route::get('them','slideController@getThem');
		Route::post('them','slideController@postThem')->name('themSlide');
		Route::get('xoa/{id}','slideController@getXoa');
	});
	Route::group(['prefix'=>'user'],function(){
		Route::get('danhsach','userController@getDanhsach');
		Route::get('them','userController@getThem');
		Route::post('them','userController@postThem')->name('themUser');
		Route::get('sua/{id}','userController@getSua');
		Route::post('sua/{id}','userController@postSua')->name('suaUser');
		Route::get('xoa/{id}','userController@getXoa');
	});
	// tạo nhóm route cho ajax
	Route::group(['prefix'=>'ajax'],function(){
		Route::get('loaitin/{idTheLoai}','ajaxController@getLoaiTin');
	});
	//comment
	Route::group(['prefix'=>'comment'],function(){
		Route::get('xoa/{idComment}','commentController@xoaComment');
	});
});

Route::get('trangchu','PagesController@trangchu');
Route::get('lienhe','PagesController@lienhe');
Route::get('chitiet/{idTin}/{TieuDeKhongDau}.html','PagesController@chitiet');

Route::get('loaitin/{idLoaiTin}/{TenKhongDau}.html','PagesController@loaitin');

// đăng nhập
Route::get('dangnhap','PagesController@getDangNhapUser');
Route::post('dangnhap','PagesController@postDangNhapUser')->name('loginTrangChu');
// đăng xuất
Route::get('dangxuat','PagesController@getDangXuatUser');
// Đăng ký

Route::get('dangky','PagesController@getDangKyUser');
Route::post('dangky','PagesController@postDangKyUser')->name('xuLyDangKy');
// bình luận
Route::get('binhluan','commentController@getComments');
Route::post('binhluan/{id}','commentController@postComments');
Route::post('timkiem','PagesController@timKiem');