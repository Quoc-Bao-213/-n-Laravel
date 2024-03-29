<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Đăng nhập
Route::get('test','QuanTriVienController@layThongTin')->name('thong-tin');
Route::get('dang-nhap','QuanTriVienController@dangNhap')->name('dang-nhap')->middleware('guest');
Route::post('dang-nhap','QuanTriVienController@xuLyDangNhap')->name('xu-ly-dang-nhap');
Route::get('dang-xuat','QuanTriVienController@dangXuat')->name('dang-xuat');


Route::middleware('auth')->group(function(){
    // Layout Chính
    Route::get('/', function () {
        return view('layout');
    })->name('trang-chu');
    //Layout thong tin admin
    Route::prefix('quan-tri-vien')->group(function () {
        Route::name('quan-tri-vien.')->group(function () {
            Route::get('/', "QuanTriVienController@index")->name('thong-tin');
            Route::get('cap-nhat/{id}', "QuanTriVienController@edit")->name('cap-nhat');
            Route::post('cap-nhat/{id}', "QuanTriVienController@update")->name('xu-ly-cap-nhat');
            Route::get('doi-ten/{id}', "QuanTriVienController@editten")->name('doi-ten');
            Route::post('doi-ten/{id}', "QuanTriVienController@doiten")->name('xu-ly-doi-ten');
        });
    });

    // Layout Lĩnh Vực
    Route::prefix('linh-vuc')->group(function() {
        Route::name('linh-vuc.')->group(function() {
            Route::get('/', 'LinhVucController@index')->name('danh-sach');
            Route::get('them-moi', 'LinhVucController@create')->name('them-moi');
            Route::post('them-moi', 'LinhVucController@store')->name('xu-ly-them-moi');
            Route::get('cap-nhat/{id}', 'LinhVucController@edit')->name('cap-nhat');
            Route::post('cap-nhat/{id}', 'LinhVucController@update')->name('xu-ly-cap-nhat');
            Route::get('xoa/{id}', 'LinhVucController@destroy')->name('xoa');
        });
    }); 

    // Layout Câu Hỏi
    Route::prefix('cau-hoi')->group(function() {
        Route::name('cau-hoi.')->group(function() {
            Route::get('/', 'CauHoiController@index')->name('danh-sach');
            Route::get('them-moi', 'CauHoiController@create')->name('them-moi');
            Route::post('them-moi', 'CauHoiController@store')->name('xu-ly-them-moi');
            Route::get('cap-nhat/{id}', 'CauHoiController@edit')->name('cap-nhat');
            Route::post('cap-nhat/{id}', 'CauHoiController@update')->name('xu-ly-cap-nhat');
            Route::get('xoa/{id}', 'CauHoiController@destroy')->name('xoa');
        });
    });

    // Layout Người Chơi
    Route::prefix('nguoi-choi')->group(function() {
        Route::name('nguoi-choi.')->group(function() {
            Route::get('/', 'NguoiChoiController@index')->name('danh-sach');
            Route::get('them-moi', 'NguoiChoiController@create')->name('them-moi');
            Route::post('them-moi', 'NguoiChoiController@store')->name('xu-ly-them-moi');
            Route::get('cap-nhat/{id}', 'NguoiChoiController@edit')->name('cap-nhat');
            Route::post('cap-nhat/{id}', 'NguoiChoiController@update')->name('xu-ly-cap-nhat');
            Route::get('xoa/{id}', 'NguoiChoiController@destroy')->name('xoa');
        });
    });

    // Layout Gói Credit
    Route::prefix('goi-credit')->group(function() {
        Route::name('goi-credit.')->group(function() {
            Route::get('/', 'GoiCreditController@index')->name('danh-sach');
            Route::get('them-moi', 'GoiCreditController@create')->name('them-moi');
            Route::post('them-moi', 'GoiCreditController@store')->name('xu-ly-them-moi');
            Route::get('cap-nhat/{id}', 'GoiCreditController@edit')->name('cap-nhat');
            Route::post('cap-nhat/{id}', 'GoiCreditController@update')->name('xu-ly-cap-nhat');
            Route::get('xoa/{id}', 'GoiCreditController@destroy')->name('xoa');
        });
    });

    // Layout Lượt Chơi
    Route::prefix('luot-choi')->group(function() {
        Route::name('luot-choi.')->group(function() {
            Route::get('/', 'LuotChoiController@index')->name('danh-sach');
        });
    });

    // Layout Chi Tiết Lượt Chơi
    Route::prefix('chi-tiet-luot-choi')->group(function() {
        Route::name('chi-tiet-luot-choi.')->group(function() {
            Route::get('/', 'ChiTietLuotChoiController@index')->name('danh-sach');
        });
    });

    // Layout Lịch Sử Mua Credit
    Route::prefix('lich-su-mua-credit')->group(function() {
        Route::name('lich-su-mua-credit.')->group(function() {
            Route::get('/', 'LichSuMuaCreditController@index')->name('danh-sach');
        });
    });

    // Layout Khôi Phục
    Route::prefix('khoi-phuc')->group(function() {
        Route::name('khoi-phuc.')->group(function() {
            Route::get('/', 'khoiphucController@index')->name('danh-sach');
            Route::get('khoiPhuc/{id}', 'khoiphucController@khoiPhuc')->name('khoiPhuc');
        });
    });

    // Layout Cấu Hình App
    Route::prefix('cau-hinh-app')->group(function() {
        Route::name('cau-hinh-app.')->group(function() {
            Route::get('/', 'AppController@index')->name('danh-sach');
            Route::get('cap-nhat/{id}', 'AppController@edit')->name('cap-nhat');
            Route::post('cap-nhat/{id}', 'AppController@update')->name('xu-ly-cap-nhat');
            Route::get('xoa/{id}', 'AppController@destroy')->name('xoa');
        });
    });

    // Layout Cấu Hình Điểm Câu Hỏi
    Route::prefix('cau-hinh-diem')->group(function() {
        Route::name('cau-hinh-diem.')->group(function() {
            Route::get('/', 'DiemCauHoiController@index')->name('danh-sach');
            Route::get('them-moi', 'DiemCauHoiController@create')->name('them-moi');
            Route::post('them-moi', 'DiemCauHoiController@store')->name('xu-ly-them-moi');
            Route::get('cap-nhat/{id}', 'DiemCauHoiController@edit')->name('cap-nhat');
            Route::post('cap-nhat/{id}', 'DiemCauHoiController@update')->name('xu-ly-cap-nhat');
            Route::get('xoa/{id}', 'DiemCauHoiController@destroy')->name('xoa');
        });
    });

    // Layout Cấu Hình Trợ Giúp
    Route::prefix('cau-hinh-tro-giup')->group(function() {
        Route::name('cau-hinh-tro-giup.')->group(function() {
            Route::get('/', 'TroGiupController@index')->name('danh-sach');
            Route::get('them-moi', 'TroGiupController@create')->name('them-moi');
            Route::post('them-moi', 'TroGiupController@store')->name('xu-ly-them-moi');
            Route::get('cap-nhat/{id}', 'TroGiupController@edit')->name('cap-nhat');
            Route::post('cap-nhat/{id}', 'TroGiupController@update')->name('xu-ly-cap-nhat');
            Route::get('xoa/{id}', 'TroGiupController@destroy')->name('xoa');
        });
    });
});