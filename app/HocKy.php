<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocKy extends Model
{
    protected $table= 'hocky';
    protected $fillable = ['id', 'ten','heso','sotuan'];

     
}
