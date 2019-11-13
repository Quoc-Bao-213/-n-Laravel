<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GoiCredit;
class goi-credit extends Controller
{
    public function laydsCredit()
    {
    	$listCredit = GoiCredit::all();
    	$result= [
    		'success' =>true,
    		'data' => $listCredit
    	];
    	return response()->json($result);
    }	
}
