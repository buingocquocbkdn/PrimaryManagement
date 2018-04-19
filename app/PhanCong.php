<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhanCong extends Model
{
    protected $table= 'phancong';
    protected $fillable = ['id','thoikhoabieu_id','giaovien_id'];
    public $timestamps=false;

     public function thoikhoabieu(){
        return $this->belongsTo('App\ThoiKhoaBieu','thoikhoabieu_id','id');
     }

     public function giaovien(){
     	return $this->belongsTo('App\GiaoVien','giaovien_id','id');
     }
}
