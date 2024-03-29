<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\NguoiChoi;

class apiNguoiChoi extends Controller
{
    public function getResultLogin(Request $request){
        $nguoiChoi = NguoiChoi::where('ten_dang_nhap', $request->ten_dang_nhap)->where('mat_khau', $request->mat_khau)->first();
        if($nguoiChoi == null){
            return response()->json(['success' => false]);
        }
        $result = ['success'=>true,'nguoi_choi' => $nguoiChoi];
        return response()->json($result);
    }

    public function getPassword(Request $request){
        $nguoiChoi = NguoiChoi::where('ten_dang_nhap', $request->ten_dang_nhap)->where('email', $request->email)->first();
        if($nguoiChoi == null){
            return response()->json(['success' => false]);
         }
         $result = [
             'success'=>true,
             'nguoi_choi'=>$nguoiChoi
         ];
         return response()->json($result);
    }

    public function store(Request $request){
        $checkUser = NguoiChoi::where('ten_dang_nhap', $request->ten_dang_nhap)->orWhere('email', $request->email)->first();
        if($checkUser != null){
            return response()->json(['success' => false]);
        }

        $nguoiChoi = new NguoiChoi();
        $nguoiChoi->ten_dang_nhap = $request->ten_dang_nhap;
        $nguoiChoi->mat_khau = $request->mat_khau;
        $nguoiChoi->email = $request->email;
        $nguoiChoi->hinh_dai_dien = "";
        $nguoiChoi->diem_cao_nhat = 0;
        $nguoiChoi->credit = 0;
        $nguoiChoi->save();
        return response()->json(['success' => true]);
    }

    public function update(Request $request){
        $nguoiChoi = NguoiChoi::where('id', $request->id)->first();
        if($nguoiChoi == null){
            return response()->json(['success' => false]);
         }
        $nguoiChoi->ten_dang_nhap = $request->ten_dang_nhap;
        $nguoiChoi->mat_khau = $request->mat_khau;
        $nguoiChoi->email = $request->email;
        $nguoiChoi->hinh_dai_dien = "";
        $nguoiChoi->save();
        return response()->json(['success' => true]);
    }
    
    public function updateCredit(Request $request){
        $nguoiChoi = NguoiChoi::where('id', $request->id)->first();
        if($nguoiChoi == null){
            return response()->json(['success' => false]);
        }
        $nguoiChoi->credit = $request->credit;
        $nguoiChoi->save();
        return response()->json(['success' => true]);
    }

    public function getNguoiChoi(Request $request)
    {
        $page = $request->page;
        $limit = $request->limit;
        $nguoiChoi = NguoiChoi::orderBy('diem_cao_nhat', "DESC")->skip(($page-1)*$limit)->take($limit)->get();
        $result = [
            'success' => true,
            'total' => NguoiChoi::count(),
            'nguoi_choi' => $nguoiChoi
        ];
        return response()->json($result);
    }

    public function upload(Request $request)
    {
        $target_dir = "assets/images";
        if (!file_exists($target_dir)){
            mkdir($target_dir, 0777, true);
        }
        $result = null;
        $tail = rand()."_".time().".jpeg";
        $target_dir = $target_dir."/".$tail;
        if(file_put_contents($target_dir, base64_decode($request->image))){
            $nguoiChoi = NguoiChoi::find($request->id);
            $nguoiChoi->hinh_dai_dien = $tail;
            $nguoiChoi->save();
            $result = [
                "success"=>true,
                "Messeger" => "Hình đã được upload",
                "hinh_dai_dien"=>$tail
            ];
        }else{
            $result = [
                "success"=>false,
                "Messeger" => "Hình Ngu"
            ];
        }
        return $result;
    }
}
