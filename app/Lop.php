<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    protected $table= 'lop';
     protected $fillable = ['id', 'ten','khoilop_id'];

     public function phanlop(){
     	return $this->hasMany('App\PhanLop','lop_id','id');
     }

     public function phancong(){
     	return $this->hasMany('App\PhanCong','lop_id','id');
     }

      

}
