<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = "students";
    protected $fillable = ['full_name' ,'phone','course_id'];

    public function scopeSelection($query){
        return $query -> select('id','full_name','phone','course_id');
    }


    // Relation
    public function course()
    {
        return $this->belongsTo(Courses::class ,'course_id' ,'id');
    }
}


