<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaoVien extends Model
{
	protected $table= 'giaovien';
	protected $fillable = ['id', 'hoten','huyen_id','sodienthoai','loaimonhoc_id','gioitinh','ngaysinh'];
	public $timestamps=false;

	public function loaimonhoc(){
		return $this->belongsTo('App\LoaiMonHoc','loaimonhoc_id','id');
	}

	public function phancong(){
		return $this->hasMany('App\PhanCong','giaovien_id','id');
	}


}
