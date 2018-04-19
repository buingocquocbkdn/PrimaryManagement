<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThoiGianBieu extends Model
{
    protected $table= 'thoigianbieu';
    protected $fillable = ['id', 'giobatdau','gioketthuc','noidung'];

}
