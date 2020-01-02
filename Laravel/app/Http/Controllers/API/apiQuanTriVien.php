<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\QuanTriVien;

class apiQuanTriVien extends Controller
{
    public function getQuanTriVien(){
        $quanTriVien = QuanTriVien::all();
        $result = [
            'success' => true,
            'quan_tri_vien' => $quanTriVien
        ];
    
        return response() -> json($result);
    }

    public function getQuanTriVienByID($id)
    {
        $quanTriVien = QuanTriVien::find($id);
        if($quanTriVien == null){
            return response()->json(['success' => false]);
        }    
        $result = [
            'success' => true,
            'quan_tri_vien' => $quanTriVien
        ];
        return response() -> json($result);
    }
}
