<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table = "Courses";
    protected $fillable = ['id','name', 'price', 'techer_name', 'phone', 'course_duration'];


    public function student()
    {

        return $this->hasOne('App\Students',  'course_id');

    }

}
// end of student
