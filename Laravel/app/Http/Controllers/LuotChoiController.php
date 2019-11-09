<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LuotChoi;
use App\NguoiChoi;

class LuotChoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listLuotChoi = LuotChoi::all();
        return View('luot-choi.danh-sach', compact('listLuotChoi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listNguoiChoi = NguoiChoi::all();
        return View('luot-choi.form', compact('listNguoiChoi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $luotChoi = new LuotChoi;

        $luotChoi->nguoi_choi_id = $request->nguoi_choi;
        $luotChoi->so_cau = $request->so_cau;
        $luotChoi->diem = $request->diem;
        $luotChoi->save();

        return redirect()->route('luot-choi.danh-sach');
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
        $luotChoi = LuotChoi::find($id);
        $listNguoiChoi = NguoiChoi::all();

        return View('luot-choi.form', compact('luotChoi', 'listNguoiChoi'));
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
        $luotChoi = LuotChoi::find($id);

        $luotChoi->nguoi_choi_id = $request->nguoi_choi;
        $luotChoi->so_cau = $request->so_cau;
        $luotChoi->diem = $request->diem;
        $luotChoi->save();

        return redirect()->route('luot-choi.danh-sach');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $luotChoi = LuotChoi::find($id);
        $luotChoi->delete();

        return redirect()->route('luot-choi.danh-sach');
    }
}
