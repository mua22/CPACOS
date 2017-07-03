<?php

use Illuminate\Database\Seeder;
use App\ProgramEducationalObjective;
class POSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=3;$i++){
            $peo = new ProgramEducationalObjective();
            $peo->title = "Program Educational Objectives $i";
            $peo->save();

        }
        for($i=1;$i<=12;$i++){
            $plo = new \App\ProgramLearningOutcome();
            $plo->title = "Program Learning Outcome $i";
            $plo->save();
        }
    }

}
