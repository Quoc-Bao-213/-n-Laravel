<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CauHinhDiemCauHoi;
use App\Http\Requests\CauHinhDiemCauHoiRequest; 

class DiemCauHoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listDiemCauHoi = CauHinhDiemCauHoi::all();
        return view('cau-hinh-diem.danh-sach', compact('listDiemCauHoi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cau-hinh-diem.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CauHinhDiemCauHoiRequest $request)
    {
        $diemCauHoi = new CauHinhDiemCauHoi;
        
        $diemCauHoi->thu_tu = $request->thu_tu;
        $diemCauHoi->diem = $request->diem;
        $diemCauHoi->save();

        return view('cau-hinh-diem.danh-sach')->with('cap-nhat',"Thêm mới thành công");
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
        $diemCauHoi = CauHinhDiemCauHoi::find($id);
        return View('cau-hinh-diem.form', compact('diemCauHoi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CauHinhDiemCauHoiRequest $request, $id)
    {
        $diemCauHoi = CauHinhDiemCauHoi::find($id);

        $diemCauHoi->thu_tu = $request->thu_tu;
        $diemCauHoi->diem = $request->diem;
        $diemCauHoi->save();

        return view('cau-hinh-diem.danh-sach')->with('cap-nhat',"Cập nhật thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $diemCauHoi = CauHinhDiemCauHoi::find($id);
        $diemCauHoi->delete();

        return redirect()->route('cau-hinh-diem.danh-sach')->with('cap-nhat',"Xóa thành công");
    }
}
