<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GoiCredit;
use App\CauHoi;
use App\LinhVuc;
use App\NguoiChoi;
use App\LuotChoi;
class khoiphucController extends Controller
{
    public function index()
    {
        $listGoiCredit = GoiCredit::whereNotNull('deleted_at')->get();
        return View('khoi-phuc.danh-sach', compact('listGoiCredit'));
    }
    public function khoiPhuc($id)
    {
    	$abc = GoiCredit::onlyTrashed()->find($id);
		$abc->restore();
		return redirect()->route('khoi-phuc.danh-sach')->with('cap-nhat',"Khôi Phục Thành Công");
    }
}
