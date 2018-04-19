<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhanLop extends Model
{
    protected $table= 'phanlop';
    protected $fillable = ['id','namhoc_id', 'lop_id','hocsinh_id'];
     public $timestamps=false;

     public function namhoc()
    {
    	return $this->belongsTo("App\NamHoc","namhoc_id","id");
    }

    public function lop()
    {
    	return $this->belongsTo("App\Lop","lop_id","id");
    }

    public function hocsinh()
    {
    	return $this->belongsTo("App\HocSinh","hocsinh_id","id");
    }

}
