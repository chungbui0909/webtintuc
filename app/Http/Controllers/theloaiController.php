<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\Http\Requests\RequestThemTheLoai;
use App\Http\Controllers\Controller;
class theloaiController extends Controller
{
    public function getDanhsach(){
    	$theloai = TheLoai::paginate(5);
    	return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }


    public function getSua($id){
        $theloai = TheLoai::find($id);
    	return view('admin.theloai.sua',['theloai'=>$theloai]);
    }
    public function postSua(Request $request,$id){
        $theloai = TheLoai::find($id);
      
        $theloai->Ten = $request->name_theloai;
        // // echo $theloai->Ten."<br>";
        $theloai->TenKhongDau = slug($request->name_theloai);
        // // echo  $theloai->TenKhongDau ;
        $theloai->save();
        return redirect('admin/theloai/sua/'.$id)->with('thongbao','Sửa thành công.');
    }
    public function getXoa($id){
        $theloai = TheLoai::find($id);
        $theloai->delete();
         return redirect('admin/theloai/danhsach')->with('thongbao','Xóa thành công.');
    }



    public function getThem(){
    	return view('admin.theloai.them');
    }
    public function postThem(RequestThemTheLoai $request){
        $theloai = new TheLoai;     
        $theloai->Ten = $request->name_theloai;
        // // echo $theloai->Ten."<br>";
        $theloai->TenKhongDau = slug($request->name_theloai);
        // // echo  $theloai->TenKhongDau ;
        $theloai->save();
        return redirect('admin/theloai/them')->with('thongbao','Thêm thành công.');
    }
}
