<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theloai;
use App\Slide;
use App\TinTuc;
use App\LoaiTin;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RequestDangKyUser;

class PagesController extends Controller
{
	public function __construct(){
		$theloai = TheLoai::all();
		$slide = Slide::all();
    $tintuc = TinTuc::all();
    $loaitin = LoaiTin::all();
		view()->share('theloai',$theloai);
		view()->share('slide',$slide);
    view()->share('tintuc',$tintuc);
    view()->share('loaitin',$loaitin);
    
	}
  public function trangchu(){
    // $tintuc = TinTuc::all();
 		return view('pages.trangchu');
  }
  public function lienhe(){
  	
 		return view('pages.lienhe');
  	
  }
  public function chitiet($idTin){
    $find_tintuc = TinTuc::find($idTin);
    $post = TinTuc::find($idTin); // fetch post from database
    $post->increment('SoLuotXem'); // add a new page view to our `views` column by incrementing it
    // return view('pages.chitiet', ['post' => $post]);

   
    $comment = Comment::where('idTinTuc',$idTin)->paginate(3);

    // return view('pages.chitiet',['tintuc'=>$tintuc]);
    return view('pages.chitiet',['find_tintuc'=>$find_tintuc,'comment'=>$comment,'post' => $post]);
  }
  
  public function loaitin($idLoaiTin){
    $find_loaiTin = LoaiTin::find($idLoaiTin);
    $tintuc = TinTuc::where('idLoaiTin',$idLoaiTin)->paginate(3);
    return view('pages.loaitin',['find_loaiTin'=>$find_loaiTin,'tintuc'=>$tintuc]);
  }

  public function getDangNhapUser(){
    return view('pages.login');
  }
  public function postDangNhapUser(Request $request){
      $user_Login = $request->only('email','password');
      if(Auth::attempt($user_Login)){
          
         return redirect('trangchu');
        
      }
      else{
          return redirect('dangnhap')->with('thongbao',"Sai tài khoản hoặc mật khẩu.");
      }
      // return view('admin.user.them');
  }

  public function getDangXuatUser(){
      Auth::logout();
      return redirect('trangchu');
      
  }
  public function getDangKyUser(){
    return view('pages.dangky');
  }
  public function postDangKyUser(RequestDangKyUser $request){
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->passwordAgain = bcrypt($request->passwordAgain);
    $user->level = 0;
    $user->comment_id= 0;
    $user->save();
    return redirect('dangky')->with('thongbao','Đăng Ký Thành Công!');

  }
  public function timKiem(Request $request){
    $tukhoa = $request->tukhoa;
    $tintuc = TinTuc::where('TieuDe','like',"%$tukhoa%")->orWhere('TomTat','like',"%$tukhoa%")->take(40)->paginate(4);
    return view('pages.timkiem',['tintuc'=>$tintuc,'tukhoa'=>$tukhoa]);
  }

  // public function show($id){
  //   $post = TinTuc::find($id); // fetch post from database
  //   $post->increment('SoLuotXem'); // add a new page view to our `views` column by incrementing it
  //   return view('pages.chitiet', ['post' => $post]);
  // }

}

