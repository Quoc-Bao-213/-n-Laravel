<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\QuanTriVien;
class QuanTriVienController extends Controller
{
    public function index()
    {
        $data = QuanTriVien::all();
        return view('quan-tri-vien.thong-tin', compact('data'));
    }
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
		return redirect('dang-nhap')->with('thongbao',"Sai tài khoản hoặc mật khẩu");

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
    public function edit($id)
    {
        // hiển thị form cập nhật quản trị viên
        $quanTriVien = QuanTriVien::find($id);
        return view('quan-tri-vien.cap-nhat', compact('quanTriVien'));
    }
    public function update(Request $request, $id)
    {
        // cập nhật quản trị viên vào database
        $mat_khau_cu = $request->mat_khau_hien_tai;
        $quanTriVien = QuanTriVien::find($id);
        if(Auth::attempt(['password' => $mat_khau_cu]))
        {
             $quanTriVien->mat_khau = Hash::make($request->mat_khau);
             $quanTriVien->ho_ten   = $request->ho_ten;
             $quanTriVien->save();
             return view('quan-tri-vien.thong-tin')->with('cap-nhat',"Cập nhật thành công");
        }
        else
            return view('quan-tri-vien.cap-nhat')->with('cap-nhat',"Cập nhật thất bại, mật khẩu hiện tại không đúng");
        
        
    }
}
