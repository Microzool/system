<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = "students";
    protected $fillable = ['full_name' ,'phone','course_id'];

    public function course()
    {

        return $this->hasOne('App\Courses' , 'id');

    } // end of course
}
