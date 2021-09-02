<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $table = "employee";
    protected $fillable = ['name' ,'email','phone','address','salary','job_id'];

//    public function job()
//    {
//
//        return $this->belongsTo('Job::class' , 'id');
//
//    } // end of course

    // Relation
    public function job()
    {
        return $this->belongsTo(Job::class ,'job_id','id' );
    }
}
