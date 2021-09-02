<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $table = "jobs";
    protected $fillable = ['id','name'];


//    public function employee()
//    {
//
//        return $this-> hasOne('App\Job',  'job_id' ,);
//
//    }

    // Relation
    public function employee()
    {
        return $this->hasOne('App\Job' ,'job_id' , 'id');
    }
}
