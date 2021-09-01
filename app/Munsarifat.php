<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Munsarifat extends Model
{
    //
    protected $table = "munsarifat";
    protected $fillable = ['date','statement' ,'amount'];
}
