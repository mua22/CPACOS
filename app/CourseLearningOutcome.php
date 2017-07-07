<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseLearningOutcome extends Model
{
    public function getOrderAttribute($value)
    {
        return 'CLO'.$value;
    }
    public function assessments()
    {
        return $this->belongsToMany('App\Assessment');
    }

}
