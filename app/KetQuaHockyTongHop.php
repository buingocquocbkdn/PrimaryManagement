<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KetQuaHocKyTongHop extends Model
{
	protected $table= 'kq_hoc_ky_tong_hop';
	protected $fillable = ['hocsinh_id', 'namhoc_id', 'hocky_id','lop_id','hanhkiem_id', 'dtb_mon_hoc_ky'];
	public $timestamps=false;

	public function hocsinh()
	{
		return $this->belongsTo("App\HocSinh","hocsinh_id","id");
	}

	public function hanhkiem()
	{
		return $this->belongsTo("App\HanhKiem","hanhkiem_id","id");
	}

	public function namhoc()
	{
		return $this->belongsTo("App\NamHoc","namhoc_id","id");
	}
	
	public function hocky()
	{
		return $this->belongsTo("App\HocKy","hocky_id","id");
	}

	public function lop()
	{
		return $this->belongsTo("App\Lop","lop_id","id");
	}
}
