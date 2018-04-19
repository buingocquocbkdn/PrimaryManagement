<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NgheNghiep extends Model
{
	protected $table= 'nghenghiep';
	protected $fillable = ['id','ten'];
	public $timestamps=false;

	
}
