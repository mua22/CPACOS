<?php
/**
 * Created by PhpStorm.
 * User: Usman
 * Date: 7/13/2017
 * Time: 8:33 AM
 */

namespace App\Traits;


trait ProgramOrderMoveTrait
{
    public function up()
    {
        $modelClass = get_class($this);
        $where = [['order','<',$this->order],['program_id','=',$this->program_id]];
        //dd($where);
        $upper = $modelClass::where($where)->orderBy('order','DESC')->first();
        //dd($upper);
        $upper->order = $upper->order+1;
       // dd($upper->title);
        $upper->save();
        $this->order = $this->order-1;
        $this->save();
    }

    public function down()
    {
        $modelClass = get_class($this);
        $upper = $modelClass::where([['order','>',$this->order],['program_id','=',$this->program_id]])->orderBy('order')->first();
        $upper->order = $upper->order-1;
        //dd($upper->title);
        $upper->save();
        $this->order = $this->order+1;
        $this->save();
    }
}