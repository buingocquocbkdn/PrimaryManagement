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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::resource('giaovien','GiaoVienController');
Route::resource('hocluc','HocLucController');
Route::resource('hanhkiem','HanhKiemController');
Route::resource('dantoc','DanTocController');
Route::resource('tongiao','TonGiaoController');
Route::resource('hocky','HocKyController');
Route::resource('monhoc','MonHocController');
Route::resource('namhoc','NamHocController');
Route::resource('loaimonhoc','LoaiMonHocController');
Route::resource('nghenghiep','NgheNghiepController');
Route::resource('tinh','TinhController');
Route::resource('huyen','HuyenController');
Route::get('huyen/getHuyenByTinh/{id}','HuyenController@getHuyenByTinh');
Route::resource('lop','LopController');
Route::get('hoatdong/getHoatDong','HoatDongController@getHoatDong' );

Route::resource('giaovien','GiaoVienController');
Route::get('giaovien/getClassOfTeacher/{id}','GiaoVienController@getClassOfTeacher' );
Route::get('giaovien/getStudents/{id}','GiaoVienController@getStudents' );
Route::get('giaovien/editTeacher/{id}/{loaimonhoc}/{diachi}/{sodienthoai}','GiaoVienController@updateTeacher' );
Route::get('giaovien/getScheduleOfTeacher/{id}','GiaoVienController@getScheduleOfTeacher' );
Route::get('giaovien/updateConduct/{id}/{hanhkiem}/{namhoc}/{hocky}','GiaoVienController@updateConduct' );
Route::get('giaovien/updateScore/{idHS}/{tenMonHoc}/{lop}/{hocky}/{namhoc}/{heso1}/{heso2}/{heso3}','GiaoVienController@updateScore' );
Route::get('giaovien/getTeacher/{id}','GiaoVienController@getTeacher' );

Route::resource('hocsinh','HocSinhController');
Route::get('hocsinh/getConductOfStudent/{id}','HocSinhController@getConductOfStudent' );
Route::get('hocsinh/editStudent/{id}/{diachi}/{dantoc}/{tongiao}/{nghenghiepcha}/{nghenghiepme}/{sodienthoai}','HocSinhController@updateStudent' );
Route::get('hocsinh/getScoreStudent/{id}','HocSinhController@getScoreStudent' );
Route::get('hocsinh/getScheduleOfStudent/{id}','HocSinhController@getScheduleOfStudent' );
Route::get('hocsinh/getStudent/{id}','HocSinhController@getStudent' );


// Route::resource('nguoidung','NguoiDungController');

Route::get('nguoidung/{id}','NguoiDungController@getUser' );
Route::get('nguoidung','NguoiDungController@getUsers' );
Route::group(['namespace' =>'Auth'],function(){
Route::get('login/{maso}/{password}','AuthController@login' );
});
// Route::post('nguoidung/updateAvatar','NguoiDungController@updateAvatar' );