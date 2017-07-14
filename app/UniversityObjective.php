<?php

namespace App;

use App\Traits\OrderMoveTrait;
use Illuminate\Database\Eloquent\Model;

class UniversityObjective extends Model
{
    use OrderMoveTrait;
    public function getOrderAttribute($value)
    {
        return 'UO'.$value;
    }
}
