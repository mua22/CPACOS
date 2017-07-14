<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    public function peos()
    {
        return $this->hasMany('App\ProgramEducationalObjective');
    }
    public function plos()
    {
        return $this->hasMany('App\ProgramLearningOutcome');
    }

    public function getProgramObjectives()
    {
        return ProgramEducationalObjective::where('program_id',$this->id)->orderBy('order')->get();;
    }
    public function getuniversityObjectivesPEOSMappings()
    {
        $program_objectives = $this->getProgramObjectives();
        $array_in = array();
        foreach($program_objectives as $objective)
        {
            array_push($array_in,$objective->id);

        }
        $mappings_obs = UniversityProgramObjectiveMapping::whereIn('program_educational_objective_id',$array_in)->get();
        return $mappings_obs;
    }
}
