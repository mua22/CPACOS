<?php

namespace App;

use App\Traits\ProgramOrderMoveTrait;
use Illuminate\Database\Eloquent\Model;

class ProgramLearningOutcome extends Model
{
    use ProgramOrderMoveTrait;
    /*public function getOrderAttribute($value)
    {
        return 'PEO'.$value;
    }*/
    public function program()
    {
        return $this->belongsTo('App\Program');
    }
}
