<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LinhVuc;
class apiLinhVuc extends Controller
{
    public function laydsLinhVuc()
    {
    	$listLinhVuc = LinhVuc::all()->random(4);
    	$result= [
    		'success' =>true,
    		'data' => $listLinhVuc
    	];
    	return response()->json($result);
    }	
}
