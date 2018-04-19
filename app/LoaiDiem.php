<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiDiem extends Model
{
    protected $table= 'loaidiem';
    protected $fillable = ['id', 'ten','heso'];

     public function diem(){
     	$this->hasMany('App\Diem','loaidiem_id','id');
     }

   
}
