<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ChiTietLuotChoi;

class apiChiTietLuotChoi extends Controller
{
    public function getChiTietLuotChoi(){
        $chiTietLuotChoi = ChiTietLuotChoi::all();
        $result = [
            'success' => true,
            'chi_tiet_luot_choi' => $chiTietLuotChoi
        ];
    
        return response() -> json($result);
    }

    public function getChiTietLuotChoiByID($id)
    {
        $chiTietLuotChoi = ChiTietLuotChoi::find($id);
        if($chiTietLuotChoi == null){
            return response()->json(['success'=>false]);
        }    
        $result = [
            'success' => true,
            'chi_tiet_luot_choi' => $chiTietLuotChoi
        ];
        return response() -> json($result);
    }
}
