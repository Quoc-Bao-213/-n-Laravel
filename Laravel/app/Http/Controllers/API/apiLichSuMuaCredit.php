<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LichSuMuaCredit;

class apiLichSuMuaCredit extends Controller
{
    public function getLichSuMuaCredit(){
        $lichSuMuaCredit = LichSuMuaCredit::all();
        $result = [
            'success' => true,
            'lich_su_mua_credit' => $lichSuMuaCredit
        ];
    
        return response() -> json($result);
    }

    public function getLichSuMuaCreditByID($id)
    {
        $lichSuMuaCredit = LichSuMuaCredit::find($id);
        if($lichSuMuaCredit == null){
            return response()->json(['success'=>false]);
        }    
        $result = [
            'success' => true,
            'lich_su_mua_credit' => $lichSuMuaCredit
        ];
        return response() -> json($result);
    }
}
