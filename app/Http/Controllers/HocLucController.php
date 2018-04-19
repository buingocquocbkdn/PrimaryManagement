<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HocLuc;

class HocLucController extends Controller
{
	public function __construct()
	{
	}

	
	public function index()
	{
		$hocluc=HocLuc::all();
		echo json_encode($hocluc);
	}

	// public function show($action) {
	// 	if($action=='searchGiaoVien'){
	// 		$giaovien=GiaoVien::select(['*','giaovien.id as id_giaovien','loaimonhoc.id as id_loaimonhoc'])->join('loaimonhoc','loaimonhoc.id','=','giaovien.loaimonhoc_id')->get();
	// 		echo json_encode($giaovien);
	// 	}
		
	// }

	// public function create()
	// {
	// 	return view('admin.giaovien.themgiaovien');
	// }

	// public function add($action)
	// {
	// 	if($action=='phancong')
	// 	{
	// 		$giaovien=GiaoVien::all();
	// 		$namhoc=NamHoc::orderBy('id', 'DESC')->take(1)->get();
	// 		return view('admin.giaovien.themphancong',['giaovien'=>$giaovien,'namhoc'=>$namhoc]);
	// 	}

	// }

	// public function store(Request $request)
	// {
	// 	if(isset($_POST['add_giaovien'])) {
	// 		$giaovien=new GiaoVien;
	// 		$giaovien->hoten=$_POST['hoten'];
	// 		$giaovien->gioitinh=$_POST['gioitinh'];
	// 		$giaovien->ngaysinh=$_POST['ngaysinh'];
	// 		$giaovien->diachi=$_POST['diachi'];
	// 		$giaovien->loaimonhoc_id=$_POST['loaimonhoc'];
	// 		$giaovien->sodienthoai=$_POST['sodienthoai'];
	// 		$giaovien->save();

	// 		$result=GiaoVien::select(['*','giaovien.id as id_giaovien','loaimonhoc.id as id_loaimonhoc'])->join('loaimonhoc','loaimonhoc.id','=','giaovien.loaimonhoc_id')->where('giaovien.id',$hocsinh->id)->get();
	// 		echo json_encode($result);
	// 	}

		

	// }

	// public function edit($id) {
	// //find->obj, select->array
	// 	$giaovien=GiaoVien::find($id);
	// 	echo json_encode($giaovien);
	// }


	// public function update($id,Request $request)
	// {
	// 	$giaovien=GiaoVien::find($id);
	// 	$giaovien->gioitinh=$request->gioitinh;
	// 	$giaovien->ngaysinh=$request->ngaysinh;
	// 	$giaovien->diachi=$request->diachi;
	// 	$giaovien->loaimonhoc_id=$request->loaimonhoc;
	// 	$giaovien->sodienthoai=$request->sodienthoai;
	// 	$giaovien->save();

	// 	$result=GiaoVien::select(['*','giaovien.id as id_giaovien','loaimonhoc.id as id_loaimonhoc'])->join('loaimonhoc','loaimonhoc.id','=','giaovien.loaimonhoc_id')->where('giaovien.id',$id)->get();
	// 	echo json_encode($result[0]);
	// }


	
	// public function destroy($action, Request $request) {
	// 	if ($action=='delGiaoVien') {
	// 		$id=$request->id;
	// 		$giaovien=GiaoVien::findOrFail($id);
	// 		$giaovien->delete();
	// 		echo 'ok';
	// 	} 
		
	// }


	

}
