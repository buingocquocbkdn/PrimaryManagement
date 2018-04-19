<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diem extends Model
{
 protected $table= 'diem';
 protected $fillable = ['id', 'hocsinh_id','namhoc_id','hocky_id','lop_id','loaidiem_id','diem'];
 public $timestamps=false;

 public function hocsinh(){
   return $this->belongsTo('App\HocSinh','hocsinh_id','id');
}

public function namhoc(){
   return $this->belongsTo('App\NamHoc','namhoc_id','id');
}

public function hocky(){
   return $this->belongsTo('App\HocKy','hocky_id','id');
}

public function lop(){
   return $this->belongsTo('App\Lop','lop_id','id');
}

public function loaidiem(){
   return $this->belongsTo('App\LoaiDiem','loaidiem_id','id');
}
}
