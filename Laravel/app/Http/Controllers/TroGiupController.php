<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CauHinhTroGiup;
use App\Http\Requests\CauHinhTroGiupRequest; 

class TroGiupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listTroGiup = CauHinhTroGiup::all();
        return view('cau-hinh-tro-giup.danh-sach', compact('listTroGiup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cau-hinh-tro-giup.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CauHinhTroGiupRequest $request)
    {
        $troGiup = new CauHinhTroGiup;
        $troGiup->loai_tro_giup = $request->loai_tro_giup;
        $troGiup->thu_tu = $request->thu_tu;
        $troGiup->credit = $request->credit;
        $troGiup->save();

        return redirect()->route('cau-hinh-tro-giup.danh-sach')->with('cap-nhat',"Thêm mới thành công");
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
        $troGiup = CauHinhTroGiup::find($id);
        return View('cau-hinh-tro-giup.form', compact('troGiup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CauHinhTroGiupRequest $request, $id)
    {
        $troGiup = CauHinhTroGiup::find($id);
        
        $troGiup->loai_tro_giup = $request->loai_tro_giup;
        $troGiup->thu_tu = $request->thu_tu;
        $troGiup->credit = $request->credit;
        $troGiup->save();

        return redirect()->route('cau-hinh-tro-giup.danh-sach')->with('cap-nhat',"Cập nhật thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $troGiup = CauHinhTroGiup::find($id);
        $troGiup->delete();

        return redirect()->route('cau-hinh-tro-giup.danh-sach')->with('cap-nhat',"Xóa thành công");
    }
}
