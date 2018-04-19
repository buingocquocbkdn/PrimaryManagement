<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanToc extends Model
{
    protected $table= 'dantoc';
    protected $fillable = ['id', 'ten'];

    public function hocsinh()
    {
    	return $this->hasMany("App\HocSinh","dantoc_id","id");
    }
}
