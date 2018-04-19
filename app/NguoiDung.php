<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NguoiDung extends Model
{
	protected $table = "nguoidung";
	protected $fillable = ['id', 'maso','password','email','active','permission'];
	public $timestamps =false;

}
