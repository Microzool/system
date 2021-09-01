<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $table = "jobs";
    protected $fillable = ['id','name'];


    public function employee()
    {

        return $this->belongsTo('App\Job',  'job_id');

    }
}
