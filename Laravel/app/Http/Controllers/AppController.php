<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CauHinhApp;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lstCauHinhApp = CauHinhApp::all();
        return view('cau-hinh-app.danh-sach', compact('lstCauHinhApp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $cauHinhApp = CauHinhApp::find($id);
        return View('cau-hinh-app.form', compact('cauHinhApp'));
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
        $cauHinhApp = CauHinhApp::find($id);
        
        $cauHinhApp->co_hoi_sai = $request->co_hoi_sai;
        $cauHinhApp->thoi_gian_tra_loi = $request->thoi_gian_tra_loi;
        $cauHinhApp->save();

        return redirect()->route('cau-hinh-app.danh-sach')->with('cap-nhat',"Cập nhật thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cauHinhApp = CauHinhApp::find($id);
        $cauHinhApp->delete();

        return redirect()->route('cau-hinh-app.danh-sach')->with('cap-nhat',"Xóa thành công");
    }
}
