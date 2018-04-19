<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocSinh extends Model
{
    protected $table= 'hocsinh';
    protected $fillable = ['id', 'hoten','gioitinh','ngaysinh','huyen_id','dantoc_id','tongiao_id','hotencha','nghenghiepcha_id','hotenme','nghenghiepme_id','sodienthoai'];
    public $timestamps=false;

    public function dantoc()
    {
    	return $this->belongsTo("App\DanToc","dantoc_id","id");
    }

    public function tongiao()
    {
    	return $this->belongsTo("App\TonGiao","tongiao_id","id");
    }

    public function diemdanh()
    {
    	return $this->hasMany("App\DiemDanh","hocsinh_id","id");
    }

     public function diem()
    {
    	return $this->hasMany("App\Diem","hocsinh_id","id");
    }

     public function lop()
    {
    	return $this->belongsTo("App\Lop","lop_id","id");
    }

    public function nghenghiepcha()
    {
        return $this->belongsTo("App\Lop","nghenghiepcha_id","id");
    }

    public function nghenghiepme()
    {
        return $this->belongsTo("App\Lop","nghenghiepme_id","id");
    }

    // public function huyen()
    // {
    //     return $this->belongsTo("App\Lop","nghenghiepme_id","id");
    // }
}
