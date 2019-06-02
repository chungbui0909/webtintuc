<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Http\Requests\RequestThemSlide;
use App\Http\Requests\RequestSuaTinTuc;
use App\Http\Requests\RequestSuaSlide;
class slideController extends Controller
{
    public function getDanhsach(){
    	$slide = Slide::paginate(5);
    	return view('admin.slide.danhsach',['slide'=>$slide]);
    }
   
    public function getThem(){
    	return view('admin.slide.them');
    }
    public function postThem(RequestThemSlide $request){
    	$slide = new Slide;
    	$slide->Ten = $request->TenSlide;
    	$slide->NoiDung = $request->NoiDung;
    	$slide->link = $request->Link;
    	if($request->hasFile('Hinh')){
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            $arr_duoi = array('png','jpeg','jpg');
            if(!in_array($duoi, $arr_duoi)){
                return redirect('admin/slide/them')->with('loi',"Chỉ cho phép upload đuôi ảnh ");
            }
        
            $name = $file->getClientOriginalName();
            $hinh = str_random(5).'_'.$name;
            $file->move('upload/slide',$hinh);
            $slide->Hinh = $hinh;
    	}
        $slide->save();
    	return redirect('admin/slide/them')->with('thongbao',"Thêm Slide thành công.");     
    }
     public function getSua($id){
        $slide = Slide::find($id);
        return view('admin.slide.sua',['slide'=>$slide]);
    }
    public function postSua(RequestSuaSlide $request, $id){
        $slide = Slide::find($id);
        $slide->Ten = $request->TenSlide;
        $slide->NoiDung = $request->NoiDung;
        $slide->link = $request->Link;
        if($request->hasFile('Hinh')){
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            $arr_duoi = array('png','jpeg','jpg');
            if(!in_array($duoi, $arr_duoi)){
                return redirect('admin/slide/sua/'.$id)->with('loi',"Chỉ cho phép upload đuôi ảnh ");
            }
        
            $name = $file->getClientOriginalName();
            $hinh = str_random(5).'_'.$name;
            $file->move('upload/slide',$hinh);
            $slide->Hinh = $hinh;
        }
        $slide->save();
        return redirect('admin/slide/sua/'.$id)->with('thongbao',"Sửa thành công.");     
    }
    public function getXoa($id){
        $slide = Slide::find($id);
        $slide->delete();
        return redirect('admin/slide/danhsach/')->with('thongbao',"Xóa thành công.");
    }
}
