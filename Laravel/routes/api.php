<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// /api/linh-vuc load api linhvuc
Route::get('linh-vuc','API\apiLinhVuc@laydsLinhVuc');

// /api/cau-hoi load api cauhoi them linh vuc
Route::get('cau-hoi','API\apiCauHoi@laydsCauHoi');

// /api/goi-credit load api cauhoi them linh vuc
Route::get('goi-credit','API\apiCredit@laydsCredit');
// CauHinhAppController
Route::get('cau-hinh-app','API\apiCauHinhApp@laydsCredit');
// ChiTietLuotChoiController
Route::get('cau-hinh-app','API\apiCauHinhApp@laydsCredit');