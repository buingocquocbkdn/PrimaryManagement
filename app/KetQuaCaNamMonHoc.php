<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KetQuaCaNamMonHoc extends Model
{
	protected $table= 'kq_ca_nam_mon_hoc';
	protected $fillable = ['hocsinh_id','monhoc_id', 'namhoc_id','lop_id', 'dtb_ca_nam'];
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
	
	public function lop()
	{
		return $this->belongsTo("App\Lop","lop_id","id");
	}
}
