<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TietHoc extends Model
{
    protected $table= 'tiethoc';
    protected $fillable = ['id', 'monhoc_id','khoilop_id','hocky_id','sotiet'];

     public function monhoc(){
     	$this->belongsTo('App\MonHoc','monhoc_id','id');
     }

     public function khoilop(){
     	$this->belongsTo('App\KhoiLop','khoilop_id','id');
     }


     public function hocky(){
     	$this->belongsTo('App\HocKy','hocky_id','id');
     }
}
