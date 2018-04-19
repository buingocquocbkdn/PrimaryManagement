<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonHoc extends Model
{
    protected $table= 'monhoc';
    protected $fillable = ['id', 'ten','heso','loaimonhoc_id'];

    public function loaimonhoc()
    {
    	return $this->belongsTo("App\LoaiMonHoc","loaimonhoc_id","id");
    }

}
