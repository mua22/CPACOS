<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramLearningOutcome extends Model
{
    public function getOrderAttribute($value)
    {
        return 'PLO'.$value;
    }
}
