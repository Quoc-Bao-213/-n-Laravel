<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChiTietLuotChoi;
use App\CauHoi;
use App\LuotChoi;

class ChiTietLuotChoiController extends Controller
{
    public function index(){
        $listChiTietLuotChoi = ChiTietLuotChoi::all();
        return View('chi-tiet-luot-choi.danh-sach', compact('listChiTietLuotChoi'));
    }
}
