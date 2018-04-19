<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhoiLop extends Model
{
    protected $table= 'khoilop';
    protected $fillable = ['id', 'ten'];

     public function lop(){
     	$this->hasMany('App\Lop','lop_id','id');
     }

}
