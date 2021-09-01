<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = "teaher";
    protected $fillable = ['full_name' ,'phone','course_id'];



}
