<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use kanazaca\CounterCache\CounterCache;
class Assessment extends Model
{
    use CounterCache;
    // you can have more than one counter
    public $counterCacheOptions = [
        'Course' => ['field' => 'assessments_count', 'foreignKey' => 'course_id']
    ];
    public function marks()
    {
        return $this->hasMany('App\Mark');
    }
    public function Course()
    {
        return $this->belongsTo('App\Course');
    }
    public function clos()
    {
        return $this->belongsToMany('App\CourseLearningOutcome');
    }
}
