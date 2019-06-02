<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\RequestComments;
use App\Comment;
use App\TinTuc;
class commentController extends Controller
{
    public function xoaComment($id){
    	$comment = Comment::find($id);
    	$comment->delete();
    	return redirect("admin/tintuc/sua/".$id)->with('thongbao','Xóa comment thành công.');
    }
    public function postComments($id,RequestComments $request){
    	$idTinTuc = $id;
    	$tintuc = TinTuc::find($id);
    	$comment = new Comment;
    	$comment->idUser = Auth::user()->id;
    	$comment->idTinTuc = $idTinTuc;
    	$comment->NoiDung = $request->NoiDung;
    	$comment->save();
    	return redirect("chitiet/$id/".$tintuc->TieuDeKhongDau.".html")->with('thongbao','Viết bình luận thành công.');
    }
}
