<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuoiHoc extends Model
{
	protected $table= 'buoihoc';
	protected $fillable = ['thoikhoabieu_id','thoigianbieu_id', 'thu','monhoc_id'];
	public $timestamps=false;

	public function thoikhoabieu()
	{
		return $this->belongsTo("App\ThoiKhoaBieu","thoikhoabieu_id","id");
	}

	public function thoigianbieu()
	{
		return $this->belongsTo("App\ThoiGianBieu","thoigianbieu_id","id");
	}

	public function monhoc()
	{
		return $this->belongsTo("App\MonHoc","monhoc_id","id");
	}
	
}
