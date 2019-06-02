<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use App\LoaiTin;
use App\TheLoai;
use App\Http\Requests\RequestThemTinTuc;
use App\Http\Requests\RequestSuaTinTuc;
class tintucController extends Controller
{
    public function getDanhsach(){
    	// $tintuc = TinTuc::all(); 
        $tintuc = TinTuc::paginate(5);
        // $tintuc = ::table('tintuc')->paginate(15);

        // return view('user.index', ['users' => $users]);
	
    	return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }
     public function getThem(){
     	$tintuc = TinTuc::all();
     	$loaitin = LoaiTin::all();
     	$theloai = TheLoai::all();
    	return view('admin.tintuc.them',['tintuc'=>$tintuc,'loaitin'=>$loaitin,'theloai'=>$theloai]);
    }
    public function postThem(RequestThemTinTuc $request){
        $tintuc = new TinTuc;
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = slug($request->TieuDe);
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        $tintuc->NoiBat = $request->NoiBat;
        $tintuc->SoLuotXem =0;
        if($request->hasFile('Hinh')){
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi !="jpg" && $duoi !="png" && $duoi!= "jpeg") {
                return redirect('admin/tintuc/them')->with('loi',"Bạn chỉ được chọn file có đuôi là: jpg, png, jpeg.");
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(5)."_".$name;
            // tránh trường hợp trùng lặp hình
            // while(file_exists("upload/tintuc/"+$hinh)){
            //     $hinh = str_random(5)."_".$name;
            // }
            // lưu hình
            $file->move("upload/tintuc",$hinh);
            $tintuc->Hinh = $hinh;
        }
        else{
            $tintuc->Hinh ="";
        }
        $tintuc->save();

        return redirect('admin/tintuc/them')->with('thongbao',"Thêm tin thành công.");
    }
    public function getSua($id){
        $tintuc = TinTuc::find($id);
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
    	return view('admin.tintuc.sua',['tintuc'=>$tintuc,'theloai'=>$theloai,'loaitin'=>$loaitin]);
    }
     public function postSua(RequestSuaTinTuc $request,$id){
        $tintuc = TinTuc::find($id);
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = slug($request->TieuDe);
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        $tintuc->NoiBat = $request->NoiBat;
     
        if($request->hasFile('Hinh')){
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi !="jpg" && $duoi !="png" && $duoi!= "jpeg") {
                return redirect('admin/tintuc/them')->with('loi',"Bạn chỉ được chọn file có đuôi là: jpg, png, jpeg.");
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(5)."_".$name;
            // tránh trường hợp trùng lặp hình
            // while(file_exists("upload/tintuc/"+$hinh)){
            //     $hinh = str_random(5)."_".$name;
            // }
            // lưu hình
            $file->move("upload/tintuc",$hinh);
            // unlink("upload/tintuc/".$tintuc->Hinh);// xóa file hình cũ
            $tintuc->Hinh = $hinh;
        }
       
        $tintuc->save();

        return redirect('admin/tintuc/sua/'.$id)->with('thongbao',"Sửa tin thành công.");
    }

    public function getXoa($id){
        $tintuc = TinTuc::find($id);
        $tintuc-> delete();
        return redirect("admin/tintuc/danhsach")->with('thongbao','Xóa tin thành công.');
    }
   
}
