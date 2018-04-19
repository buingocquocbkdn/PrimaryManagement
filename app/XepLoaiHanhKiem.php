<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class XepLoaiHanhKiem extends Model
{
    protected $table= 'xep_loai_hanh_kiem';
    protected $fillable = ['id','hocsinh_id', 'lop_id','hocky_id','namhoc_id','hanhkiem_id'];
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

    public function hanhkiem()
    {
    	return $this->belongsTo("App\HanhKiem","hanhkiem_id","id");
    }
}
