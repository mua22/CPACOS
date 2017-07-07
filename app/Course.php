<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function assessments()
    {
        return $this->hasMany('App\Assessment');
    }
    public function clos()
    {
        return $this->hasMany('App\CourseLearningOutcome');
    }

    public function students()
    {
        return $this->belongsToMany('App\Student');
    }

    public function getTitleAttribute($value)
    {
        return $this->code." ".$value;
    }
}
