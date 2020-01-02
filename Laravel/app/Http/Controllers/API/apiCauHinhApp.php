<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CauHinhApp;

class apiCauHinhApp extends Controller
{
    public function getCauHinhApp()
    {
        $cauHinhApp = CauHinhApp::all();
        $result = [
            'success'=>true,
            'cau_hinh_app'=>$cauHinhApp
        ];
        return response()->json($result);
    }

    public function getCauHinhAppByID($id)
    {
        $cauHinhApp = CauHinhApp::find($id);
        if ($cauHinhApp == null) {
            return response()->json(['success'=>false]);
        }
        $result = [
            'success'=>true,
            'cau_hinh_app'=>$cauHinhApp
        ];
        return response()->json($result);
    }
}
