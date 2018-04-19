<?php
Route::pattern('id', '([0-9]*)');
Route::pattern('name', '(.*)');

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

Route::get('/', function () {
	return view('welcome');
});
Route::group(['middleware' =>'login'],function(){

	Route::resource('dantoc','DanTocController');

	// Route::group(['prefix'=>'hocsinh'],function(){
	// 	Route::get('timkiem','HocSinhController@getTimKiem');
	// 	Route::post('timkiem','HocSinhController@postTimKiem');
	// });
	Route::resource('hocsinh','HocsinhController');

	Route::resource('giaovien','GiaoVienController');
	Route::get('giaovien/{action}/create','GiaoVienController@add');

});
 
//user 
Route::group(['namespace' =>'Auth'],function(){
	Route::get('login',[
		'uses' =>'AuthController@getLogin',
		'as' =>'admin.user.getlogin'
	]);

	Route::post('login',[
		'uses' =>'AuthController@postLogin',
		'as' =>'admin.user.postlogin'

	]);

	Route::get('logout',[ 
		'uses' =>'AuthController@logout',
		'as' =>'admin.user.logout'

	]);

	Route::post('postUser', [
		'uses' => 'AuthController@postUser',
		'as' => 'admin.user.postUser'
	]);


	Route::get('getUser/{id}', [
		'uses' => 'AuthController@getUser',
		'as' => 'admin.user.getUser'
	]);

		//nguoidung
	Route::group(['prefix'=>'nguoidung','middleware' =>'login'],function(){

		Route::group(['prefix'=>'giaovien'],function(){
			Route::get('', [
				'uses' => 'AuthController@getGiaovien',
				'as' => 'admin.giaovien.getGiaovien'
			]);
			Route::get('active/{id}','AuthController@trangThaiGiaoVien');

			Route::get('editpassGV/{id}', [
				'uses' => 'AuthController@editpassGV',
				'as' => 'admin.giaovien.editpassGV'
			]);

			Route::post('editpassGV', [
				'uses' => 'AuthController@postEditPassGV',
				'as' => 'admin.giaovien.editpassGV'
			]);

		});

		Route::group(['prefix'=>'hocsinh','middleware' =>'login'],function(){
			Route::get('', [
				'uses' => 'AuthController@getHocSinh',
				'as' => 'admin.hocsinh.getHocSinh'
			]);
			Route::get('active/{id}','AuthController@trangThaiHocSinh');

			Route::get('editpassHS/{id}', [
				'uses' => 'AuthController@editpassHS',
				'as' => 'admin.hocsinh.editpassHS'
			]);

			Route::post('editpassHS', [
				'uses' => 'AuthController@postEditPassHS',
				'as' => 'admin.hocsinh.editpassHS'
			]);

		});
		
		

	});


 
		
});
 
//hoatdong
Route::group(['prefix'=>'hoatdong','middleware' =>'login'],function(){

	Route::get('active/{id}','HoatDongController@trangThai');

	Route::get('',[
		'uses' =>'HoatDongController@index',
		'as' => 'admin.hoatdong.index'

	]);

	Route::get('add',[
		'uses' =>'HoatDongController@getAdd',
		'as' => 'admin.hoatdong.getadd'
	]);

	Route::post('add',[
		'uses' =>'HoatDongController@postAdd',
		'as' => 'admin.hoatdong.postadd'

	]);

	Route::get('edit-{id}',[

		'uses' =>'HoatDongController@getEdit',
		'as' => 'admin.hoatdong.getedit'
	]);

	Route::post('edit-{id}',[

		'uses' =>'HoatDongController@postEdit',
		'as' => 'admin.hoatdong.postedit'
	]);

	Route::post('del',[

		'uses' =>'HoatDongController@del',
		'as' => 'admin.hoatdong.del'
	]);

});


//gioithieu
Route::group(['prefix'=>'gioithieu','middleware' =>'login'],function(){

	Route::get('active/{id}','GioiThieuController@trangThai');

	Route::get('',[
		'uses' =>'GioiThieuController@index',
		'as' => 'admin.gioithieu.index'

	]);

	Route::get('add',[
		'uses' =>'GioiThieuController@getAdd',
		'as' => 'admin.gioithieu.getadd'
	]);

	Route::post('add',[
		'uses' =>'GioiThieuController@postAdd',
		'as' => 'admin.gioithieu.postadd'

	]);

	Route::get('edit-{id}',[

		'uses' =>'GioiThieuController@getEdit',
		'as' => 'admin.gioithieu.getedit'
	]);

	Route::post('edit-{id}',[

		'uses' =>'GioiThieuController@postEdit',
		'as' => 'admin.gioithieu.postedit'
	]);

	Route::post('del',[

		'uses' =>'GioiThieuController@del',
		'as' => 'admin.gioithieu.del'
	]);

});

///route trang public

Route::group(['prefix'=>'school'], function(){
	Route::get('/', [
		'uses' => 'schoolController@index',
		'as' => 'school.index'
		]);
	Route::get('{name}-{id}.html', [
		'uses' => 'schoolController@getChitiettin',
		'as' => 'school.chitiettin'
		]);
	Route::get('tongquan', [
		'uses' => 'schoolController@getTongquan',
		'as' => 'school.tongquan'
		]);
	Route::get('giaovien', [
		'uses' => 'schoolController@getGiaovien',
		'as' => 'school.giaovien'
		]);
	Route::get('hocsinh', [
		'uses' => 'schoolController@getHocsinh',
		'as' => 'school.hocsinhdanghoc'
		]);
	Route::post('khoilop', [
		'uses' => 'schoolController@postKhoiLop',
		'as' => 'school.khoilop'
		]);
	Route::post('lop', [
		'uses' => 'schoolController@postLop',
		'as' => 'school.lop'
		]);
	//search name bang route nì
	Route::post('searchhocsinh', [
		'uses' => 'schoolController@searchHocsinhDangHoc',
		'as' => 'school.searchhocsinh'
		]);
	Route::get('hocsinhthoihoc', [
		'uses' => 'schoolController@gethocsinhthoihoc',
		'as' => 'school.hocsinhthoihoc'
		]);
	Route::get('thoikhoabieu', [
		'uses' => 'schoolController@getThoikhoabieu',
		'as' => 'school.thoikhoabieu'
		]);
	
	Route::post('chitiet', [
		'uses' => 'schoolController@postThoikhoabieuChiTiet',
		'as' => 'school.thoikhoabieuchitiet'
		]);

	
	
});

Route::get('error', function () {
    return view('errors.404');
});