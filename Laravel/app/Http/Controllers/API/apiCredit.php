<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GoiCredit;

class apiCredit extends Controller
{
	// public function laydsCredit()
	//     {
	//     	$listCredit = GoiCredit::all();
	//     	$result= [
	//     		'success' =>true,
	//     		'data' => $listCredit
	//     	];
	//     	return response()->json($result);
	// 	}	
		
	public function getGoiCredit(){
		$goiCredit = GoiCredit::all();
		$result = [
			'success' => true,
			'goi_credit' => $goiCredit
		];
	
		return response() -> json($result);
	}
}
