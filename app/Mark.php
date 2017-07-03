<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $fillable = array('student_id', 'assessment_id');
    public function student()
    {
        return $this->belongsTo('App\Student');
    }
    public function assessment()
    {
        return $this->belongsTo('App\Assessment');
    }
}
