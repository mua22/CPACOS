<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use kanazaca\CounterCache\CounterCache;

class Student extends Model
{

    protected $fillable = array('registration_no', 'name');
    public function courses()
    {
        return $this->belongsToMany('App\Course');
    }

}
