<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\RequestThemUser;
use App\Http\Requests\RequestSuaUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Requests\LoginAdminRequest;
class userController extends Controller
{
    public function getDanhsach(){
    	$user = User::paginate(5);
    	return view('admin.user.danhsach',['user'=>$user]);
    }
    
    public function getThem(){
    	return view('admin.user.them');
    }
    public function postThem(RequestThemUser $request){
    	$user = new User;
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->passwordAgain = bcrypt($request->passwordAgain);
    	$user->level = $request->level;
    	$user->comment_id= 0;
    	$user->save();
    	return redirect('admin/user/them')->with('thongbao','Thêm user thành công.');
    }
    public function getSua($id){
    	$user = User::find($id);
    	return view('admin.user.sua',['user'=>$user]);
    }
    public function postSua(RequestSuaUser $request,$id){
    	$user = User::find($id);
    	$user->name = $request->name;
    	
    	$user->level = $request->level;
    	if(isset($request->changePassword)){
    		$this->validate($request,[
    		'password'=>'required|min:5|max:50',
            'passwordAgain'=>'required|same:password'

    		],[
 			'password.required'=>'Password không được bỏ trống',
            'password.min'=>'Password quá ngắn. Độ dài trong khoảng 5 - 50 ký tự.',
            'password.max'=>'Password quá dài. Độ dài trong khoảng 5 - 50 ký tự.',
            'passwordAgain.required'=>'passwordAgain không được bỏ trống',
            'passwordAgain.same'=>'passwordAgain không khớp với password'

    		]);
    		$user->password = bcrypt($request->password);
    		// $user->passwordAgain = bcrypt($request->passwordAgain);
    	}
    	// $user->comment_id= 0;
    	$user->save();
    	return redirect('admin/user/sua/'.$id)->with('thongbao','Sửa thành công.');
    }
    public function getXoa($id){
    	$user = User::find($id);
    	$user-> delete();
    	return redirect('admin/user/danhsach')->with('thongbao','Xóa thành công.');
    }
    public function getDangnhapAdmin(){
    	return view('admin.login');
    }
    public function postDangnhapAdmin(Request $request){
        $user_Login = $request->only('email','password');
        // if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
        if(Auth::attempt($user_Login)){
            
           return redirect('admin/user/danhsach');
            
        }
        else{
            return redirect('admin/dangnhap')->with('thongbao',"Sai tài khoản hoặc mật khẩu.");
        }
        // return view('admin.user.them');
    }

    public function getDangXuatAdmin(){
        Auth::logout();
        return redirect('admin/dangnhap');
        
    }

}
