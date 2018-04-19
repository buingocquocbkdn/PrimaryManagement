<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GioiThieu;
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
use App\Http\Requests\GioiThieuRequest;
use Illuminate\Support\Facades\Storage;

class GioiThieuController extends Controller
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
    	$gioiThieu=GioiThieu::all();
		return view('admin.gioithieu.index',['gioiThieu'=>$gioiThieu]);
    }

    public function getAdd(){
    	return view('admin.gioithieu.add');
    }

    public function postAdd(GioiThieuRequest $request){
    	$tieuDe= $request->tieude;
    	$check = GioiThieu::where('ten','=',$tieuDe)->first();

        if($check != null){
        	$request->session()->flash('msg','Tiêu đề bị trùng');
        	return redirect()->route('admin.gioithieu.getadd');
        }else{

	       $picture = $request ->hinhanh;
	        $arrItem = array(
            "ten" => $tieuDe,
            "mota" =>$request ->mota,     
        	);
	       

	        if(GioiThieu::insert($arrItem)){
	             $request->session()->flash('msg','Thêm  thành công');
	              return redirect()->route('admin.gioithieu.index');
	          }else{
	                $request->session()->flash('msg','Thêm thất bại');
	              return redirect()->route('admin.gioithieu.index');
	           }
	    }
    }



    public function trangThai($nid){
        $objItem = GioiThieu::FindOrFail($nid);
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
    	$objGioiThieu= GioiThieu::FindOrFail($id);
    	return view('admin.gioithieu.edit',compact('objGioiThieu'));
    }

    public function postEdit($id,GioiThieuRequest $request){
    	$objGioiThieu = GioiThieu::FindOrFail($id);
        $tieuDe = $request ->tieude;
        $check = GioiThieu::where('ten','=',$tieuDe)->where('id','!=',$id)->first();
       
        if($check != null){
        	$request->session()->flash('msg','Nội dung  bị trùng');
        	return redirect()->route('admin.gioithieu.getedit',$id);
        }else{

	       $objGioiThieu->ten = $tieuDe;
	       $objGioiThieu->mota = $request ->mota;	      
	      
	       if($objGioiThieu->save()){
            $request->session()->flash('msg','Sửa thành công');
            return redirect()->route('admin.gioithieu.index');
	       }else{
	            $request->session()->flash('msg','Sửa thất bại');
	          return redirect()->route('admin.gioithieu.getedit',$id);
	       }
		   
        }
    }

    public function del(Request $request){   
     	$id = $request->xoa;
     	foreach($id as $did){

     		$objGioiThieu = GioiThieu::FindOrFail($did);    	
        	$namePic = $objGioiThieu->picture;
	        $objGioiThieu->delete();
     	}
     	$request->session()->flash('msg','Xóa thành công');
         return redirect()->route('admin.gioithieu.index');
    	
    }
}
