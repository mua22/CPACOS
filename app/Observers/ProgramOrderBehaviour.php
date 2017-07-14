<?php
/**
 * Created by PhpStorm.
 * User: Usman
 * Date: 7/10/2017
 * Time: 12:07 PM
 */

namespace App\Observers;
use Illuminate\Database\Eloquent\Model;

class ProgramOrderBehaviour
{
    public function created(Model $orderModel)
    {

        $modelClass = get_class($orderModel);
        //dd(count($modelClass::where('program_id',$orderModel->program_id)->get()));
        $orderModel->order = count($modelClass::where('program_id',$orderModel->program_id)->get());
        $orderModel->save();
    }
    public function deleted(Model $orderModel)
    {
        $modelClass = get_class($orderModel);
        $i=1;
        foreach($modelClass::where('program_id',$orderModel->program_id)->get() as $row){
            $row->order = $i++;
            $row->save();
        }
    }
}