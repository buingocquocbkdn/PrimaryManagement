<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\NamHoc;
use App\KhoiLop;
use App\Lop;
use App\HocSinh;
use App\PhanLop;
use App\DanToc;
use App\TonGiao;
use App\HocKy;
use App\DiemDanh;
use App\MonHoc;
use App\LoaiDiem;
use App\Diem;
use App\HanhKiem;
use App\XepLoaiHanhKiem;
use App\TietHoc;
use App\PhanCong;
use App\GiaoVien;
use App\ThoiKhoaBieu;
use App\BuoiHoc;
use App\NgheNghiep;
use App\KetQuaHockyMonHoc;
use App\KetQuaHockyTongHop;
use App\KetQuaCaNamMonHoc;
use App\KetQuaCaNamTongHop;
use App\Huyen;
use App\Tinh;

class HocSinhController extends Controller
{
	public function __construct(){
		$nghenghiep=NgheNghiep::all();
		$dantoc=DanToc::all();
		$tongiao=TonGiao::all();
		$lop= Lop::all();
		$namhoc= NamHoc::orderBy('id','DESC')->get();
		$hocky=HocKy::all();
		$monhoc=MonHoc::all();
		$loaidiem=LoaiDiem::all();
		$hanhkiem=HanhKiem::all();
		$tinh=Tinh::all();
		$huyen=Huyen::all();
		view()->share('lop',$lop);
		view()->share('namhoc',$namhoc);
		view()->share('hocky',$hocky);
		view()->share('monhoc',$monhoc);
		view()->share('loaidiem',$loaidiem);
		view()->share('hanhkiem',$hanhkiem);
		view()->share('dantoc',$dantoc);
		view()->share('tongiao',$tongiao);
		view()->share('nghenghiep',$nghenghiep);
		view()->share('tinh',$tinh);
		view()->share('huyen',$huyen);
	}

	public function index(){
		$lop= Lop::all();
		$namhoc= NamHoc::orderBy('id','DESC')->get();
		return view('admin.hocsinh.index',['namhoc'=>$namhoc,'lop'=>$lop]);
	}

	public function getStudent($id){

		$hocsinh=HocSinh::select(['hocsinh.id as id','hocsinh.hoten as hoten','hocsinh.gioitinh as gioitinh','hocsinh.ngaysinh as ngaysinh','huyen.ten as huyen','tinh.ten as tinh','dantoc.ten as dantoc', 'tongiao.ten as tongiao','hocsinh.hotencha as hotencha','hocsinh.hotenme as hotenme', 'c.ten as nghenghiepcha', 'm.ten as nghenghiepme','hocsinh.sodienthoai as sodienthoai'])->join('dantoc','dantoc.id','=','hocsinh.dantoc_id')->join('tongiao','tongiao.id','=','hocsinh.tongiao_id')->join('nghenghiep as c','hocsinh.nghenghiepcha_id','=','c.id')->join('nghenghiep as m','m.id','=','hocsinh.nghenghiepme_id')->join('huyen','huyen.id','=','hocsinh.huyen_id')->join('tinh','tinh.id','=','huyen.tinh_id')->where('hocsinh.id',$id)->get();


		$lop=null;
	    if (!empty($hocsinh[0])) {
	    	$year=date('Y');
	    	$yearCurrent=$year.'-'.($year+1);
	    	$lop=PhanLop::select('lop.ten as lop')->join('lop','lop.id','=','phanlop.lop_id')->join('namhoc','namhoc.id','=','phanlop.namhoc_id')->where('hocsinh_id',$id)->where('namhoc.ten','like',"$yearCurrent")->get();
	    }

	    $student = array();
	    array_push($student,$hocsinh[0]->id);
	    array_push($student,$hocsinh[0]->hoten);
	    array_push($student,$hocsinh[0]->huyen);
	    array_push($student,$hocsinh[0]->tinh);
	    array_push($student,$hocsinh[0]->tongiao);
	    array_push($student,$hocsinh[0]->dantoc);
	    array_push($student,$hocsinh[0]->hotencha);
	    array_push($student,$hocsinh[0]->nghenghiepcha);
	    array_push($student,$hocsinh[0]->hotenme);
	    array_push($student,$hocsinh[0]->nghenghiepme);
	    array_push($student,$hocsinh[0]->gioitinh);
	    array_push($student,$hocsinh[0]->ngaysinh);
	    if (!empty($lop[0])) {
	    	array_push($student,$lop[0]->lop);
	    }

		echo json_encode($student);
	}

	public function getConductOfStudent($id){

		$hanhkiem= XepLoaiHanhKiem::select(['hanhkiem.ten as hanhkiem','namhoc.ten as namhoc','hocky.ten as hocky','lop.ten as lop'])->join('hanhkiem','hanhkiem.id','=','xep_loai_hanh_kiem.hanhkiem_id')->join('namhoc','namhoc.id','=','xep_loai_hanh_kiem.namhoc_id')->join('hocky','hocky.id','=','xep_loai_hanh_kiem.hocky_id')->join('lop','lop.id','=','xep_loai_hanh_kiem.lop_id')->where('xep_loai_hanh_kiem.hocsinh_id',$id)->get();

		echo json_encode($hanhkiem);
	}

	public function updateStudent($id,$diachi,$dantoc,$tongiao,$nghenghiepcha,$nghenghiepme,$sodienthoai){

		$idDanToc=DanToc::where('ten','like',"$dantoc")->get();
		$idTonGiao=TonGiao::where('ten','like',"$tongiao")->get();
		$nghenghiepcha=NgheNghiep::where('ten','like',"$nghenghiepcha")->get();
		$nghenghiepme=NgheNghiep::where('ten','like',"$nghenghiepme")->get();
		$huyen=Huyen::where('ten','like',"%$diachi%")->get();
		$hocsinh=HocSinh::find($id);
		$hocsinh->huyen_id=$huyen[0]->id;
		$hocsinh->tongiao_id=$idDanToc[0]->id;
		$hocsinh->dantoc_id=$idTonGiao[0]->id;
		$hocsinh->nghenghiepcha_id=$nghenghiepcha[0]->id;
		$hocsinh->nghenghiepme_id=$nghenghiepme[0]->id;
		$hocsinh->sodienthoai=$sodienthoai;
		$hocsinh->save();

		echo json_encode('success');
	}

	public function getScoreStudent($id){

		$diem = Diem::select(['monhoc.id','monhoc.ten as monhoc','lop.ten as lop','monhoc.heso as heso','hocky.ten as hocky','namhoc.ten as namhoc','diem.loaidiem_id as loaidiem'])->join('monhoc','diem.monhoc_id','=','monhoc.id')->join('namhoc','diem.namhoc_id','=','namhoc.id')->join('hocky','diem.hocky_id','=','hocky.id')->join('lop','diem.lop_id','=','lop.id')->where('diem.hocsinh_id',$id)->orderBy('monhoc.ten','ASC')->orderBy('hocky.ten','ASC')->get();

		$array= array();
		foreach ($diem as $key => $value) {
			$score=array();
			$score['maHS']=$id;
			$score['id']=$value->id;
			$score['monhoc']=$value->monhoc;
			$score['heso']=$value->heso;
			$score['hocki']=$value->hocky;
			$score['namhoc']=$value->namhoc;
			$score['lop']=$value->lop;

			$obj = Diem::select('diem.loaidiem_id','diem.diem')->join('hocky','hocky.id','=','diem.hocky_id')->where('monhoc_id',$value->id)->where('hocsinh_id',$id)->where('hocky.ten','like',"$value->hocky")->orderBy('loaidiem_id','ASC')->get();

			foreach ($obj as $key => $item) {
				$score['loaidiem'.($key+1)]=$item->diem;
			}
			if (!in_array($score,$array)) {
				array_push($array,$score);
			}
		}
		echo json_encode($array);
	}

	public function getScheduleOfStudent($id){

		$thoikhoabieu = PhanCong::select(['monhoc.ten as monhoc','buoihoc.thu as thu','namhoc.ten as namhoc','hocky.id as hocky','lop.ten as lop','thoigianbieu.id as tiet'])->join('thoikhoabieu','phancong.thoikhoabieu_id','=','thoikhoabieu.id')->join('buoihoc','buoihoc.thoikhoabieu_id','=','thoikhoabieu.id')->join('monhoc','buoihoc.monhoc_id','=','monhoc.id')->join('thoigianbieu','buoihoc.thoigianbieu_id','=','thoigianbieu.id')->join('lop','thoikhoabieu.lop_id','=','lop.id')->join('namhoc','thoikhoabieu.namhoc_id','=','namhoc.id')->join('hocky','thoikhoabieu.hocky_id','=','hocky.id')->join('giaovien','phancong.giaovien_id','=','giaovien.id')->join('phanlop','phanlop.lop_id','=','lop.id')->join('hocsinh','phanlop.hocsinh_id','=','hocsinh.id')->where('hocsinh.id',$id)->orderBy('hocky.id','ASC')->orderBy('buoihoc.thu','ASC')->orderBy('thoigianbieu.id','ASC')->distinct()->get();

		echo json_encode($thoikhoabieu);
	}

//=======go to add page==========
	public function create(Request $request){
		$dantoc=DanToc::all();
		$tongiao=TonGiao::all();
		if (isset($request->add_hocsinh)) {
			$lop=Lop::where('id',$request->lop)->get();
			$namhoc=NamHoc::where('id',$request->namhoc)->get();
			return view('admin.hocsinh.them',['dantoc'=>$dantoc,'tongiao'=>$tongiao,'lop'=>$lop,'namhoc'=>$namhoc]);
		} else {
			return view('admin.hocsinh.them',['dantoc'=>$dantoc,'tongiao'=>$tongiao]);
		}
	}

//=======show page==========
	public function show($action,Request $request){
		if($action=='searchHocSinh'){
			$namhoc=$_GET['namhoc'];
			$lop=$_GET['lop'];
			$hocsinh=PhanLop::select(['*','dantoc.ten as dantoc', 'tongiao.ten as tongiao', 'c.ten as nghenghiepcha', 'm.ten as nghenghiepme', 'huyen.ten as huyen', 'tinh.ten as tinh', 'hocsinh.id as idHS'])->join('hocsinh','hocsinh.id','=','phanlop.hocsinh_id')->join('dantoc','dantoc.id','=','hocsinh.dantoc_id')->join('tongiao','tongiao.id','=','hocsinh.tongiao_id')->join('nghenghiep as c','hocsinh.nghenghiepcha_id','=','c.id')->join('nghenghiep as m','m.id','=','hocsinh.nghenghiepme_id')->join('huyen','huyen.id','=','hocsinh.huyen_id')->join('tinh','tinh.id','=','huyen.tinh_id')->where('namhoc_id',$namhoc)->where('lop_id',$lop)->get();
			echo json_encode($hocsinh);
		}

		if($action=='timkiem'){
			return view('admin.hocsinh.index');
		}

		if($action=='tongket'){
			return view('admin.hocsinh.tongket');
		}

		if($action=='phanlop'){
			$yearCurrent=date("Y");
			$namhocDen= NamHoc::where('ten','like',"%$yearCurrent%")->get();
			return view('admin.hocsinh.phanlop',['namhocDen'=>$namhocDen]);
		}

		if($action=='diemdanh'){
			$yearCurrent=date("Y");
			$namhoc= NamHoc::where('ten','like',"%$yearCurrent%")->get();
			$hocky=HocKy::all();
			return view('admin.hocsinh.diemdanh',['namhoc'=>$namhoc,'hocky'=>$hocky]);
		}

		if($action=='searchDiemDanh'){
			$lop=$_GET['lop'];
			$namhoc=$_GET['namhoc'];
			$hocky=$_GET['hocky'];
			$hocsinh=PhanLop::join('hocsinh','hocsinh.id','=','phanlop.hocsinh_id')->where('namhoc_id',$namhoc)->where('lop_id',$lop)->get();
			echo json_encode($hocsinh);
		}

		if($action=='xemdiemdanh'){
			return view('admin.hocsinh.xemdiemdanh');
		}

		if($action=='search_xemDD'){
			$lop=$_GET['lop'];
			$namhoc=$_GET['namhoc'];
			$hocsinh=PhanLop::join('hocsinh','hocsinh.id','=','phanlop.hocsinh_id')->where('namhoc_id',$namhoc)->where('lop_id',$lop)->get();
			echo json_encode($hocsinh);
		}

		if($action=='detailDiemDanh'){
			$lop=$_GET['lop'];
			$namhoc=$_GET['namhoc'];
			$id=$_GET['id'];
			$hocky=$_GET['hocky'];
			$hocsinh=DiemDanh::where('namhoc_id',$namhoc)->where('lop_id',$lop)->where('hocky_id',$hocky)->where('hocsinh_id',$id)->get();
			echo json_encode($hocsinh);
		}

		if($action=='editDiemDanh'){
			$id=$_GET['id'];
			$ghichu=$_GET['ghichu'];
			$diemdanh=DiemDanh::find($id);
			$diemdanh->ghichu=$ghichu;
			$diemdanh->save();
			echo 'ok';
		}

		if($action=='diem'){
			$yearCurrent=date("Y");
			$namhoc= NamHoc::where('ten','like',"%$yearCurrent%")->get();
			$hocky=HocKy::all();
			return view('admin.hocsinh.diem',['namhoc'=>$namhoc,'hocky'=>$hocky]);
		}

		if($action=='searchDiem'){
			$lop=$_GET['lop'];
			$namhoc=$_GET['namhoc'];
			$hocky=$_GET['hocky'];
			$monhoc=$_GET['monhoc'];
			$maso=$_GET['maso'];
			$hoten=$_GET['hoten'];

			$hocsinh=PhanLop::join('hocsinh','hocsinh.id','=','phanlop.hocsinh_id')->where('namhoc_id',$namhoc)->where('lop_id',$lop)->where('hocsinh_id','like',"%$maso%")->where('hoten','like',"%$hoten%")->get();
			echo json_encode($hocsinh);
		}
		if($action=='search_xemD') {
			$lop=$_GET['lop'];
			$namhochocky=$_GET['namhoc'];
			$hocky=explode('-',$namhochocky)[0];
			$namhoc=explode('-',$namhochocky)[1];
			$monhoc=$_GET['monhoc'];

			$arrHS=array();
			$hocsinh=PhanLop::join('hocsinh','hocsinh.id','=','phanlop.hocsinh_id')->where('namhoc_id',$namhoc)->where('lop_id',$lop)->get();
			foreach ($hocsinh as $value) {
				$HS=array();
				array_push($HS,$value->hocsinh_id);
				array_push($HS,$value->hoten);
				for ($i=1; $i <=3 ; $i++) { 
					$diem=Diem::where('namhoc_id',$namhoc)->where('lop_id',$lop)->where('hocky_id',$hocky)->where('monhoc_id',$monhoc)->where('hocsinh_id',$value->hocsinh_id)->where('loaidiem_id',$i)->get();
					if (!empty($diem[0])) {
						array_push($HS,$diem[0]->diem);
					} else {
						array_push($HS,0);
					}

				}
				$dtb=KetQuaHockyMonHoc::select('dtb')->where('namhoc_id',$namhoc)->where('lop_id',$lop)->where('hocky_id',$hocky)->where('monhoc_id',$monhoc)->where('hocsinh_id',$value->hocsinh_id)->get();
				if (!empty($dtb[0])) {
					array_push($HS,$dtb[0]->dtb);
				} else {
					array_push($HS,'');
				}

				array_push($arrHS,$HS);
			}
			echo json_encode($arrHS);
		}

		if($action=='ajaxEditDiem') {

			$lop=$_GET['lop'];
			$namhochocky=$_GET['namhoc'];
			$hocky=explode('-',$namhochocky)[0];
			$namhoc=explode('-',$namhochocky)[1];
			$monhoc=$_GET['monhoc'];
			$result=explode(',',$_GET['result']);

			$hocsinh=PhanLop::where('namhoc_id',$namhoc)->where('lop_id',$lop)->get();
			$j=0;
			foreach ($hocsinh as $key => $item) {
				for ($i=1; $i <=3 ; $i++) { 
					$diem=Diem::where('namhoc_id',$namhoc)->where('lop_id',$lop)->where('hocky_id',$hocky)->where('monhoc_id',$monhoc)->where('hocsinh_id',$item->hocsinh_id)->where('loaidiem_id',$i)->get();
					if ($result[$j]!=-1) {
						if (empty($diem[0])) {
							$create=new Diem;
							$create->hocsinh_id=$item->hocsinh_id;
							$create->lop_id=$lop;
							$create->monhoc_id=$monhoc;
							$create->namhoc_id=$namhoc;
							$create->hocky_id=$hocky;
							$create->loaidiem_id=$i;
							$create->diem=$result[$j];
							$create->save();

						} else {
							$diem=Diem::where('namhoc_id',$namhoc)->where('lop_id',$lop)->where('hocky_id',$hocky)->where('monhoc_id',$monhoc)->where('hocsinh_id',$item->hocsinh_id)->where('loaidiem_id',$i)->update(['diem' => $result[$j]]);
						}
					}
					$j++;
				}
			}
			echo 'ok';
		}

		if($action=='ajaxConfirmDiem') {
			$lop=$_GET['lop'];
			$namhochocky=$_GET['namhoc'];
			$hocky=explode('-',$namhochocky)[0];
			$namhoc=explode('-',$namhochocky)[1];
			$monhoc=$_GET['monhoc'];
			$result=explode(',',$_GET['result']);

			$hocsinh=PhanLop::where('namhoc_id',$namhoc)->where('lop_id',$lop)->get();
			$j=0;
			foreach ($hocsinh as $key => $item) {
				for ($i=1; $i <=3 ; $i++) { 
					$diem=Diem::where('namhoc_id',$namhoc)->where('lop_id',$lop)->where('hocky_id',$hocky)->where('monhoc_id',$monhoc)->where('hocsinh_id',$item->hocsinh_id)->where('loaidiem_id',$i)->get();
					if (empty($diem[0])) {
						$create=new Diem;
						$create->hocsinh_id=$item->hocsinh_id;
						$create->lop_id=$lop;
						$create->monhoc_id=$monhoc;
						$create->namhoc_id=$namhoc;
						$create->hocky_id=$hocky;
						$create->loaidiem_id=$i;
						$create->diem=$result[$j];
						$create->save();
					} else {
						$diem=Diem::where('namhoc_id',$namhoc)->where('lop_id',$lop)->where('hocky_id',$hocky)->where('monhoc_id',$monhoc)->where('hocsinh_id',$item->hocsinh_id)->where('loaidiem_id',$i)->update(['diem' => $result[$j]]);
					}
					$j++;
				}
			}

			foreach ($hocsinh as $key => $item) {
				$dtb=0;
				for ($i=1; $i <=3 ; $i++) { 
					$diem=Diem::where('namhoc_id',$namhoc)->where('lop_id',$lop)->where('hocky_id',$hocky)->where('monhoc_id',$monhoc)->where('hocsinh_id',$item->hocsinh_id)->where('loaidiem_id',$i)->get();
					$dtb+=$diem[0]->diem*$i;
				}
				$create=new KetQuaHockyMonHoc;
				$create->hocsinh_id=$item->hocsinh_id;
				$create->monhoc_id=$monhoc;
				$create->namhoc_id=$namhoc;
				$create->hocky_id=$hocky;
				$create->lop_id=$lop;
				$create->dtb=number_format($dtb/6,2);
				$create->save();
				if ($hocky==2) {
					$create=new KetQuaCaNamMonHoc;
					$create->hocsinh_id=$item->hocsinh_id;
					$create->monhoc_id=$monhoc;
					$create->namhoc_id=$namhoc;
					$create->lop_id=$lop;
					$dtb1=KetQuaHockyMonHoc::select('dtb')->where('namhoc_id',$namhoc)->where('lop_id',$lop)->where('hocky_id',1)->where('monhoc_id',$monhoc)->where('hocsinh_id',$item->hocsinh_id)->get();
					$dtb2=KetQuaHockyMonHoc::select('dtb')->where('namhoc_id',$namhoc)->where('lop_id',$lop)->where('hocky_id',2)->where('monhoc_id',$monhoc)->where('hocsinh_id',$item->hocsinh_id)->get();
					$create->dtb_ca_nam=number_format(($dtb1[0]->dtb+2*$dtb1[0]->dtb)/3,2);
					$create->save();
				}
			}
			echo 'ok';
		}

		if($action=='ajaxDelDiem') {
			$lop=$_GET['lop'];
			$namhochocky=$_GET['namhoc'];
			$hocky=explode('-',$namhochocky)[0];
			$namhoc=explode('-',$namhochocky)[1];
			$monhoc=$_GET['monhoc'];
			$idHS=$_GET['idHS'];

			$del=Diem::where('namhoc_id',$namhoc)->where('lop_id',$lop)->where('hocky_id',$hocky)->where('monhoc_id',$monhoc)->where('hocsinh_id',$idHS)->get();
			foreach ($del as $value) {
				$value->delete();
			}
			echo 'ok';
		}

		if($action=='xemdiem'){
			return view('admin.hocsinh.xemdiem');
		}

		if($action=='search_xemTongKet') {
			$lop=$_GET['lop'];
			$namhoc=$_GET['namhoc'];
			$hocky=$_GET['hocky'];

			$monhoc=MonHoc::all();
			$arrHS=array();
			$hocsinh=PhanLop::join('hocsinh','hocsinh.id','=','phanlop.hocsinh_id')->where('namhoc_id',$namhoc)->where('lop_id',$lop)->get();
			foreach ($hocsinh as $value) {
				$HS=array();
				array_push($HS,$value->hocsinh_id);
				array_push($HS,$value->hoten);

				if ($hocky!=3) {
					foreach ($monhoc as $key => $item) {
						$dtb=KetQuaHockyMonHoc::select('dtb')->where('hocsinh_id',$value->hocsinh_id)->where('namhoc_id',$namhoc)->where('hocky_id',$hocky)->where('lop_id',$lop)->where('monhoc_id',$item->id)->get();
						if (!empty($dtb[0])) {
							array_push($HS,$dtb[0]->dtb);
						} else {
							array_push($HS,'');
						}
					}

					$dtb_mon_hoc_ky=KetQuaHockyTongHop::select('dtb_mon_hoc_ky')->where('hocsinh_id',$value->hocsinh_id)->where('namhoc_id',$namhoc)->where('hocky_id',$hocky)->where('lop_id',$lop)->get();
					if (!empty($dtb_mon_hoc_ky[0])) {
						array_push($HS,$dtb_mon_hoc_ky[0]->dtb_mon_hoc_ky);
					} else {
						array_push($HS,'');
					}
					$hanhkiem=XepLoaiHanhKiem::where('hocsinh_id',$value->hocsinh_id)->where('namhoc_id',$namhoc)->where('hocky_id',$hocky)->where('lop_id',$lop)->get();
					if (!empty($hanhkiem[0])) {
						array_push($HS,$hanhkiem[0]->hanhkiem_id);
					} else {
						array_push($HS,0);
					}
				} else {
					foreach ($monhoc as $key => $item) {
						$dtb=KetQuaCaNamMonHoc::where('hocsinh_id',$value->hocsinh_id)->where('namhoc_id',$namhoc)->where('lop_id',$lop)->where('monhoc_id',$item->id)->get();
						if (!empty($dtb[0])) {
							array_push($HS,$dtb[0]->dtb_ca_nam);
						} else {
							array_push($HS,'');
						}
					}
					$tonghop=KetQuaCaNamTongHop::where('hocsinh_id',$value->hocsinh_id)->where('namhoc_id',$namhoc)->where('lop_id',$lop)->get();
					if (!empty($tonghop[0])) {
						array_push($HS,$tonghop[0]->dtb_ca_nam);
						array_push($HS,$tonghop[0]->hanhkiem_id);
					} else {
						array_push($HS,'');
						array_push($HS,0);
					}
				}
				array_push($arrHS,$HS);
			}
			echo json_encode($arrHS);
		}

		if($action=='ajaxEditHanhKiem') {

			$lop=$_GET['lop'];
			$hocky=$_GET['hocky'];
			$namhoc=$_GET['namhoc'];
			$result=explode(',',$_GET['result']);

			$hocsinh=PhanLop::where('namhoc_id',$namhoc)->where('lop_id',$lop)->get();
			$j=0;
			foreach ($hocsinh as $key => $item) {
				$hanhkiem=XepLoaiHanhKiem::where('namhoc_id',$namhoc)->where('lop_id',$lop)->where('hocky_id',$hocky)->where('hocsinh_id',$item->hocsinh_id)->get();
				if (empty($hanhkiem[0])) {
					$create=new XepLoaiHanhKiem;
					$create->hocsinh_id=$item->hocsinh_id;
					$create->lop_id=$lop;
					$create->namhoc_id=$namhoc;
					$create->hocky_id=$hocky;
					$create->hanhkiem_id=$result[$j];
					$create->save();
				} else {
					$hanhkiem=XepLoaiHanhKiem::where('namhoc_id',$namhoc)->where('lop_id',$lop)->where('hocky_id',$hocky)->where('hocsinh_id',$item->hocsinh_id)->update(['hanhkiem_id' => $result[$j]]);
				}
				$j++;
			}
			echo 'ok';
		}

		if($action=='ajaxConfirmTongHop') {

			$lop=$_GET['lop'];
			$hocky=$_GET['hocky'];
			$namhoc=$_GET['namhoc'];
			$result=explode(',',$_GET['result']);
			$monhoc=MonHoc::all();
			
			$hocsinh=PhanLop::where('namhoc_id',$namhoc)->where('lop_id',$lop)->get();
			$j=0;
			foreach ($hocsinh as $key => $item) {
				$hanhkiem=XepLoaiHanhKiem::where('namhoc_id',$namhoc)->where('lop_id',$lop)->where('hocky_id',$hocky)->where('hocsinh_id',$item->hocsinh_id)->get();
				if (empty($hanhkiem[0])) {
					$create=new XepLoaiHanhKiem;
					$create->hocsinh_id=$item->hocsinh_id;
					$create->lop_id=$lop;
					$create->namhoc_id=$namhoc;
					$create->hocky_id=$hocky;
					$create->hanhkiem_id=$result[$j];
					$create->save();
				} else {
					$hanhkiem=XepLoaiHanhKiem::where('namhoc_id',$namhoc)->where('lop_id',$lop)->where('hocky_id',$hocky)->where('hocsinh_id',$item->hocsinh_id)->update(['hanhkiem_id' => $result[$j]]);
				}
				$j++;
			}

			foreach ($hocsinh as $key => $item) {
				$create=new KetQuaHockyTongHop;
				$create->hocsinh_id=$item->hocsinh_id;
				$dtb_mon_hoc_ky=0;
				$sum=0;
				foreach ($monhoc as $key => $value) {
					$dtb=KetQuaHockyMonHoc::join('monhoc','monhoc.id','=','kq_hoc_ky_mon_hoc.monhoc_id')->where('namhoc_id',$namhoc)->where('lop_id',$lop)->where('hocky_id',$hocky)->where('monhoc_id',$value->id)->where('hocsinh_id',$item->hocsinh_id)->get();
					$dtb_mon_hoc_ky+=$dtb[0]->dtb*$dtb[0]->heso;
					$sum+=$dtb[0]->heso;
					
				}
				$create->namhoc_id=$namhoc;
				$create->hocky_id=$hocky;
				$create->lop_id=$lop;
				$create->hanhkiem_id=$result[$j];
				$create->dtb_mon_hoc_ky=number_format($dtb_mon_hoc_ky/$sum,2);
				$create->save();

				if ($hocky==2) {
					$create=new KetQuaCaNamTongHop;
					$create->hocsinh_id=$item->hocsinh_id;
					$dtb=0;
					$sum=0;
					foreach ($monhoc as $key => $value) {
						$dtb=KetQuaCaNamMonHoc::join('monhoc','monhoc.id','=','kq_ca_nam_mon_hoc.monhoc_id')->where('namhoc_id',$namhoc)->where('lop_id',$lop)->where('monhoc_id',$value->id)->where('hocsinh_id',$item->hocsinh_id)->get();
						$dtb=$dtb[0]->dtb_ca_nam*$dtb[0]->heso;
						$sum+=$dtb[0]->heso;
					}
					$create->dtb_ca_nam=number_format($dtb/$sum,2);
					$create->namhoc_id=$namhoc;
					$create->hocky_id=$hocky;
					$create->lop_id=$lop;
					$create->hanhkiem_id=$result[$j];
					$create->save();
				}
				$j++;
			}
			echo 'ok';
		}

		if($action=='search_xemTKB') {
			$lop=$_GET['lop'];
			$namhochocky=$_GET['namhoc'];
			$namhoc=explode('-',$namhochocky)[1];
			$hocky=explode('-',$namhochocky)[0];
			$thoikhoabieu=ThoiKhoaBieu::where('namhoc_id',$namhoc)->where('hocky_id',$hocky)->where('lop_id',$lop)->get();
			if(count($thoikhoabieu)>0) {
				$thoikhoabieu_id=$thoikhoabieu[0]->id;
				$buoi=BuoiHoc::where('thoikhoabieu_id',$thoikhoabieu_id)->take(1)->get();
				if (!empty($buoi[0])) {
					$time=$buoi[0]->thoigianbieu_id;
					$monday=BuoiHoc::where('thoikhoabieu_id',$thoikhoabieu_id)->where('thu',1)->orderBy('thoigianbieu_id','ASC')->get();
					$tuesday=BuoiHoc::where('thoikhoabieu_id',$thoikhoabieu_id)->where('thu',2)->orderBy('thoigianbieu_id','ASC')->get();
					$wednesday=BuoiHoc::where('thoikhoabieu_id',$thoikhoabieu_id)->where('thu',3)->orderBy('thoigianbieu_id','ASC')->get();
					$thursday=BuoiHoc::where('thoikhoabieu_id',$thoikhoabieu_id)->where('thu',4)->orderBy('thoigianbieu_id','ASC')->get();
					$friday=BuoiHoc::where('thoikhoabieu_id',$thoikhoabieu_id)->where('thu',5)->orderBy('thoigianbieu_id','ASC')->get();
					$thu=array(
						'monday'=>$monday,
						'tuesday'=>$tuesday,
						'wednesday'=>$wednesday,
						'thursday'=>$thursday,
						'friday'=>$friday,
						'time'=>$time
						);
					echo json_encode($thu);
				} else {
					echo json_encode(0);
				}
			} else {
				echo json_encode(0);
			}
		}

		if($action=='ajaxAddThoiKhoaBieu') {
			$lop=$_GET['lop'];
			$time=$_GET['time'];
			$namhochocky=$_GET['namhochocky'];
			$namhoc=explode('-',$namhochocky)[1];
			$hocky=explode('-',$namhochocky)[0];
			$monday=explode(',',$_GET['monday']);
			$tuesday=explode(',',$_GET['tuesday']);
			$wednesday=explode(',',$_GET['wednesday']);
			$thursday=explode(',',$_GET['thursday']);
			$friday=explode(',',$_GET['friday']);

			// $check=ThoiKhoaBieu::where('lop_id',$lop)->where('hocky_id',$hocky)->where('namhoc_id',$namhoc)->get();
			// if(count($check)>0) {
			// 	echo 'Đã tồn tại thời khóa biểu';
			// }

			$thoikhoabieu=new ThoiKhoaBieu;
			$thoikhoabieu->lop_id=$lop;
			$thoikhoabieu->namhoc_id=$namhoc;
			$thoikhoabieu->hocky_id=$hocky;
			$thoikhoabieu->save();
			$i=0;
			if($time==0)
			{
				$i=1;
			} else {
				$i=6;
			}
			foreach ($monday as $key => $value) {
				$buoihoc=new BuoiHoc;
				$buoihoc->thoikhoabieu_id=$thoikhoabieu->id;
				$buoihoc->thoigianbieu_id=$i+$key;
				$buoihoc->thu=1;
				$buoihoc->monhoc_id=$value;
				$buoihoc->save();
			}
			foreach ($tuesday as $key => $value) {
				$buoihoc=new BuoiHoc;
				$buoihoc->thoikhoabieu_id=$thoikhoabieu->id;
				$buoihoc->thoigianbieu_id=$i+$key;
				$buoihoc->thu=2;
				$buoihoc->monhoc_id=$value;
				$buoihoc->save();
			}
			foreach ($wednesday as $key => $value) {
				$buoihoc=new BuoiHoc;
				$buoihoc->thoikhoabieu_id=$thoikhoabieu->id;
				$buoihoc->thoigianbieu_id=$i+$key;
				$buoihoc->thu=3;
				$buoihoc->monhoc_id=$value;
				$buoihoc->save();
			}
			foreach ($thursday as $key => $value) {
				$buoihoc=new BuoiHoc;
				$buoihoc->thoikhoabieu_id=$thoikhoabieu->id;
				$buoihoc->thoigianbieu_id=$i+$key;
				$buoihoc->thu=4;
				$buoihoc->monhoc_id=$value;
				$buoihoc->save();
			}
			foreach ($friday as $key => $value) {
				$buoihoc=new BuoiHoc;
				$buoihoc->thoikhoabieu_id=$thoikhoabieu->id;
				$buoihoc->thoigianbieu_id=$i+$key;
				$buoihoc->thu=5;
				$buoihoc->monhoc_id=$value;
				$buoihoc->save();
			}
			echo 'Lưu thành công';
		}

		if($action=='hanhkiem'){
			$namhoc=NamHoc::orderBy('id', 'DESC')->take(1)->get();
			$hocky_id=1;
			if(date("m")>1&&date("m")<5){
				$hocky_id=2;
			}
			$hocky=HocKy::where('id', $hocky_id)->get();
			return view('admin.hocsinh.hanhkiem',['namhoc'=>$namhoc,'hocky'=>$hocky]);
		}

		if($action=='xemhanhkiem'){
			return view('admin.hocsinh.xemhanhkiem');
		}

		if($action=='thoikhoabieu'){
			// $gvAV=GiaoVien::select('giaovien.id','giaovien.hoten')->join('loaimonhoc','loaimonhoc.id','=','giaovien.loaimonhoc_id')->where('loaimonhoc.ten','Anh Văn')->get();
			// $gvGDTC=GiaoVien::select('giaovien.id','giaovien.hoten')->join('loaimonhoc','loaimonhoc.id','=','giaovien.loaimonhoc_id')->where('loaimonhoc.ten','Giáo dục thể chất')->get();
			// return view('admin.hocsinh.thoikhoabieu',['gvAV'=>$gvAV,'gvGDTC'=>$gvGDTC]);
			return view('admin.hocsinh.thoikhoabieu');
		}

		if($action=='xemthoikhoabieu'){
			// $gvAV=GiaoVien::select('giaovien.id','giaovien.hoten')->join('loaimonhoc','loaimonhoc.id','=','giaovien.loaimonhoc_id')->where('loaimonhoc.ten','Anh Văn')->get();
			// $gvGDTC=GiaoVien::select('giaovien.id','giaovien.hoten')->join('loaimonhoc','loaimonhoc.id','=','giaovien.loaimonhoc_id')->where('loaimonhoc.ten','Giáo dục thể chất')->get();
			// return view('admin.hocsinh.thoikhoabieu',['gvAV'=>$gvAV,'gvGDTC'=>$gvGDTC]);
			return view('admin.hocsinh.xemthoikhoabieu');
		}

		if ($action=='ajaxKhoiLop') {
			$id=$_GET['id'];
			$khoilopdi=Lop::where('khoilop_id',$id-1)->get();
			$khoilopden=Lop::where('khoilop_id',$id)->get();
			$khoilop=array_merge($khoilopdi->toArray(),$khoilopden->toArray());

			echo json_encode($khoilop);

		}


		if ($action=='ajaxOpen') {
			$namhoc_id=$_GET['namhoc'];
			$lopchuyendi=$_GET['lopchuyendi'];

			// $namhoc=NamHoc::orderBy('id', 'DESC')->take(1)->get();
			// $namhoc_id_now=$namhoc[0]->id;

			// if($namhoc_id_now!=$namhoc_id){
			// 	$hocsinh_phanlop=PhanLop::select('hocsinh_id')->where('namhoc_id',$namhoc_id_now)->get();

			// 	$hocsinh=PhanLop::where('namhoc_id',$namhoc_id)->where('lop_id',$lopchuyendi)->whereNotIn('hocsinh_id',$hocsinh_phanlop)->get();
			// } else {
			$hocsinh=PhanLop::join('hocsinh','hocsinh.id','=','phanlop.hocsinh_id')->where('namhoc_id',$namhoc_id)->where('lop_id',$lopchuyendi)->get();
			// }

			echo json_encode($hocsinh);

		}

		if($action=='ajaxTiSo'){
			$lopchuyenden=$_GET['lopchuyenden'];
			$namhocDen=$_GET['namhocDen'];
			$tiso=PhanLop::where('namhoc_id',$namhocDen)->where('lop_id',$lopchuyenden)->count('hocsinh_id');
			echo json_encode($tiso);
		}


		if($action=='ajaxChuyenDen'){
			$result=json_decode($_GET['result']);
			$hocsinh=HocSinh::whereIn('id',$result)->get();
			echo json_encode($hocsinh);
		}
		if($action=='ajaxChuyenDi'){
			$result=json_decode($_GET['result']);
			$hocsinh=HocSinh::whereIn('id',$result)->get();
			echo json_encode($hocsinh);
		}

		if($action=='ajaxChuyenDenVe') {
			$result=json_decode($_GET['result']);
			$hocsinh=HocSinh::whereIn('id',$result)->get();
			echo json_encode($hocsinh);
		}

		if($action=='ajaxChuyenDiVe') {
			$result=json_decode($_GET['result']);
			$hocsinh=HocSinh::whereIn('id',$result)->get();
			echo json_encode($hocsinh);
		}

		if($action=='ajaxCancel') {
			$namhoc=$_GET['namhoc'];
			$lopchuyendi=$_GET['lopchuyendi'];

			$hocsinh=PhanLop::join('hocsinh','hocsinh.id','=','phanlop.hocsinh_id')->where('namhoc_id',$namhoc)->where('lop_id',$lopchuyendi)->get();
			echo json_encode($hocsinh);
		}

		if($action=='saveChuyenLop') {
			$namhoc=$_GET['namhocChuyenLop'];
			$lopchuyendi=$_GET['lopchuyendi'];
			$lopchuyenden=$_GET['lopchuyenden'];
			$result=json_decode($_GET['result']);

			foreach ($result as $value) {
				$idCurrent=PhanLop::where('namhoc_id',$namhoc)->where('lop_id',$lopchuyenden)->where('hocsinh_id',$value)->get();
				if (empty($idCurrent[0])) {

					$huyPhanLop=PhanLop::where('namhoc_id',$namhoc)->where('lop_id',$lopchuyendi)->where('hocsinh_id',$value)->delete();

					$phanlop=new PhanLop;
					$phanlop->namhoc_id=$namhoc;
					$phanlop->lop_id=$lopchuyenden;
					$phanlop->hocsinh_id=$value;
					$phanlop->save();
				}
			}
			echo 'ok';
		}

		if($action=='savePhanLop') {
			$namhocPhanLop=$_GET['namhocPhanLop'];
			$yearCurrent=date("Y");
			$namhocDi= NamHoc::where('ten','like',"%$yearCurrent%")->where('id','!=',$namhocPhanLop)->get();
			$idLopDi=$_GET['idLopDi'];
			$idLopDen=$_GET['idLopDen'];

			$idHSDi=PhanLop::select('hocsinh_id')->where('namhoc_id',$namhocDi[0]->id)->where('lop_id',$idLopDi)->get();
			$idHSDen=PhanLop::select('hocsinh_id')->where('namhoc_id',$namhocPhanLop)->where('lop_id',$idLopDen)->get();
			foreach ($idHSDi as $value) {
				if (!in_array($value, (array)$idHSDen[0])) {
					$phanlop=new PhanLop;
					$phanlop->namhoc_id=$namhocPhanLop;
					$phanlop->lop_id=$idLopDen;
					$phanlop->hocsinh_id=$value->hocsinh_id;
					$phanlop->save();
				}
			}
			echo 'ok';
		}


		if($action=='ajaxThoiKhoaBieu') {
			$monhoc=$_GET['monhoc'];
			$sotiet=$_GET['sotiet'];
			$lop=$_GET['lop'];
			$khoilop=Lop::where('id',$lop)->get();
			$tenmonhoc=Lop::select('ten')->where('id',$lop)->get();
			$hocky=$_GET['hocky'];

			$tiet=TietHoc::where('monhoc_id',$monhoc)->where('hocky_id',$hocky)->where('khoilop_id',$khoilop[0]->khoilop_id)->get();
			$tuan=HocKy::where('id',$hocky)->get();

			$tiet1tuan=ceil($tiet[0]->sotiet/$tuan[0]->sotuan);


			if($sotiet>$tiet1tuan){
				echo $tenmonhoc." không vượt quá ".$tiet1tuan+" trong 1 tuần";
			} else {
				echo '';
			}
		}

		if($action=='ajaxDelHanhKiem') {
			$id=$_GET['id'];
			$namhoc=$_GET['namhoc'];
			$lop=$_GET['lop'];
			$hocky=$_GET['hocky'];

			$hanhkiem=XepLoaiHanhKiem::find($id);
			$hanhkiem->delete();

			$namhoc_now=NamHoc::orderBy('id', 'DESC')->take(1)->get();
			$hocky_now=1;
			if(date("m")>1&&date("m")<5){
				$hocky_now =2;
			}

			$edit=0;
			if($namhoc==$namhoc_now[0]->id && $hocky==$hocky_now) {
				$edit=1;
			} 
			$hanhkiem=HanhKiem::all();
			$hocsinh=XepLoaiHanhKiem::where('namhoc_id',$namhoc)->where('hocky_id',$hocky)->where('lop_id',$lop)->get();
			$kq='';
			foreach($hocsinh as $hs){
				$kq.='<tr class="odd gradeX">'.
				'<td>'.$hs->hocsinh_id.'</td>'.
				'<td>'.$hs->hocsinh->hoten.'</td>'.
				'<td> <select name="loaihanhkiem" disabled="" id="loaihanhkiem-'.$hs->id.'"  class="form-control">';
				foreach($hanhkiem as $hk){
					$kq.='<option  ';
					if($hs->hanhkiem_id==$hk->id) {
						$kq.="selected";
					}  
					$kq.=' value="'.$hk->id.'">'.$hk->ten.'</option>';
				}
				$kq.='</select> </td>'.
				'<td><textarea disabled="" id="note-'.$hs->id.'" name="hanhkiem-'.$hs->hocsinh_id.'" value=""></textarea></td>';
				if($edit==1){
					$kq.='<td> <div class="icon-block col-md-3 col-sm-4"><i class="fa fa-edit"><input type="button" class="edit" name="'.$hs->id.'" value="Sửa" /></i></div>
				</td>';
			}

			$kq.='<td> <div class="icon-block col-md-3 col-sm-4"><i class="fa fa-edit"><input type="submit" class="del" name="" value="Xóa" onclick="return del('.$hs->id.')"/></i></div> </td> </tr>';
		}


		echo $kq;
	}

	if($action=='ajaxUpdateThoiKhoaBieu') {
		$thoikhoabieu_id=$_GET['thoikhoabieu_id'];
		$time=$_GET['time'];
		$monday=explode(',',$_GET['monday']);
		$tuesday=explode(',',$_GET['tuesday']);
		$wednesday=explode(',',$_GET['wednesday']);
		$thursday=explode(',',$_GET['thursday']);
		$friday=explode(',',$_GET['friday']);

		$i=0;
		if($time==0)
		{
			$i=1;
		} else {
			$i=6;
		}
		foreach ($monday as $key => $value) {
			$thoigianbieu_id=$i+$key;
			$buoihoc=BuoiHoc::where('thoikhoabieu_id',$thoikhoabieu_id)->where('thoigianbieu_id',$thoigianbieu_id)->where('thu',1)->update(['monhoc_id' => $value]);
			// $buoihoc->monhoc_id=$value;
			// $buoihoc->save();
		}
		foreach ($tuesday as $key => $value) {
			$buoihoc=BuoiHoc::where('thoikhoabieu_id',$thoikhoabieu_id)->where('thoigianbieu_id',$i+$key)->where('thu',2)->update(['monhoc_id' => $value]);
		}
		foreach ($wednesday as $key => $value) {
			$buoihoc=BuoiHoc::where('thoikhoabieu_id',$thoikhoabieu_id)->where('thoigianbieu_id',$i+$key)->where('thu',3)->update(['monhoc_id' => $value]);
		}
		foreach ($thursday as $key => $value) {
			$buoihoc=BuoiHoc::where('thoikhoabieu_id',$thoikhoabieu_id)->where('thoigianbieu_id',$i+$key)->where('thu',4)->update(['monhoc_id' => $value]);
		}
		foreach ($friday as $key => $value) {
			$buoihoc=BuoiHoc::where('thoikhoabieu_id',$thoikhoabieu_id)->where('thoigianbieu_id',$i+$key)->where('thu',5)->update(['monhoc_id' => $value]);
		}
		return 'ok';
	}

	if($action=='ajaxDelThoiKhoaBieu') {
		$thoikhoabieu_id=$_GET['thoikhoabieu_id'];
		$thoikhoabieu=ThoiKhoaBieu::find($thoikhoabieu_id);
		$thoikhoabieu->delete();
		$buoihoc=BuoiHoc::where('thoikhoabieu_id',$thoikhoabieu_id)->delete();
		return 'ok';
	}

	if($action=='getHuyenByTinhId') {
		$id=$_GET['id'];
		$huyen=Huyen::where('tinh_id',$id)->get();
		echo json_encode($huyen);
	}
}

public function store(Request $request) {
	if(isset($_POST['add_hocsinh'])) {
		$hocsinh=new HocSinh;
		$hocsinh->hoten=$_POST['hoten'];
		$hocsinh->gioitinh=$_POST['gioitinh'];
		$hocsinh->ngaysinh=$_POST['ngaysinh'];
		$hocsinh->huyen_id=$_POST['huyen'];
		$hocsinh->tongiao_id=$_POST['tongiao'];
		$hocsinh->dantoc_id=$_POST['dantoc'];
		$hocsinh->hotencha=$_POST['hotencha'];
		$hocsinh->nghenghiepcha_id=$_POST['nghenghiepcha'];
		$hocsinh->hotenme=$_POST['hotenme'];
		$hocsinh->nghenghiepme_id=$_POST['nghenghiepme'];
		$hocsinh->sodienthoai=$_POST['sodienthoai'];
		$hocsinh->save();

		$phanlop=new PhanLop;
		$phanlop->namhoc_id=$_POST['namhocadd'];
		$phanlop->lop_id=$_POST['lopadd'];
		$phanlop->hocsinh_id=$hocsinh->id;
		$phanlop->save();

		$result=HocSinh::select(['*','hocsinh.id as hocsinh_id','dantoc.ten as dantoc', 'tongiao.ten as tongiao'])->join('dantoc','dantoc.id','=','hocsinh.dantoc_id')->join('tongiao','tongiao.id','=','hocsinh.tongiao_id')->where('hocsinh.id',$hocsinh->id)->get();
		echo json_encode($result);
	}

		// if(isset($request->open_phanlop))
		// {
		// 	$namhoc=NamHoc::orderBy('id', 'DESC')->take(1)->get();
		// 	$namhoc_id_now=$namhoc[0]->id;

		// 	$namhoc_id=$request->namhoc;
		// 	$lop=$request->lopchuyendi;

		// 	if($namhoc_id_now!=$namhoc_id){
		// 		$hocsinh_phanlop=PhanLop::select('hocsinh_id')->where('namhoc_id',$namhoc_id_now)->get();

		// 		$hocsinh=PhanLop::where('namhoc_id',$namhoc_id)->where('lop_id',$lop)->whereNotIn('hocsinh_id',$hocsinh_phanlop)->get();
		// 	} else {
		// 		$hocsinh=PhanLop::where('namhoc_id',$namhoc_id)->where('lop_id',$lop)->get();
		// 	}
		// 	return view('admin.hocsinh.phanlop',['hocsinh'=>$hocsinh,'namhoc_search'=>$namhoc_id,'lop_search'=>$lop]);
		// }


	if(isset($_POST['diemdanh'])) {
		$lop=$_POST['lop'];
		$namhoc=$_POST['namhoc'];
		$hocky=$_POST['hocky'];
		$idDD=$_POST['idDD'];
		$id=explode(",", $idDD);

		foreach ($id as $value) {
			$diemdanh=new DiemDanh;
			$diemdanh->lop_id=$lop;
			$diemdanh->namhoc_id=$namhoc;
			$diemdanh->hocky_id=$hocky;
			$diemdanh->ngayvang=date("Y-m-d");
			$textarea="note-".$value;
			$diemdanh->ghichu=$request->$textarea;
			$diemdanh->hocsinh_id=$value;
			$diemdanh->save();
		}
		echo 'ok';
	}



	if(isset($request->diem))
	{
		$lop=$request->lop;
		$namhoc=$request->namhoc;
		$hocky=$request->hocky;
		$monhoc=$request->monhoc;
		$loaidiem=$request->loaidiem;
		$data=$request->data;
		$id=explode(",", $data);

		foreach ($id as $value) {
			$diem_input="diem-".$value;
				// if(!empty($request->$diem_input)) {
			$diem=new Diem;
			$diem->hocsinh_id=$value;
			$diem->monhoc_id=$monhoc;
			$diem->namhoc_id=$namhoc;
			$diem->hocky_id=$hocky;
			$diem->lop_id=$lop;
			$diem->loaidiem_id=$loaidiem;
			$diem->diem=$request->$diem_input;
			$diem->save();
				// }
		}
		return redirect('hocsinh/diem')->with('thongbao','Lưu thành công');
	}

	if(isset($request->search_HK))
	{
		$lop=$request->lop;
		$namhoc=$request->namhoc;
		$hocky=$request->hocky;

		$hocsinh=PhanLop::where('namhoc_id',$namhoc)->where('lop_id',$lop)->get();
		return view('admin.hocsinh.hanhkiem',['hocsinh'=>$hocsinh,'namhoc_search'=>$namhoc,'lop_search'=>$lop,'hocky_search'=>$hocky]);
	}

	if(isset($request->search_xemHK))
	{
		$lop=$request->lop;
		$namhoc=$request->namhoc;
		$hocky=$request->hocky;

		$namhoc_now=NamHoc::orderBy('id', 'DESC')->take(1)->get();
		$hocky_now=1;
		if(date("m")>1&&date("m")<5){
			$hocky_now =2;
		}

		$edit=0;
		if($namhoc==$namhoc_now[0]->id && $hocky==$hocky_now) {
			$edit=1;
		} 

		$hocsinh=XepLoaiHanhKiem::where('namhoc_id',$namhoc)->where('hocky_id',$hocky)->where('lop_id',$lop)->get();
		return view('admin.hocsinh.xemhanhkiem',['hocsinh'=>$hocsinh,'namhoc_search'=>$namhoc,'lop_search'=>$lop,'hocky_search'=>$hocky,'edit'=>$edit]);
	}

	if(isset($request->hanhkiem))
	{
		$lop=$request->lop;
		$namhoc=$request->namhoc;
		$hocky=$request->hocky;
		$loaihanhkiem=$request->loaihanhkiem;
		$data=$request->data;
		$id=explode(",", $data);

		foreach ($id as $value) {
			$hanhkiem_input="hanhkiem-".$value;
			$hanhkiem=new XepLoaiHanhKiem;
			$hanhkiem->hocsinh_id=$value;
			$hanhkiem->namhoc_id=$namhoc;
			$hanhkiem->hocky_id=$hocky;
			$hanhkiem->lop_id=$lop;
			$hanhkiem->hanhkiem_id=$loaihanhkiem;
			$hanhkiem->ghichu=$hanhkiem_input;
			$hanhkiem->save();
		}
		return redirect('hocsinh/hanhkiem')->with('thongbao','Lưu thành công');
	}


	if(isset($_POST['exportFile'])||isset($_POST['importFile'])){
		if (isset($_POST['exportFile'])) {
			$lop=$_POST['fromlop'];
			$namhoc=$_POST['namhocPhanLop'];
			$yearCurrent=date("Y");
			$namhocDi= NamHoc::where('ten','like',"%$yearCurrent%")->where('id','!=',$namhoc)->get();
			$tenlop=Lop::where('id',$lop)->get();
			$name=$tenlop[0]->ten;
			$hocsinh = PhanLop::select(['hocsinh.id as id','hocsinh.hoten as hoten'])->join('hocsinh','hocsinh.id','=','phanlop.hocsinh_id')->where('lop_id',$lop)->where('namhoc_id',$namhocDi[0]->id)->get()->toArray();
			$nameFile=$name.'_'.str_replace(' ', '', $namhocDi[0]->ten);
			$a= \Excel::create("$nameFile", function($excel) use ($hocsinh) {
				$excel->sheet("name", function($sheet) use ($hocsinh)
				{
					$sheet->fromArray($hocsinh);
				});
			})->download('xls');
		}

		if (isset($_POST['importFile'])) {
			if($request->hasFile('file')){
				$lop=$_POST['tolop'];
				$namhoc=$_POST['namhocPhanLop'];
				$path = $request->file('file')->getRealPath();
				$extension = $request->file('file')->getClientOriginalExtension();
				if ($extension!='xls') {
					dd('Không đúng định dạng file');
				}
				$data = \Excel::load($path)->get();
				if($data->count()){
					$arr='';
					foreach ($data as $key => $value) {
						if (!empty( $value->id)) {
							$arr[] = ['namhoc_id'=>$namhoc,'lop_id'=>$lop,'hocsinh_id' => $value->id];
						}
					}
					if(!empty($arr)){
						\DB::table('phanlop')->insert($arr);
						dd('Insert Record successfully.');
					}
				}
			}
			dd('Request data does not have any files to import.');     
		}

	}

	if (isset($_POST['exportFileDiem'])) {
		$lop=$_POST['lop'];
		$namhochocky=$_POST['namhoc'];
		$monhoc=$_POST['monhoc'];
		$hocky=explode('-',$namhochocky)[0];
		$namhoc=explode('-',$namhochocky)[1];

		$arrHS=array();
		$HS=array('id','họ tên','hệ số 1','hệ số 2','hệ số 3','tổng kết');
		array_push($arrHS,$HS);
		$hocsinh=PhanLop::join('hocsinh','hocsinh.id','=','phanlop.hocsinh_id')->where('namhoc_id',$namhoc)->where('lop_id',$lop)->get();
		foreach ($hocsinh as $value) {
			$HS=array();
			array_push($HS,$value->hocsinh_id);
			array_push($HS,$value->hoten);
			for ($i=1; $i <=3 ; $i++) { 
				$diem=Diem::where('namhoc_id',$namhoc)->where('lop_id',$lop)->where('hocky_id',$hocky)->where('monhoc_id',$monhoc)->where('hocsinh_id',$value->hocsinh_id)->where('loaidiem_id',$i)->get();
				if (!empty($diem[0])) {
					array_push($HS,$diem[0]->diem);
				} else {
					array_push($HS,0);
				}

			}
			$dtb=KetQuaHockyMonHoc::select('dtb')->where('namhoc_id',$namhoc)->where('lop_id',$lop)->where('hocky_id',$hocky)->where('monhoc_id',$monhoc)->where('hocsinh_id',$value->hocsinh_id)->get();
			if (!empty($dtb[0])) {
				array_push($HS,$dtb[0]->dtb);
			} else {
				array_push($HS,'');
			}

			array_push($arrHS,$HS);
		}

		$tenlop=Lop::where('id',$lop)->get();
		$name=$tenlop[0]->ten;

		$a= \Excel::create("$name", function($excel) use ($arrHS) {
			$excel->sheet("name", function($sheet) use ($arrHS)
			{
				$sheet->fromArray($arrHS);
			});
		})->download('xls');
	}

}

public function edit($id) {
	//find->obj, select->array
	$hocsinh=HocSinh::select(['*','hocsinh.id as idHS'])->join('huyen','huyen.id','=','hocsinh.huyen_id')->join('tinh','tinh.id','=','huyen.tinh_id')->where('hocsinh.id',$id)->get();
	echo json_encode($hocsinh[0]);
}

public function update($id,Request $request) {

	$hocsinh=HocSinh::find($id);
	$hocsinh->huyen_id=$request->huyen;
	$hocsinh->tongiao_id=$request->tongiao;
	$hocsinh->dantoc_id=$request->dantoc;
	$hocsinh->nghenghiepcha_id=$request->nghenghiepcha;
	$hocsinh->nghenghiepme_id=$request->nghenghiepme;
	$hocsinh->sodienthoai=$request->sodienthoai;
	$hocsinh->save();

	// $result=HocSinh::select(['*','hocsinh.id as hocsinh_id','dantoc.ten as dantoc', 'tongiao.ten as tongiao'])->join('dantoc','dantoc.id','=','hocsinh.dantoc_id')->join('tongiao','tongiao.id','=','hocsinh.tongiao_id')->where('hocsinh.id',$id)->get();
	echo 'ok';
}

// public function destroy($id,Request $request)
// {
// 	if(isset($request->del_hocsinh))
// 	{
// 		$hocsinh=HocSinh::findOrFail($id);
// 		$hocsinh->delete();
// 		return redirect('hocsinh')->with('thongbao','Xóa thành công');
// 	} 
// 	if(isset($request->del_thoikhoabieu))
// 	{
// 		$thoikhoabieu=ThoiKhoaBieu::findOrFail($id);
// 		$thoikhoabieu->delete();
// 		$buoihocrows=BuoiHoc::where('thoikhoabieu_id',$id)->delete;
// 		return redirect('hocsinh/thoikhoabieu')->with('thongbao','Xóa thành công');
// 	} 
// 	if(isset($request->del_diemdanh))
// 	{
// 		$diemdanh=DiemDanh::findOrFail($id);
// 		$diemdanh->delete();
// 		return redirect('hocsinh/xemdiemdanh')->with('thongbao','Xóa thành công');
// 	} 

// 	if(isset($request->del_diem))
// 	{
// 		// 	$diem=Diem::findOrFail($id);
// 		// 	$diem->delete();
// 		// 	return redirect('hocsinh/xemdiem')->with('thongbao','Xóa thành công');
// 		echo 'ok';
// 	} 
// }


public function destroy($action, Request $request) {
	if ($action=='delHocSinh') {
		$id=$request->id;
		$hocsinh=HocSinh::findOrFail($id);
		$hocsinh->delete();
		echo 'ok';
	} 
	if ($action=='delDiemDanh') {
		$id=$request->id;
		$diemdanh=DiemDanh::findOrFail($id);
		$diemdanh->delete();
		echo 'ok';
	} 
}

public function PostTimKiem(Request $request)
{
	$namhoc_id=$request->namhoc;
	$maso=$request->maso;
	$hoten=$request->hoten;
	$lop=$request->lop;
	$hocsinh=PhanLop::where('namhoc_id',$namhoc_id)->where('hocsinh_id',$maso)->where('lop_id',$lop)->get();
	return view('admin.hocsinh.index');
}

}
