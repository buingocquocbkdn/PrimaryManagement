<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiemDanh extends Model
{
    protected $table= 'diemdanh';
    protected $fillable = ['id','hocsinh_id', 'lop_id','hocky_id','namhoc_id','ngay_vang','ghichu'];
    public $timestamps=false;
    public function hocsinh()
    {
    	return $this->belongsTo("App\HocSinh","hocsinh_id","id");
    }

    public function lop()
    {
    	return $this->belongsTo("App\Lop","lop_id","id");
    }

    public function hocky()
    {
    	return $this->belongsTo("App\HocKy","hocky_id","id");
    }

     public function namhoc()
    {
    	return $this->belongsTo("App\NamHoc","namhoc_id","id");
    }

}
