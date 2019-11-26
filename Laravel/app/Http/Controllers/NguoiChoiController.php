<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NguoiChoi;
use App\Http\Requests\ThemNguoiChoiRequest; 
use Illuminate\Support\Facades\Hash;

class NguoiChoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listNguoiChoi = NguoiChoi::all();
        return View('nguoi-choi.danh-sach', compact('listNguoiChoi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nguoi-choi.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThemNguoiChoiRequest $request)
    {
        $nguoiChoi = new NguoiChoi;

        if (NguoiChoi::where('ten_dang_nhap', '=', $request->ten_dang_nhap)->exists()){
            return redirect()->route('nguoi-choi.them-moi')->with('cap-nhat',"Tên tài khoản đã tồn tại");;
        }
        else{
            $nguoiChoi->ten_dang_nhap = $request->ten_dang_nhap;
            $nguoiChoi->mat_khau = Hash::make($request->mat_khau);
            $nguoiChoi->email = $request->email;

            $file = $request->hinh_dai_dien;
            $fileName = $file->getClientOriginalName('hinh_dai_dien');
            $nguoiChoi->hinh_dai_dien = $fileName;

            $nguoiChoi->diem_cao_nhat = $request->diem_cao_nhat;
            $nguoiChoi->credit = $request->credit;
            $nguoiChoi->save();
        }
            
        return redirect()->route('nguoi-choi.danh-sach')->with('cap-nhat',"Thêm mới thành công");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nguoiChoi = NguoiChoi::find($id);

        return View('nguoi-choi.form', compact('nguoiChoi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nguoiChoi = NguoiChoi::find($id);

        if (!Hash::check($request->xac_nhan_mat_khau_cu, $nguoiChoi->mat_khau)){
            // Sửa lại (validation)
            return redirect()->route('nguoi-choi.danh-sach')->with('cap-nhat-2',"Mật khẩu cũ không trùng khớp");
        }
        else{
            $nguoiChoi->mat_khau = Hash::make($request->mat_khau);
            $nguoiChoi->diem_cao_nhat = $request->diem_cao_nhat;
            $nguoiChoi->credit = $request->credit;
            $nguoiChoi->save();
        
            return redirect()->route('nguoi-choi.danh-sach')->with('cap-nhat',"Cập nhật thành công");
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nguoiChoi = NguoiChoi::find($id);
        $nguoiChoi->delete();

        return redirect()->route('nguoi-choi.danh-sach')->with('cap-nhat',"Xóa thành công");
    }
}
