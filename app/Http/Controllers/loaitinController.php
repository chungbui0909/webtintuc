<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;
use App\Http\Requests\RequestThemLoaiTin;
use App\Http\Requests\RequestSuaLoaiTin;
use App\Http\Controllers\Controller;
class loaitinController extends Controller
{
    public function getDanhsach(){
    	$loaitin = LoaiTin::paginate(5);
    	return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }


    public function getSua($id){
        $loaitin = LoaiTin::find($id);
        $theloai = TheLoai::all();
//,'theloai'=>$theloai
    	return view('admin.loaitin.sua',['loaitin'=>$loaitin,'theloai'=>$theloai]);
    }
    public function postSua(RequestSuaLoaiTin $request,$id){
        $loaitin = LoaiTin::find($id);
        $loaitin->Ten = $request->tenLoaiTin;
        // // echo $loaitin->Ten."<br>";
        $loaitin->TenKhongDau = slug($request->tenLoaiTin);
        $loaitin->idTheLoai = $request->id;
        // // echo  $loaitin->TenKhongDau ;
        $loaitin->save();
        return redirect('admin/loaitin/sua/'.$id)->with('thongbao','Sửa thành công.');
    }
    public function getXoa($id){
        $loaitin = LoaiTin::find($id);
        $loaitin->delete();
         return redirect('admin/loaitin/danhsach')->with('thongbao','Xóa thành công.');
    }



    public function getThem(){
        $theloai = TheLoai::all();
    	return view('admin.loaitin.them',['theloai'=>$theloai]);
    }
    public function postThem(RequestThemLoaiTin $request){
        $loaitin = new LoaiTin;     
        $loaitin->Ten = $request->tenLoaiTin;
        // // echo $loaitin->Ten."<br>";
        $loaitin->TenKhongDau = slug($request->tenLoaiTin);
        // // echo  $loaitin->TenKhongDau ;
        $loaitin->idTheLoai = $request->TheLoai;
        $loaitin->save();
        return redirect('admin/loaitin/them')->with('thongbao','Thêm thành công.');
    }
}
