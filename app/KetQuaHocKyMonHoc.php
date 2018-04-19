<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KetQuaHocKyMonHoc extends Model
{
	protected $table= 'kq_hoc_ky_mon_hoc';
	protected $fillable = ['hocsinh_id','monhoc_id', 'namhoc_id', 'hocky_id','lop_id', 'dtb'];
	public $timestamps=false;

	public function hocsinh()
	{
		return $this->belongsTo("App\HocSinh","hocsinh_id","id");
	}

	public function monhoc()
	{
		return $this->belongsTo("App\MonHoc","monhoc_id","id");
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
