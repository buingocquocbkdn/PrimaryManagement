<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NamHoc;
use App\KhoiLop;
use App\Lop;
use App\HocSinh;
use App\PhanLop;
use App\GiaoVien;
use App\LoaiMonHoc;
use App\PhanCong;
use App\HocKy;
use App\ThoiKhoaBieu;
use App\BuoiHoc;
use App\HanhKiem;
use App\MonHoc;
use App\Diem;
use App\XepLoaiHanhKiem;
use App\Huyen;
use App\Tinh;

class GiaoVienController extends Controller
{
	public function __construct()
	{
		$lop= Lop::all();
		$namhoc=NamHoc::orderBy('id', 'DESC')->get();
		$loaimonhoc=LoaiMonHoc::all();
		$hocky=HocKy::all();
		$giaovien=GiaoVien::all();
		$tinh=Tinh::all();
		$huyen=Huyen::all();
		view()->share('lop',$lop);
		view()->share('namhoc',$namhoc);
		view()->share('loaimonhoc',$loaimonhoc);
		view()->share('hocky',$hocky);
		view()->share('giaovien',$giaovien);
		view()->share('tinh',$tinh);
		view()->share('huyen',$huyen);
	}

	
	public function index()
	{
		$giaovien=GiaoVien::all();
		return view('admin.giaovien.index',['giaovien'=>$giaovien]);
	}

	public function getClassOfTeacher($id) {
		$lop = Lop::select('lop.ten')->join('thoikhoabieu','lop.id','=','thoikhoabieu.lop_id')->join('phancong','phancong.thoikhoabieu_id','=','thoikhoabieu.id')->where('giaovien_id',$id)->get();

		echo json_encode($lop);
	}
	
	public function getTeacher($id) {
	    $teacher = GiaoVien::select(['giaovien.id as id','hoten','huyen.ten as huyen','tinh.ten as tinh','sodienthoai','loaimonhoc.ten as loaimonhoc','gioitinh','ngaysinh'])->join('loaimonhoc','loaimonhoc.id','=','giaovien.loaimonhoc_id')->join('huyen','huyen.id','=','giaovien.huyen_id')->join('tinh','tinh.id','=','huyen.tinh_id')->where('giaovien.id',$id)->get();
	    $lop=null;
	    if (!empty($teacher[0])&&$teacher[0]->loaimonhoc=='Môn chủ nhiệm') {
	    	$year=date('Y');
	    	$yearCurrent=$year.'-'.($year+1);
	    	$lop=PhanCong::select('lop.ten as lop')->join('thoikhoabieu','thoikhoabieu.id','=','phancong.thoikhoabieu_id')->join('namhoc','namhoc.id','=','thoikhoabieu.namhoc_id')->join('lop','lop.id','=','thoikhoabieu.lop_id')->where('namhoc.ten','like',"$yearCurrent")->where('phancong.giaovien_id',$id)->get();
	    }

	    $giaovien = array();
	    array_push($giaovien,$teacher[0]->id);
	    array_push($giaovien,$teacher[0]->hoten);
	    array_push($giaovien,$teacher[0]->huyen);
	    array_push($giaovien,$teacher[0]->tinh);
	    array_push($giaovien,$teacher[0]->sodienthoai);
	    array_push($giaovien,$teacher[0]->loaimonhoc);
	    array_push($giaovien,$teacher[0]->gioitinh);
	    array_push($giaovien,$teacher[0]->ngaysinh);
	    if (!empty($lop[0])) {
	    	array_push($giaovien,$lop[0]->lop);
	    }
	    
		echo json_encode($giaovien);
	}

	public function getStudents($id) {

		$hocsinh= PhanCong::select(['hocsinh.id as idHS','hocsinh.hoten as tenHS','namhoc.ten as namhoc','lop.ten as lop'])->join('thoikhoabieu','phancong.thoikhoabieu_id','=','thoikhoabieu.id')->join('lop','lop.id','=','thoikhoabieu.lop_id')->join('namhoc','namhoc.id','=','thoikhoabieu.namhoc_id')->join('hocky','hocky.id','=','thoikhoabieu.hocky_id')->join('phanlop','phanlop.lop_id','=','lop.id')->join('hocsinh','phanlop.hocsinh_id','=','hocsinh.id')->where('phancong.giaovien_id',$id)->distinct()->get();
		echo json_encode($hocsinh);
	}

	public function getScheduleOfTeacher($id) {
		$thoikhoabieu = PhanCong::select(['monhoc.ten as monhoc','buoihoc.thu as thu','namhoc.ten as namhoc','hocky.id as hocky','lop.ten as lop','thoigianbieu.id as tiet'])->join('thoikhoabieu','phancong.thoikhoabieu_id','=','thoikhoabieu.id')->join('buoihoc','buoihoc.thoikhoabieu_id','=','thoikhoabieu.id')->join('monhoc','buoihoc.monhoc_id','=','monhoc.id')->join('thoigianbieu','buoihoc.thoigianbieu_id','=','thoigianbieu.id')->join('lop','thoikhoabieu.lop_id','=','lop.id')->join('namhoc','thoikhoabieu.namhoc_id','=','namhoc.id')->join('hocky','thoikhoabieu.hocky_id','=','hocky.id')->distinct()->get();

		echo json_encode($thoikhoabieu);
	}

	public function updateTeacher($id,$loaimonhoc,$diachi,$sodienthoai){

		$loaimonhoc=LoaiMonHoc::where('ten','like',"$loaimonhoc")->get();
		$diachi=Huyen::where('ten','like',"$diachi")->get();
		$giaovien=GiaoVien::find($id);
		$giaovien->huyen_id=$diachi[0]->id;
		$giaovien->loaimonhoc_id=$loaimonhoc[0]->id;
		$giaovien->sodienthoai=$sodienthoai;
		$giaovien->save();

		echo json_encode('success');
	}

	public function updateConduct($id,$hanhkiem,$namhoc,$hocky){

		$hanhkiem = HanhKiem::where('ten','like',"$hanhkiem")->get();
		$namhoc = NamHoc::where('ten','like',"$namhoc")->get();
		$hocky = HocKy::where('ten','like',"$hocky")->get();

		$xeploaihanhkiem = XepLoaiHanhKiem::where('hocsinh_id',$id)->where('namhoc_id',$namhoc[0]->id)->where('hocky_id',$hocky[0]->id)->update(['hanhkiem_id' => $hanhkiem[0]->id]);

		echo json_encode('success');
	}

	public function updateScore($idHS,$tenMonHoc,$lop,$hocky,$namhoc,$heso1,$heso2,$heso3){

		// $idHS = $_POST['idStudent'];
		// $tenMonHoc = $_POST['nameSubject'];
		// $lop = $_POST['class'];
		// $hocky = $_POST['semester'];
		// $namhoc = $_POST['year'];
		// $heso1 = $_POST['mouth'];
		// $heso2 = $_POST['midSemester'];
		// $heso3 = $_POST['finalSemester'];


		$monhoc = MonHoc::where('ten','like',"$tenMonHoc")->get();
		$namhoc = NamHoc::where('ten','like',"$namhoc")->get();
		$hocky = HocKy::where('ten','like',"$hocky")->get();
		$lop = Lop::where('ten','like',"$lop")->get();

		$mieng = Diem::where('hocsinh_id',$idHS)->where('monhoc_id',$monhoc[0]->id)->where('namhoc_id',$namhoc[0]->id)->where('lop_id',$lop[0]->id)->where('hocky_id',$hocky[0]->id)->where('loaidiem_id',1)->get();
        // $diemMieng=$mieng[0]->diem;

		$giuaky = Diem::where('hocsinh_id',$idHS)->where('monhoc_id',$monhoc[0]->id)->where('namhoc_id',$namhoc[0]->id)->where('lop_id',$lop[0]->id)->where('hocky_id',$hocky[0]->id)->where('loaidiem_id',2)->get();
        // $diemGiuaKy=$giuaky[0]->diem;

		$cuoiky = Diem::where('hocsinh_id',$idHS)->where('monhoc_id',$monhoc[0]->id)->where('namhoc_id',$namhoc[0]->id)->where('lop_id',$lop[0]->id)->where('hocky_id',$hocky[0]->id)->where('loaidiem_id',3)->get();
        // $diemCuoiKy=$cuoiky[0]->diem;


		if($heso1!=""){
			if (empty($mieng[0])) {
				$diem = new Diem;
				$diem->hocsinh_id = $idHS;
				$diem->namhoc_id = $namhoc[0]->id;
				$diem->hocky_id = $hocky[0]->id;
				$diem->lop_id = $lop[0]->id;
				$diem->monhoc_id =$monhoc[0]->id ;
				$diem->loaidiem_id = 1;
				$diem->diem = $heso1;

			} else {
				$diem = Diem::where('hocsinh_id',$idHS)->where('monhoc_id',$monhoc[0]->id)->where('namhoc_id',$namhoc[0]->id)->where('lop_id',$lop[0]->id)->where('hocky_id',$hocky[0]->id)->where('loaidiem_id',1)->update(['diem' => $heso1]);
			}
		} else {
			if (!empty($mieng[0])) {
				$diem = Diem::where('hocsinh_id',$idHS)->where('monhoc_id',$monhoc[0]->id)->where('namhoc_id',$namhoc[0]->id)->where('lop_id',$lop[0]->id)->where('hocky_id',$hocky[0]->id)->where('loaidiem_id',1)->delete();
			} 
		}


		if($heso2!=""){
			if (empty($giuaky[0])) {
				$diem = new Diem;
				$diem->hocsinh_id = $idHS;
				$diem->namhoc_id = $namhoc[0]->id;
				$diem->hocky_id = $hocky[0]->id;
				$diem->lop_id = $lop[0]->id;
				$diem->monhoc_id =$monhoc[0]->id ;
				$diem->loaidiem_id = 2;
				$diem->diem = $heso2;

			} else {
				$diem = Diem::where('hocsinh_id',$idHS)->where('monhoc_id',$monhoc[0]->id)->where('namhoc_id',$namhoc[0]->id)->where('lop_id',$lop[0]->id)->where('hocky_id',$hocky[0]->id)->where('loaidiem_id',2)->update(['diem' => $heso2]);
			}
		} else {
			if (!empty($giuaky[0])) {
				$diem = Diem::where('hocsinh_id',$idHS)->where('monhoc_id',$monhoc[0]->id)->where('namhoc_id',$namhoc[0]->id)->where('lop_id',$lop[0]->id)->where('hocky_id',$hocky[0]->id)->where('loaidiem_id',2)->delete();
			} 
		}


		if($heso3!=""){
			if (empty($cuoiky[0])) {
				$diem = new Diem;
				$diem->hocsinh_id = $idHS;
				$diem->namhoc_id = $namhoc[0]->id;
				$diem->hocky_id = $hocky[0]->id;
				$diem->lop_id = $lop[0]->id;
				$diem->monhoc_id =$monhoc[0]->id ;
				$diem->loaidiem_id = 3;
				$diem->diem = $heso3;

			} else {
				$diem = Diem::where('hocsinh_id',$idHS)->where('monhoc_id',$monhoc[0]->id)->where('namhoc_id',$namhoc[0]->id)->where('lop_id',$lop[0]->id)->where('hocky_id',$hocky[0]->id)->where('loaidiem_id',3)->update(['diem' => $heso3]);
			}
		} else {
			if (!empty($cuoiky[0])) {
				$diem = Diem::where('hocsinh_id',$idHS)->where('monhoc_id',$monhoc[0]->id)->where('namhoc_id',$namhoc[0]->id)->where('lop_id',$lop[0]->id)->where('hocky_id',$hocky[0]->id)->where('loaidiem_id',3)->delete();
			} 
		}

		echo json_encode('success');
	}
	
	public function show($action) {
		if($action=='searchGiaoVien'){
			$giaovien=GiaoVien::select(['*','giaovien.id as id_giaovien','loaimonhoc.id as id_loaimonhoc','tinh.ten as tinh','huyen.ten as huyen','loaimonhoc.ten as loaimonhoc'])->join('loaimonhoc','loaimonhoc.id','=','giaovien.loaimonhoc_id')->join('huyen','huyen.id','=','giaovien.huyen_id')->join('tinh','tinh.id','=','huyen.tinh_id')->get();
			echo json_encode($giaovien);
		}
		if($action=='timkiem')
		{
			$lop= Lop::all();
			$namhoc= NamHoc::all();
			return view('admin.giaovien.index',['lop'=>$lop,'namhoc'=>$namhoc]);
		}

		if($action=='phancong')
		{
			return view('admin.giaovien.phancong');
		}

		if($action=='searchPhanCong')
		{
			$lop=$_GET['lop'];
			$namhochocky=$_GET['namhoc'];
			if ($lop!=''&&$namhochocky!=0) {
				$namhoc=explode('-', $namhochocky)[1];
				$hocky=explode('-', $namhochocky)[0];
				$phancong=PhanCong::select(['*','phancong.id as id_phancong','giaovien.id as id_giaovien','lop.ten as ten_lop','namhoc.ten as ten_namhoc','hocky.ten as ten_hocky','loaimonhoc.ten as ten_monhoc'])->join('giaovien','giaovien.id','=','phancong.giaovien_id')->join('thoikhoabieu','thoikhoabieu.id','=','phancong.thoikhoabieu_id')->join('lop','lop.id','=','thoikhoabieu.lop_id')->join('namhoc','namhoc.id','=','thoikhoabieu.namhoc_id')->join('hocky','hocky.id','=','thoikhoabieu.hocky_id')->join('loaimonhoc','loaimonhoc.id','=','giaovien.loaimonhoc_id')->where('lop_id',$lop)->where('namhoc_id',$namhoc)->where('hocky_id',$hocky)->get();
			} else {
				if ($lop==''&&$namhochocky==0) {
					$phancong=PhanCong::select(['*','phancong.id as id_phancong','giaovien.id as id_giaovien','lop.ten as ten_lop','namhoc.ten as ten_namhoc','hocky.ten as ten_hocky','loaimonhoc.ten as ten_monhoc'])->join('giaovien','giaovien.id','=','phancong.giaovien_id')->join('thoikhoabieu','thoikhoabieu.id','=','phancong.thoikhoabieu_id')->join('lop','lop.id','=','thoikhoabieu.lop_id')->join('namhoc','namhoc.id','=','thoikhoabieu.namhoc_id')->join('hocky','hocky.id','=','thoikhoabieu.hocky_id')->join('loaimonhoc','loaimonhoc.id','=','giaovien.loaimonhoc_id')->get();
				} else {
					if ($lop=='') {
						$namhoc=explode('-', $namhochocky)[1];
						$hocky=explode('-', $namhochocky)[0];
						$phancong=PhanCong::select(['*','phancong.id as id_phancong','giaovien.id as id_giaovien','lop.ten as ten_lop','namhoc.ten as ten_namhoc','hocky.ten as ten_hocky','loaimonhoc.ten as ten_monhoc'])->join('giaovien','giaovien.id','=','phancong.giaovien_id')->join('thoikhoabieu','thoikhoabieu.id','=','phancong.thoikhoabieu_id')->join('lop','lop.id','=','thoikhoabieu.lop_id')->join('namhoc','namhoc.id','=','thoikhoabieu.namhoc_id')->join('hocky','hocky.id','=','thoikhoabieu.hocky_id')->join('loaimonhoc','loaimonhoc.id','=','giaovien.loaimonhoc_id')->where('namhoc_id',$namhoc)->where('hocky_id',$hocky)->get();
					} else {
						$phancong=PhanCong::select(['*','phancong.id as id_phancong','giaovien.id as id_giaovien','lop.ten as ten_lop','namhoc.ten as ten_namhoc','hocky.ten as ten_hocky','loaimonhoc.ten as ten_monhoc'])->join('giaovien','giaovien.id','=','phancong.giaovien_id')->join('thoikhoabieu','thoikhoabieu.id','=','phancong.thoikhoabieu_id')->join('lop','lop.id','=','thoikhoabieu.lop_id')->join('namhoc','namhoc.id','=','thoikhoabieu.namhoc_id')->join('hocky','hocky.id','=','thoikhoabieu.hocky_id')->join('loaimonhoc','loaimonhoc.id','=','giaovien.loaimonhoc_id')->where('lop_id',$lop)->get();
					}
				}
			}
			echo json_encode($phancong);
		}
		
		if($action=='checkExistThoiKhoaBieu')
		{
			$lop=$_GET['lop'];
			$namhochocky=$_GET['namhoc'];
			$namhoc=explode('-', $namhochocky)[1];
			$hocky=explode('-', $namhochocky)[0];
			$thoikhoabieu=ThoiKhoaBieu::where('lop_id',$lop)->where('namhoc_id',$namhoc)->where('hocky_id',$hocky)->get();
			echo $thoikhoabieu;
		}

		if ($action == 'thoikhoabieu') 
		{
			$giaovien_id=$_GET['giaovien_id'];
			$lop=$_GET['lop'];
			$namhochocky=$_GET['namhoc'];
			$namhoc=explode('-', $namhochocky)[1];
			$hocky=explode('-', $namhochocky)[0];

			$thoikhoabieu=PhanCong::join('thoikhoabieu','thoikhoabieu.id','=','phancong.thoikhoabieu_id')->where('giaovien_id',$giaovien_id)->where('namhoc_id',$namhoc)->where('hocky_id',$hocky)->get();
			$giaovien=GiaoVien::where('id',$giaovien_id)->get();
			$loaimonhoc=$giaovien[0]->loaimonhoc_id;
			if ($loaimonhoc==2) {
				$monhoc_id=6;
			} 
			if ($loaimonhoc==3) {
				$monhoc_id=9;
			}

			if(count($thoikhoabieu)>0) {
				//giáo viên chủ nhiệm
				if ($loaimonhoc==1) {
					$thoikhoabieu_id=$thoikhoabieu[0]->id;
					$lop=Lop::where('id',$thoikhoabieu[0]->lop_id)->get();
					$buoi=BuoiHoc::where('thoikhoabieu_id',$thoikhoabieu_id)->take(1)->get();
					if (!empty($buoi[0])) {
						$time=$buoi[0]->thoigianbieu_id;//xem sáng hay chiều
					} else {
						$time=0;
					}

					$tiet1=BuoiHoc::join('monhoc','monhoc.id','=','buoihoc.monhoc_id')->where('thoikhoabieu_id',$thoikhoabieu_id)->where('thoigianbieu_id',1)->orderBy('thu','ASC')->get();
					$tiet2=BuoiHoc::join('monhoc','monhoc.id','=','buoihoc.monhoc_id')->where('thoikhoabieu_id',$thoikhoabieu_id)->where('thoigianbieu_id',2)->orderBy('thu','ASC')->get();
					$tiet3=BuoiHoc::join('monhoc','monhoc.id','=','buoihoc.monhoc_id')->where('thoikhoabieu_id',$thoikhoabieu_id)->where('thoigianbieu_id',3)->orderBy('thu','ASC')->get();
					$tiet4=BuoiHoc::join('monhoc','monhoc.id','=','buoihoc.monhoc_id')->where('thoikhoabieu_id',$thoikhoabieu_id)->where('thoigianbieu_id',4)->orderBy('thu','ASC')->get();
					$tiet5=BuoiHoc::join('monhoc','monhoc.id','=','buoihoc.monhoc_id')->where('thoikhoabieu_id',$thoikhoabieu_id)->where('thoigianbieu_id',5)->orderBy('thu','ASC')->get();
					$tiet=array(
						'tiet1'=>$tiet1,
						'tiet2'=>$tiet2,
						'tiet3'=>$tiet3,
						'tiet4'=>$tiet4,
						'tiet5'=>$tiet5,
						);
				} else {
					$thoikhoabieu_id=array();
					foreach ($thoikhoabieu as $key => $value) {
						$thoikhoabieu_id[]=$value->thoikhoabieu_id;
					}

					$tiet1=array();
					for($i=1;$i<=5;$i++) {
						$lophoc=BuoiHoc::join('thoikhoabieu','thoikhoabieu.id','=','buoihoc.thoikhoabieu_id')->join('lop','lop.id','=','thoikhoabieu.lop_id')->whereIn('thoikhoabieu_id',$thoikhoabieu_id)->where('thoigianbieu_id',1)->where('thu',$i)->where('monhoc_id',$monhoc_id)->get();
						if (empty($lophoc[0])) {
							$tiet1[]='';
						} else {
							$tiet1[]=$lophoc[0];
						}
					}

					$tiet2=array();
					for($i=1;$i<=5;$i++) {
						$lophoc=BuoiHoc::join('thoikhoabieu','thoikhoabieu.id','=','buoihoc.thoikhoabieu_id')->join('lop','lop.id','=','thoikhoabieu.lop_id')->whereIn('thoikhoabieu_id',$thoikhoabieu_id)->where('thoigianbieu_id',2)->where('thu',$i)->where('monhoc_id',$monhoc_id)->get();
						if (empty($lophoc[0])) {
							$tiet2[]='';
						} else {
							$tiet2[]=$lophoc[0];
						}
					}
					$tiet3=array();
					for($i=1;$i<=5;$i++) {
						$lophoc=BuoiHoc::join('thoikhoabieu','thoikhoabieu.id','=','buoihoc.thoikhoabieu_id')->join('lop','lop.id','=','thoikhoabieu.lop_id')->whereIn('thoikhoabieu_id',$thoikhoabieu_id)->where('thoigianbieu_id',3)->where('thu',$i)->where('monhoc_id',$monhoc_id)->get();
						if (empty($lophoc[0])) {
							$tiet3[]='';
						} else {
							$tiet3[]=$lophoc[0];
						}
					}
					$tiet4=array();
					for($i=1;$i<=5;$i++) {
						$lophoc=BuoiHoc::join('thoikhoabieu','thoikhoabieu.id','=','buoihoc.thoikhoabieu_id')->join('lop','lop.id','=','thoikhoabieu.lop_id')->whereIn('thoikhoabieu_id',$thoikhoabieu_id)->where('thoigianbieu_id',4)->where('thu',$i)->where('monhoc_id',$monhoc_id)->get();
						if (empty($lophoc[0])) {
							$tiet4[]='';
						} else {
							$tiet4[]=$lophoc[0];
						}
					}
					$tiet5=array();
					for($i=1;$i<=5;$i++) {
						$lophoc=BuoiHoc::join('thoikhoabieu','thoikhoabieu.id','=','buoihoc.thoikhoabieu_id')->join('lop','lop.id','=','thoikhoabieu.lop_id')->whereIn('thoikhoabieu_id',$thoikhoabieu_id)->where('thoigianbieu_id',5)->where('thu',$i)->where('monhoc_id',$monhoc_id)->get();
						if (empty($lophoc[0])) {
							$tiet5[]='';
						} else {
							$tiet5[]=$lophoc[0];
						}
					}
					$tiet6=array();
					for($i=1;$i<=5;$i++) {
						$lophoc=BuoiHoc::join('thoikhoabieu','thoikhoabieu.id','=','buoihoc.thoikhoabieu_id')->join('lop','lop.id','=','thoikhoabieu.lop_id')->whereIn('thoikhoabieu_id',$thoikhoabieu_id)->where('thoigianbieu_id',6)->where('thu',$i)->where('monhoc_id',$monhoc_id)->get();
						if (empty($lophoc[0])) {
							$tiet6[]='';
						} else {
							$tiet6[]=$lophoc[0];
						}
					}
					$tiet7=array();
					for($i=1;$i<=5;$i++) {
						$lophoc=BuoiHoc::join('thoikhoabieu','thoikhoabieu.id','=','buoihoc.thoikhoabieu_id')->join('lop','lop.id','=','thoikhoabieu.lop_id')->whereIn('thoikhoabieu_id',$thoikhoabieu_id)->where('thoigianbieu_id',7)->where('thu',$i)->where('monhoc_id',$monhoc_id)->get();
						if (empty($lophoc[0])) {
							$tiet7[]='';
						} else {
							$tiet7[]=$lophoc[0];
						}
					}
					$tiet8=array();
					for($i=1;$i<=5;$i++) {
						$lophoc=BuoiHoc::join('thoikhoabieu','thoikhoabieu.id','=','buoihoc.thoikhoabieu_id')->join('lop','lop.id','=','thoikhoabieu.lop_id')->whereIn('thoikhoabieu_id',$thoikhoabieu_id)->where('thoigianbieu_id',8)->where('thu',$i)->where('monhoc_id',$monhoc_id)->get();
						if (empty($lophoc[0])) {
							$tiet8[]='';
						} else {
							$tiet8[]=$lophoc[0];
						}
					}
					$tiet9=array();
					for($i=1;$i<=5;$i++) {
						$lophoc=BuoiHoc::join('thoikhoabieu','thoikhoabieu.id','=','buoihoc.thoikhoabieu_id')->join('lop','lop.id','=','thoikhoabieu.lop_id')->whereIn('thoikhoabieu_id',$thoikhoabieu_id)->where('thoigianbieu_id',9)->where('thu',$i)->where('monhoc_id',$monhoc_id)->get();
						if (empty($lophoc[0])) {
							$tiet9[]='';
						} else {
							$tiet9[]=$lophoc[0];
						}
					}
					$tiet10=array();
					for($i=1;$i<=5;$i++) {
						$lophoc=BuoiHoc::join('thoikhoabieu','thoikhoabieu.id','=','buoihoc.thoikhoabieu_id')->join('lop','lop.id','=','thoikhoabieu.lop_id')->whereIn('thoikhoabieu_id',$thoikhoabieu_id)->where('thoigianbieu_id',10)->where('thu',$i)->where('monhoc_id',$monhoc_id)->get();
						if (empty($lophoc[0])) {
							$tiet10[]='';
						} else {
							$tiet10[]=$lophoc[0];
						}
					}

					$tiet=array(
						'tiet1'=>$tiet1,
						'tiet2'=>$tiet2,
						'tiet3'=>$tiet3,
						'tiet4'=>$tiet4,
						'tiet5'=>$tiet5,
						'tiet6'=>$tiet6,
						'tiet7'=>$tiet7,
						'tiet8'=>$tiet8,
						'tiet9'=>$tiet9,
						'tiet10'=>$tiet10,
						);

				}
				echo json_encode($tiet);
			} else { 
				echo json_encode(0);
			}

		}

		if($action=="add_PhanCong")
		{
			$giaovien_id=$_GET['giaovien_id'];
			$lop=$_GET['lopadd'];
			$loaimonhoc=$_GET['loaimonhoc'];
			$namhoc=$_GET['namhoc'];
			$hocky=$_GET['hocky'];
			$thoikhoabieu=$_GET['thoikhoabieu'];

			if ($loaimonhoc==1) {
				//giáo viên chủ nhiệm không thể dạy 1 lúc 2 lớp
				$giaovienCN=PhanCong::join('giaovien','giaovien.id','=','phancong.giaovien_id')->join('thoikhoabieu','thoikhoabieu.id','=','phancong.thoikhoabieu_id')->where('giaovien_id',$giaovien_id)->where('namhoc_id',$namhoc)->where('hocky_id',$hocky)->where('loaimonhoc_id',1)->get();
				if (empty($giaovienCN[0])) {
					$phancong=new PhanCong;
					$phancong->giaovien_id=$giaovien_id;
					$phancong->thoikhoabieu_id=$thoikhoabieu;
					$phancong->save();
					echo 'ok';
				} else {
					echo 'Giáo viên này đã chủ nhiệm lớp khác';
				}
			} else {
				//xung đột buổi dạy
				$buoihocexist=BuoiHoc::join('monhoc','monhoc.id','=','buoihoc.monhoc_id')->where('thoikhoabieu_id',$thoikhoabieu)->where('loaimonhoc_id',$loaimonhoc)->get();

				if (!empty($buoihocexist[0])) {
					$buoihocadd=PhanCong::join('giaovien','giaovien.id','=','phancong.giaovien_id')->join('thoikhoabieu','thoikhoabieu.id','=','phancong.thoikhoabieu_id')->join('buoihoc','buoihoc.thoikhoabieu_id','=','thoikhoabieu.id')->where('giaovien_id',$giaovien_id)->where('namhoc_id',$namhoc)->where('hocky_id',$hocky)->where('lop_id',$lop)->where('giaovien.loaimonhoc_id','!=',1)->where('thu',$buoihocexist[0]->thu)->where('thoigianbieu_id',$buoihocexist[0]->thoigianbieu_id)->get();
					if (empty($buoihocadd[0])) {
						$phancong=new PhanCong;
						$phancong->giaovien_id=$giaovien_id;
						$phancong->thoikhoabieu_id=$thoikhoabieu;
						$phancong->save();
						echo 'ok';
					} else {
						echo 'Xung đột lịch dạy';
					}

				} else {
					$phancong=new PhanCong;
					$phancong->giaovien_id=$giaovien_id;
					$phancong->thoikhoabieu_id=$thoikhoabieu;
					$phancong->save();
					echo 'ok';
				}
			}

		}

		// if($action=='thoikhoabieu')
		// {
		// 	$giaovien=GiaoVien::all();
		// 	return view('admin.giaovien.thoikhoabieu',['giaovien'=>$giaovien]);
		// }

		if($action=='changeGiaoVien')
		{
			$loaimonhoc= $_GET['loaimonhoc'];
			$giaovien=GiaoVien::where('loaimonhoc_id',$loaimonhoc)->get();

			echo $giaovien;
		}

		if($action=='checkMonHocPhanCong')
		{
			$loaimonhoc= $_GET['loaimonhoc'];
			$thoikhoabieu= $_GET['thoikhoabieu'];
			$phancong=PhanCong::join('giaovien','giaovien.id','=','phancong.giaovien_id')->where('loaimonhoc_id',$loaimonhoc)->where('thoikhoabieu_id',$thoikhoabieu)->get();
			echo json_encode($phancong);
		}

		if($action=='changeMonHoc')
		{
			$idGV= $_GET['idGV'];
			$giaovien=GiaoVien::where('id',$idGV)->get();
			$kq="";
			foreach ($giaovien as $value) {
				$kq.='<option value="'.$value->loaimonhoc_id.'">'.$value->loaimonhoc->ten.'</option>';
			}
			echo $kq;
		}

		if($action=='getHuyenByTinhId') {
			$id=$_GET['id'];
			$huyen=Huyen::where('tinh_id',$id)->get();
			echo json_encode($huyen);
		}
	}

	public function create()
	{
		return view('admin.giaovien.themgiaovien');
	}

	public function add($action)
	{
		if($action=='phancong')
		{
			$giaovien=GiaoVien::all();
			$namhoc=NamHoc::orderBy('id', 'DESC')->take(1)->get();
			return view('admin.giaovien.themphancong',['giaovien'=>$giaovien,'namhoc'=>$namhoc]);
		}

	}

	public function store(Request $request)
	{
		if(isset($_POST['add_giaovien'])) {
			$giaovien=new GiaoVien;
			$giaovien->hoten=$_POST['hoten'];
			$giaovien->gioitinh=$_POST['gioitinh'];
			$giaovien->ngaysinh=$_POST['ngaysinh'];
			$giaovien->huyen_id=$_POST['huyen'];
			$giaovien->loaimonhoc_id=$_POST['loaimonhoc'];
			$giaovien->sodienthoai=$_POST['sodienthoai'];
			$giaovien->save();

			// $result=GiaoVien::select(['*','giaovien.id as id_giaovien','loaimonhoc.id as id_loaimonhoc','dantoc.ten as dantoc', 'tongiao.ten as tongiao'])->join('loaimonhoc','loaimonhoc.id','=','giaovien.loaimonhoc_id')->where('giaovien.id',$giaovien->id)->get();
			echo json_encode('ok');
		}

		// if(isset($request->search_gv))
		// {
		// 	$hoten=$request->hoten;
		// 	$gioitinh=$request->gioitinh;
		// 	$loaimonhoc=$request->loaimonhoc;
		// 	$giaovien=GiaoVien::where('hoten','like',"%$hoten%")->where('gioitinh',$gioitinh)->where('loaimonhoc_id',$loaimonhoc)->get();
		// 	return view('admin.giaovien.index',['giaovien'=>$giaovien,'hoten_search'=>$hoten,'gioitinh_search'=>$gioitinh,'loaimonhoc_search'=>$loaimonhoc]);
		// }

	}

	public function edit($id) {
	//find->obj, select->array
		$giaovien=GiaoVien::select(['*','giaovien.id as id_giaovien'])->join('huyen','huyen.id','=','giaovien.huyen_id')->join('tinh','tinh.id','=','huyen.tinh_id')->where('giaovien.id',$id)->get();
		echo json_encode($giaovien[0]);
	}


	public function update($id,Request $request)
	{
		$giaovien=GiaoVien::find($id);
		$giaovien->gioitinh=$request->gioitinh;
		$giaovien->huyen_id=$request->huyen;
		$giaovien->loaimonhoc_id=$request->loaimonhoc;
		$giaovien->sodienthoai=$request->sodienthoai;
		$giaovien->save();

		// $result=GiaoVien::select(['*','giaovien.id as id_giaovien','loaimonhoc.id as id_loaimonhoc'])->join('loaimonhoc','loaimonhoc.id','=','giaovien.loaimonhoc_id')->where('giaovien.id',$id)->get();
		// echo json_encode($result[0]);
		echo 'ok';
	}


	// public function update(Request $request, Article $article)
	// {
	// 	$article->update($request->all());

	// 	return response()->json($article, 200);
	// }

	// public function delete($id)
	// {
	// 	// $article->delete();

	// 	// return response()->json(null, 204);

	// 	$giaovien=GiaoVien::findOrFail($id);
	// 	$giaovien->delete();
	// 	return redirect('giaovien')->with('thongbao','Xóa thành công');
	// }

	// public function destroy($id,Request $request)
	// {
	// 	if(isset($request->del_giaovien))
	// 	{
	// 		$giaovien=GiaoVien::findOrFail($id);
	// 		$giaovien->delete();
	// 		return redirect('giaovien')->with('thongbao','Xóa thành công');
	// 	} 
	// 	if(isset($request->del_phancong))
	// 	{
	// 		$phancong=PhanCong::findOrFail($id);
	// 		$phancong->delete();
	// 		return redirect('giaovien/phancong')->with('thongbao','Xóa thành công');
	// 	} 
	// }
	public function destroy($action, Request $request) {
		if ($action=='delGiaoVien') {
			$id=$request->id;
			$giaovien=GiaoVien::findOrFail($id);
			$giaovien->delete();
			echo 'ok';
		} 
		if ($action=='delPhanCong') {
			$id=$request->id;
			$phancong=PhanCong::findOrFail($id);
			$phancong->delete();
			echo 'ok';
		} 
	}


	public function getTimKiem()
	{
		$lop= Lop::all();
		$namhoc= NamHoc::all();
		return view('admin.hocsinh.index',['lop'=>$lop,'namhoc'=>$namhoc]);
	}

	public function postTimKiem(Request $request)
	{
		$namhoc_id=$request->namhoc;
		$maso=$request->maso;
		$hoten=$request->hoten;
		$lop=$request->lop;
		$hocsinh=PhanLop::where('namhoc_id',$namhoc_id)->where('hocsinh_id',$maso)->where('lop_id',$lop)->get();
		return view('admin.hocsinh.index');
	}

}
