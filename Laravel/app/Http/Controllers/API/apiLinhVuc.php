<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LinhVuc;

class apiLinhVuc extends Controller
{
    // public function laydsLinhVuc()
    // {
    // 	$listLinhVuc = LinhVuc::all()->random(4);
    // 	$result= [
    // 		'success' =>true,
    // 		'data' => $listLinhVuc
    // 	];
    // 	return response()->json($result);
	// }
	
	public function getLinhVuc(Request $request)
    {
        $page = $request->page;
        $limit = $request->limit;
        $linhVuc = LinhVuc::skip(($page-1)*$limit)->take($limit)->get();
        $result = [
            'success' => true,
            'total' => LinhVuc::count(),
            'linh_vuc' => $linhVuc
        ];
        return response()->json($result);
    }
}
