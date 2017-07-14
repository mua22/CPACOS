<?php
/**
 * Created by PhpStorm.
 * User: Usman
 * Date: 7/10/2017
 * Time: 2:34 PM
 */

namespace App\Traits;


trait OrderMoveTrait
{
    public function up()
    {
        $modelClass = get_class($this);
        $upper = $modelClass::where('order','<',$this->order)->orderBy('order','DESC')->first();
        $upper->order = $upper->order+1;
        //dd($upper->title);
        $upper->save();
        $this->order = $this->order-1;
        $this->save();
    }

    public function down()
    {
        $modelClass = get_class($this);
        $upper = $modelClass::where('order','>',$this->order)->orderBy('order')->first();
        $upper->order = $upper->order-1;
        //dd($upper->title);
        $upper->save();
        $this->order = $this->order+1;
        $this->save();
    }
}