<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiMonHoc extends Model
{
	protected $table= 'loaimonhoc';
	protected $fillable = ['id', 'ten'];

	public $timestamps=false;

	 public function monhoc(){
     	return $this->hasMany('App\MonHoc','loaimonhoc_id','id');
     }

}
