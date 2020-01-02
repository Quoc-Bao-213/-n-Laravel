<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CauHoi;
use App\LinhVuc;

class apiCauHoi extends Controller
{
    // public function laydsCauHoi(Request $request)
    // {
    // 	$linhvuID = $request->query('linh_vuc');
    // 	$cauHoi = CauHoi::where('linh_vuc_id',$linhvuID)->get()->random(1);
    	
    // 	$result= [
    // 		'success' =>true,
    // 		'data' => $cauHoi
    // 	];
    // 	return response()->json($result);
	// }	
	
	public function getCauHoi(Request $request)
    {
        $page = $request->page;
        $limit = $request->limit;
        $cauHoi = CauHoi::where('linh_vuc_id',$request->linh_vuc_id)->orderBy('id',"ASC")->skip(($page-1)*$limit)->take($limit)->get();
        $result = [
            'success' => true,
            'total' => CauHoi::count(),
            'cau_hoi' => $cauHoi
        ];
        return response()->json($result);
    }
}
