<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CauHinhTroGiup;

class apiCauHinhTroGiup extends Controller
{
    public function getCauHinhTroGiup(){
        $cauHinhTroGiup = CauHinhTroGiup::all();
        $result = [
            'success' => true,
            'cau_hinh_tro_giup' => $cauHinhTroGiup
        ];
    
        return response() -> json($result);
    }

    public function getcauHinhTroGiupByID($id)
    {
        $cauHinhTroGiup = CauHinhTroGiup::find($id);
        if($cauHinhTroGiup == null){
            return response()->json(['success'=>false]);
        }    
        $result = [
            'success' => true,
            'cau_hinh_tro_giup' => $cauHinhTroGiup
        ];
        return response() -> json($result);
    }
}
