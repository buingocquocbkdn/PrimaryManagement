<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThoiKhoaBieu extends Model
{
	protected $table= 'thoikhoabieu';
	protected $fillable = ['id','lop_id', 'namhoc_id','hocky_id'];
	public $timestamps=false;

	public function buoihoc()
	{
		return $this->hasMany("App\BuoiHoc","thoikhoabieu_id","id");
	}

	public function lop()
	{
		return $this->belongsTo("App\Lop","lop_id","id");
	}

	public function namhoc()
	{
		return $this->belongsTo("App\NamHoc","namhoc_id","id");
	}

	public function hocky()
	{
		return $this->belongsTo("App\HocKy","hocky_id","id");
	}
}
