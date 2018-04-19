<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocLuc extends Model
{
    protected $table= 'hocluc';
    protected $fillable = ['id', 'ten','diemcantren','diemcanduoi'];

}
