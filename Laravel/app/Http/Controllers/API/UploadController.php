<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
	public function doUpload(Request $request)
	{
		//giai ma base64 ->bitmap
		$img = base64_decode($request->hinh_anh);
		$img_name = md5(date('Y-m-d H:i:s')).'.jpg';

		//luu hinh anh vao disk on server
		Storage::disk('public_image')->put($img_name,$img);

		//luu ten hinh vao table hnh_anh
		HinhAnh::create([
			'ten_hinh' => $img_name
		]);
		return response()->json([
			'success' =>true,
			'img' => 'http://domain.com/'.$img_name	
		]);
	}
}
