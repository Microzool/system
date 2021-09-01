<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $table = "employee";
    protected $fillable = ['name' ,'email','phone','address','salary','job_id'];

    public function job()
    {

        return $this->hasOne('App\Job' , 'id');

    } // end of course
}
