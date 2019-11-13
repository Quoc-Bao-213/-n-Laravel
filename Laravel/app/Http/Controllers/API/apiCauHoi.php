<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CauHoi;
use App\LinhVuc;
class apiCauHoi extends Controller
{
    public function laydsCauHoi(Request $request)
    {
    	$linhvuID = $request->query('linh_vuc');
    	$cauHoi = CauHoi::where('linh_vuc_id',$linhvuID)->get()->random(1);
    	
    	$result= [
    		'success' =>true,
    		'data' => $cauHoi
    	];
    	return response()->json($result);
    }	
}
