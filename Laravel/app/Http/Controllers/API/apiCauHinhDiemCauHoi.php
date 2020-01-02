<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CauHinhDiemCauHoi;

class apiCauHinhDiemCauHoi extends Controller
{
    public function getCauHinhDiemCauHoi()
    {
        $CauHinhDiem = CauHinhDiemCauHoi::all();
        $result = [
            'success'=>true,
            'cau_hinh_diem_cau_hoi'=>$CauHinhDiem
        ];
        return response()->json($result);
    }

    public function getCauHinhDiemCauHoiByID($id)
    {
        $CauHinhDiem = CauHinhDiemCauHoi::find($id);
        if ($CauHinhDiem == null) {
            return response()->json(['success'=>false]);
        }
        $result = [
            'success'=>true,
            'cau_hinh_diem_cau_hoi'=>$CauHinhDiem
        ];
        return response()->json($result);
    }
}
