<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LichSuMuaCredit;
class LichSuMuaCreditController extends Controller
{
    public function index(){
        $listLichSuMuaCredit = LichSuMuaCredit::all();
        return View('lich-su-mua-credit.danh-sach', compact('listLichSuMuaCredit'));
    }
}
