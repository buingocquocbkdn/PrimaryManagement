<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HanhKiem extends Model
{
    protected $table= 'hanhkiem';
    protected $fillable = ['id', 'ten'];

}
