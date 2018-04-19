<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThuVien extends Model
{
    protected $table= 'thuvien';
    protected $fillable = ['id', 'tentailieu','hinh','mota'];

}
