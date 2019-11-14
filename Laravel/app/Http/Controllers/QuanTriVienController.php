<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\QuanTriVien;
class QuanTriVienController extends Controller
{
    public function dangNhap()
    {
    	return view('dang-nhap.login');
    }
    public function xuLyDangNhap(Request $request)
    {
    	$ten_dang_nhap = $request->tai_khoan;
    	$mat_khau = $request->mat_khau;

    	if(Auth::attempt(['ten_dang_nhap' => $ten_dang_nhap,'password' => $mat_khau]))
    	{
    		 return redirect()->route('trang-chu');
    	}
		return "Đăng nhập thất bại";

    	/*kiem tra tk va mat khau
    	$check = QuanTriVien::where('ten_dang_nhap',$ten_dang_nhap)->first();
    	if($check == null)
    	{
    		return "Sai tên tài khoản";
    	}
    	if(!Hash::check($mat_khau,$check->mat_khau)){
    		return "Sai mật khẩu";
    	}
    	return "Đăng nhập thành công";*/
    }
    public function layThongTin()
    {
    	$get = Auth::user();
        return $get;
    }
    public function dangXuat()
    {
    	Auth::logout();
    	return redirect()->route('dang-nhap');
    }
}
