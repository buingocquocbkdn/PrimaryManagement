<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocSinhThoiHoc extends Model
{
    protected $table= 'hocsinhthoihoc';
    protected $fillable = ['hocsinh_id', 'ngaythoihoc','ghĩhu'];

     public function hocsinh(){
     	$this->belongsTo('App\HocSinh','hocsinh_id');
     }

}
