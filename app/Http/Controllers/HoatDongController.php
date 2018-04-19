<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HoatDong;
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
use App\Http\Requests\HoatDongRequest;
use Illuminate\Support\Facades\Storage;

class HoatDongController extends Controller
{
	public function __construct()
	{
		$lop= Lop::all();
		$namhoc= NamHoc::all();
		$loaimonhoc=LoaiMonHoc::all();
		$hocky=HocKy::all();
		$giaovien=GiaoVien::all();
		view()->share('lop',$lop);
		view()->share('namhoc',$namhoc);
		view()->share('loaimonhoc',$loaimonhoc);
		view()->share('hocky',$hocky);
		view()->share('giaovien',$giaovien);
	}

     public function index(){
    	$hoatDong=HoatDong::all();
		return view('admin.hoatdong.index',['hoatDong'=>$hoatDong]);
    }

    public function getAdd(){
    	return view('admin.hoatdong.add');
    }

    public function postAdd(HoatDongRequest $request){
    	$tieuDe= $request->tieude;
    	$check = HoatDong::where('ten','=',$tieuDe)->first();
       	$time = time();	
		$subtime = date("Y-m-d H:i:s", $time);

        if($check != null){
        	$request->session()->flash('msg','Tiêu đề bị trùng');
        	return redirect()->route('admin.hoatdong.getadd');
        }else{

	       $picture = $request ->hinhanh;
	        $arrItem = array(
            "ten" => $tieuDe,
            "mota" =>$request ->mota,
            "ngay" =>$subtime,
          
        	);
	        if($picture !=""){
	            $tmp = $request->file("hinhanh")->store("file/");
	            $arr = explode("/",$tmp);
	            $namePic = end($arr);
	            $arrItem["hinh"] =$namePic;
	        }else{
	             $arrItem["hinh"] ="";
	        }

	        if(HoatDong::insert($arrItem)){
	             $request->session()->flash('msg','Thêm hoạt động thành công');
	              return redirect()->route('admin.hoatdong.index');
	          }else{
	                $request->session()->flash('msg','Thêm thất bại');
	              return redirect()->route('admin.hoatdong.index');
	           }
	    }
    }



    public function trangThai($nid){
        $objItem = HoatDong::find($nid);
        if($objItem->active == '0'){
            $objItem->active = '1';
            $objItem->save();
            echo "<a href='javascript:void(0)' onclick='getTrangThai( {$nid});'>
                 <img src='/storage/app/file/active.gif'/>
            </a>";
        }else{
            $objItem->active = '0';
            $objItem->save();
            echo "<a href='javascript:void(0)' onclick='getTrangThai( {$nid});'>
                 <img src='/storage/app/file/deactive.gif'/>
            </a>";
        }
    }


    public function getEdit($id){
    	$objHoatDong= HoatDong::FindOrFail($id);
    	return view('admin.hoatdong.edit',compact('objHoatDong'));
    }

    public function postEdit($id,HoatDongRequest $request){
    	$objHoatDong = HoatDong::FindOrFail($id);
        $tieuDe = $request ->tieude;
        $check = HoatDong::where('ten','=',$tieuDe)->where('id','!=',$id)->first();
       
        if($check != null){
        	$request->session()->flash('msg','Nội dung  bị trùng');
        	return redirect()->route('admin.hoatdong.getedit',$id);
        }else{

	       $objHoatDong->ten = $tieuDe;

	       $objHoatDong->mota = $request ->mota;
	       $time = time();	
			$subtime = date("Y-m-d H:i:s", $time);
	       $objHoatDong->ngay = $subtime;	      
	       $picture = $request ->hinhanh;

		    if(isset($request->delete_picture)){ //giao diện có hiện thị ra checkbox nhưng k chọn thì vẫn k tồn tại
	            
	            $oldPic = $objHoatDong->hinh;
	         
	            storage::delete("file/".$oldPic);

	            if($picture !=""){
	                $tmp = $request->file("hinhanh")->store("file/");
	                $arr = explode("/",$tmp);
	                $namePic = end($arr);
	                $objHoatDong->hinh = $namePic;
	            }else{
	                $objHoatDong->hinh="";
	            }
	      
	        }else{

	            if($picture !=""){
	                $tmp = $request->file("hinhanh")->store("file/");
	                $arr = explode("/",$tmp);
	                $namePic = end($arr);
	                
	                //xóa ảnh cũ
	                $oldPic = $objHoatDong->hinh;
	                if($oldPic != ""){
	                    storage::delete("file/".$oldPic);
	                }
	                $objHoatDong->hinh = $namePic;
	            
	            }
	        }
        }


       	if($objHoatDong->save()){
            $request->session()->flash('msg','Sửa thành công');
            return redirect()->route('admin.hoatdong.index');
       }else{
            $request->session()->flash('msg','Sửa thất bại');
          return redirect()->route('admin.hoatdong.getedit',$id);
       }
     
    }

    public function del(Request $request){   
     	$id = $request->xoa;
     	foreach($id as $did){

     		$objHoatDong = HoatDong::FindOrFail($did);    	
        	$namePic = $objHoatDong->picture;

	        if($namePic !=""){
	            storage::delete("files/".$namePic);
	        }

	        $objHoatDong->delete();
     	}
     	$request->session()->flash('msg','Xóa thành công');
         return redirect()->route('admin.hoatdong.index');
    	
    }

     public function getHoatDong(){
        $hoatdong = HoatDong::all();
        echo json_encode($hoatdong);
    }
}
