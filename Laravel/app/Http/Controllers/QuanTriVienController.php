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
        // đổi mật khẩu quản trị viên vào database
        $mat_khau = $request->mat_khau_hien_tai;
        $quanTriVien = QuanTriVien::find($id);
        if(!Hash::check($mat_khau,$quanTriVien->mat_khau)){
            return redirect()->route('quan-tri-vien.thong-tin')->with('cap-nhat',"Cập nhật thất bại, mật khẩu hiện tại không đúng");
        }
        else
        {
            $quanTriVien->mat_khau = Hash::make($request->mat_khau_moi);
            $quanTriVien->save();
            return redirect()->route('quan-tri-vien.thong-tin')->with('cap-nhat',"Cập nhật thành công");
         }
    }
    public function editten($id)
    {
        // hiển thị form cập nhật quản trị viên
        $quanTriVien = QuanTriVien::find($id);
        return view('quan-tri-vien.doi-ten', compact('quanTriVien'));
    }
    public function doiten(Request $request, $id)
    {
        // đổi tên quản trị viên vào database
            $quanTriVien = QuanTriVien::find($id);
            $quanTriVien->ho_ten = $request->ho_ten;
            $quanTriVien->save();
            return redirect()->route('quan-tri-vien.thong-tin')->with('cap-nhat',"Cập nhật thành công");
    }
}
