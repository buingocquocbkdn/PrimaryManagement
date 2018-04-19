<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoatDong extends Model
{
    protected $table= 'hoatdong';
    public $timestamps =false;
    protected $fillable = ['id', 'ten','mota','hinh','ngay'];
}
