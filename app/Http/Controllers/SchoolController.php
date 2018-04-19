<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GioiThieu;
use App\GiaoVien;
use App\KhoiLop;
use App\HoatDong;
use App\Lop;
use App\ThoiKhoaBieu;
use App\HocSinh;
use App\HocSinhThoiHoc;
use App\NamHoc;
use App\BuoiHoc;
use App\ThoiGianBieu;
use App\MonHoc;
use App\TietHoc;

class SchoolController extends Controller
{
    public function index(){
        $title="Tin tức";
        $arHoatDong = HoatDong::paginate(10);
        //dd($arHoatDong);
    	return view('school.index', ['arHoatDong'=> $arHoatDong, 'title'=> $title]);
    } 

    public function getChitiettin($name,$id=0){
        
        $hoatDong = HoatDong::findOrFail($id);
        $arItemLQs = HoatDong::where('id','!=',$id)->orderBy('id','DESC')->take(4)->get();
        $title=$hoatDong->ten;
        //dd($arHoatDong);
        return view('school.chitiettin', ['hoatDong'=> $hoatDong, 'title'=> $title, 'arItemLQs'=>$arItemLQs]);
    }

    public function getTongquan(){
         $title="Giới thiệu tổng quan";
        $arGioiThieu = GioiThieu::all();
       // dd($arGioiThieu);
    	return view('school.tongquan', ['arGioiThieu'=>$arGioiThieu, 'title'=> $title]);
    }

    public function getGiaovien(){
        $title="Giáo viên";
        $month = date('m');
        $year = date('Y');
        $obYears =NamHoc::orderBy('id','DESC')->get();
         foreach ($obYears as $obYear) {
             $arYear =explode('-',$obYear->ten);
             if(($month>=8 && $month<=12 && $year == $arYear[0])||($month<=6 && $month>=1 && $year == $arYear[1])){
                 $id_year=$obYear->id;
             }
         }
         $arLopChuNhiem = Lop::join('thoikhoabieu', 'lop.id', 'thoikhoabieu.id')
                            ->join('phancong','phancong.thoikhoabieu_id','thoikhoabieu.id')
                            ->select('lop.ten as tenlop','phancong.giaovien_id as giaovien_id')
                            ->get();
        //dd($arLopChuNhiem);

        //lấy id giáo viên và lớp chủ nhiệm tương ứng

        $arGiaoVien = GiaoVien::join('loaimonhoc','loaimonhoc_id','loaimonhoc.id')
                    ->select('giaovien.*','ten')
                    ->paginate(20);

       // dd($arGiaoVien);
        return view('school.giaovien', ['arGiaoVien'=> $arGiaoVien, 'arLopChuNhiem'=> $arLopChuNhiem,'title'=> $title]);
    }
     public function getHocsinh(){ 
        $title="Học sinh đang học";
       $arKhoiLop = KhoiLop::all();
       $arLop = Lop::all();

       // dd($arLop);
        return view('school.hocsinhdanghoc', ['khoilops'=>$arKhoiLop, 'lops'=>$arLop,'title'=> $title]);
    }

    public function postKhoiLop(Request $request){
        $lops = Lop::all();
        $arData =$request->all(); 
        $id = $arData['aid'];
        
       
        //kiem tra hoc ki hien tai
        $month = date('m');
        $year = date('Y');
        $obYears =NamHoc::orderBy('id','DESC')->get();
         foreach ($obYears as $obYear) {
             $arYear =explode('-',$obYear->ten);
             if(($month>=8 && $month<=12 && $year == $arYear[0])||($month<=6 && $month>=1 && $year == $arYear[1])){
                 $id_year=$obYear->id;
             }
         }
         
         //lay danh sach hoc sinh trong khoi
         $arhocsinh = HocSinh::join('phanlop','hocsinh.id','phanlop.hocsinh_id')
                                ->join('lop','lop_id','lop.id')
                                ->leftJoin('hocsinhthoihoc','hocsinh.id','hocsinhthoihoc.hocsinh_id')
                                ->where('hocsinhthoihoc.hocsinh_id',null)
                                ->where('namhoc_id',$id_year)
                                ->where('khoilop_id',$id)
                                ->select('hocsinh.*','ten')
                                ->orderBy('ten','ASC')
                                ->orderBy('hocsinh.id','ASC')
                                ->get();

       return view('school.searchkhoilophocsinh',['id'=> $id,'lops'=> $lops, 'arhocsinh'=>$arhocsinh]);
    }

 public function postLop(Request $request){
        $arData =$request->all(); 
        $lop = $arData['aid'];
        //kiem tra hoc ki hien tai
        $month = date('m');
        $year = date('Y');
        $obYears =NamHoc::orderBy('id','DESC')->get();
         foreach ($obYears as $obYear) {
             $arYear =explode('-',$obYear->ten);
             if(($month>=8 && $month<=12 && $year == $arYear[0])||($month<=6 && $month>=1 && $year == $arYear[1])){
                 $id_year=$obYear->id;
             }
         }
         
         //lay danh sach hoc sinh trong lớp
            /*$arlop = Lop::where('id',$lop)->get();
            $tenLop =$arlop[0]->ten;*/
            $arhocsinh =HocSinh::join('phanlop','hocsinh.id','phanlop.hocsinh_id')
                                ->join('lop','lop_id','lop.id')
                                ->leftJoin('hocsinhthoihoc','hocsinh.id','hocsinhthoihoc.hocsinh_id')
                                ->where('hocsinhthoihoc.hocsinh_id',null)
                                ->where('namhoc_id',$id_year)
                                ->where('lop.id',$lop)
                                ->select('hocsinh.*','ten')
                                ->orderBy('ten','ASC')
                                ->orderBy('hocsinh.id','ASC')
                                ->get();
           // dd($arhocsinh);
          
       return view('school.searchlophocsinh',compact('arhocsinh',$arhocsinh));
    }
    public function searchHocsinhDangHoc(Request $request){
       $arData =$request->all(); 
        $lop = $arData['lid'];
        $khoi=$arData['kid'];
        $name=trim($arData['tname']);
        
        if($name == ''){
           die();
        }
        $month = date('m');
        $year = date('Y');
        $obYears =NamHoc::orderBy('id','DESC')->get();
         foreach ($obYears as $obYear) {
             $arYear =explode('-',$obYear->ten);
             if(($month>=8 && $month<=12 && $year == $arYear[0])||($month<=6 && $month>=1 && $year == $arYear[1])){
                $id_year=$obYear->id;
             }
         }

    
        if($khoi == 0 && $lop == 0 && $name !='')
        {
            $arhocsinh =HocSinh::join('phanlop','hocsinh.id','phanlop.hocsinh_id')
                                ->join('lop','lop_id','lop.id')
                                ->leftJoin('hocsinhthoihoc','hocsinh.id','hocsinhthoihoc.hocsinh_id')
                                ->where('hocsinhthoihoc.hocsinh_id',null)
                                ->where('namhoc_id',$id_year)
                                ->where('hocsinh.hoten','like','%'.$name.'%')
                                ->select('hocsinh.*','ten')
                                ->orderBy('ten','ASC')
                                ->orderBy('hocsinh.id','ASC')
                                ->get();
                                //dd($arhocsinh);
        }
        if($lop !=0){
            $arlop = Lop::where('id',$lop)->get();
            $tenLop =$arlop[0]->ten;
            $arhocsinh =HocSinh::join('phanlop','hocsinh.id','phanlop.hocsinh_id')
                                ->join('lop','lop_id','lop.id')
                                ->leftJoin('hocsinhthoihoc','hocsinh.id','hocsinhthoihoc.hocsinh_id')
                                ->where('hocsinhthoihoc.hocsinh_id',null)
                                ->where('namhoc_id',$id_year)
                                ->where('lop.id',$lop)
                                ->where('hocsinh.hoten','like','%'.$name.'%')
                                ->select('hocsinh.*','ten')
                                ->orderBy('ten','ASC')
                                ->orderBy('hocsinh.id','ASC')
                                ->get();
        }elseif($khoi !=0)
        {
            
            $KhoiLop = KhoiLop::where('id',$khoi)->get();
            $tenKhoiLop =$KhoiLop[0]->ten;
            
            $arhocsinh = HocSinh::join('phanlop','hocsinh.id','phanlop.hocsinh_id')
                                ->join('lop','lop_id','lop.id')
                                ->leftJoin('hocsinhthoihoc','hocsinh.id','hocsinhthoihoc.hocsinh_id')
                                ->where('hocsinhthoihoc.hocsinh_id',null)
                                ->where('namhoc_id',$id_year)
                                ->where('khoilop_id',$khoi)
                                ->where('hocsinh.hoten','like','%'.$name.'%')
                                ->select('hocsinh.*','ten')
                                ->orderBy('ten','ASC')
                                ->orderBy('hocsinh.id','ASC')
                                ->get();
            
        }
        
        return view('school.searchlophocsinh',compact('arhocsinh',$arhocsinh));
        
    }

    public function gethocsinhthoihoc(){
        $title="Học sinh đã thôi học";
        $arhocsinh = HocSinhThoiHoc::leftJoin('hocsinh','hocsinh_id','id')
                                ->join('phanlop','hocsinh.id','phanlop.hocsinh_id')
                                ->join('lop','lop_id','lop.id')
                                ->select('hocsinh.*','ten','ngaythoihoc','ghichu')
                                ->orderBy('ten','ASC')
                                ->orderBy('hocsinh.id','ASC')
                                ->get();
                           // dd($arhocsinh);
            return view('school.hocsinhthoihoc', ['arhocsinh'=>$arhocsinh,'title'=> $title]);
    }
    
    public function getThoikhoabieu(){
        $title="Thời khóa biểu";
        $arLop = Lop::all();
        $arKhoiLop = KhoiLop::all();
       // dd($arLop);
        //lấy thời khóa biểu lớp 1A
        $ar = $this->ThoikhoabieuChiTiet('1A',1);
        //dd($ar);
        return view('school.thoikhoabieu', ['arKhoiLop'=>$arKhoiLop, 'arLop'=> $arLop, 'thu'=>$ar['thu'],'time'=>$ar['time'],'thoikhoabieu_id'=>$ar['thoikhoabieu_id'],'monhoc'=>$ar['monhoc'],'arLop'=> $ar['arLop'],'title'=> $title]);
    }

    public function postThoikhoabieuChiTiet(Request $request){
       $arData =$request->all(); 
         $id = $arData['aid'];
         $name = $arData['aname'];

         $ar = $this->ThoikhoabieuChiTiet($name,$id);
        //dd($ar);
        return view('school.thoikhoabieuchitiet', [ 'tenlop'=>$name,'thu'=>$ar['thu'],'time'=>$ar['time'],'thoikhoabieu_id'=>$ar['thoikhoabieu_id'],'monhoc'=>$ar['monhoc'],'arLop'=> $ar['arLop']]);
    }
    public function ThoikhoabieuChiTiet($name,$id){
        $arLop = Lop::all();
       $month = date('m');
       $year = date('Y');
        $namhoc=1;
        $hocky=1;
        $obYears =NamHoc::orderBy('id','DESC')->get();
         foreach ($obYears as $obYear) {
             $arYear =explode('-',$obYear->ten);
             if(($month>=8 && $month<=12 && $year == $arYear[0])){
                //$namhoc=1; 
              $namhoc=$obYear->id; 
                $id_hocki =1;
             }elseif($month<=6 && $month>=1 && $year == $arYear[1]){
                 //$namhoc=1; 
                $namhoc=$obYear->id; 
                 $hocky =2;
            }
         }
         $monhoc =MonHoc::all();
        $lop=$id;
        
        $thoikhoabieu=ThoiKhoaBieu::where('namhoc_id',$namhoc)->where('hocky_id',$hocky)->where('lop_id',$lop)->get();
        if(count($thoikhoabieu)>0)
        {
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
                );
            
            return $ar =['thu'=>$thu,'time'=>$time,'thoikhoabieu_id'=>$thoikhoabieu_id,'monhoc'=>$monhoc,'arLop'=> $arLop];
        } else {
             return $ar =['thu'=>0,'time'=>0,'thoikhoabieu_id'=>0,'monhoc'=>0,'arLop'=> 0];
        }
        }

         
        //return redirect('hocsinh/xemthoikhoabieu')->with('thongbao','Không tồn tại');

    }
    
}
