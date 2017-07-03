<?php
/**
 * Created by PhpStorm.
 * User: Usman
 * Date: 7/1/2017
 * Time: 5:41 PM
 */

namespace App\Observers;
use Illuminate\Database\Eloquent\Model;

class OrderBehaviour
{
    public function created(Model $orderModel)
    {
        $modelClass = get_class($orderModel);
        $orderModel->order = count($modelClass::all());
        $orderModel->save();
    }
    public function deleted(Model $orderModel)
    {
        $modelClass = get_class($orderModel);
        $i=1;
        foreach($modelClass::all() as $row){
            $row->order = $i++;
            $row->save();
        }

    }

}