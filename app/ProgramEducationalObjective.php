<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramEducationalObjective extends Model
{
    public function getOrderAttribute($value)
    {
        return 'PEO'.$value;
    }
}
