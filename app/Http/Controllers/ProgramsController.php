<?php

namespace App\Http\Controllers;

use App\ProgramEducationalObjective;
use App\UniversityObjective;
use App\UniversityProgramObjectiveMapping;
use Illuminate\Http\Request;
use App\Program;
class ProgramsController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        $page_title = "Programs in University";

        return view('programs.index')->with(compact('programs','page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "Create New Program e.g. BSSE etc";

        return view('programs.create')->with(compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peo = new Program();
        $peo->code = $request->code;
        $peo->title = $request->title;
        $peo->save();
        flash('Program Created successfully')->success()->important();
        return redirect(route('programs.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = Program::find($id);
        $page_title = $program->code.': '.$program->title.' Objectives';
        $objectives = $program->peos()->orderBy('order')->get();
        $outcomes = $program->plos()->orderBy('order')->get();
        return view('programs.show')->with(compact('program','page_title','objectives','outcomes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $program = Program::find($id);
        $page_title = "Edit ".$program->title;

        return view('programs.edit')->with(compact('program','page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $plo = Program::find($id);
        $plo->title = $request->title;
        $plo->code = $request->code;
        $plo->save();
        flash($plo->title.' updated successfully')->success()->important();
        return redirect(route('programs.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plo = Program::find($id);
        $plo->delete();
        flash($plo->title." Deleted")->warning()->important();
        return redirect(route('programs.index'));
    }

    public function university_objectives_mappings($program_id)
    {

        $page_title = "University Objectives - Program Objectives Mappings";
        $program = Program::find($program_id);
        $university_objectives = UniversityObjective::orderBy('order')->get();
        $program_objectives = $program->getProgramObjectives();
        $mappings_obs = $program->getuniversityObjectivesPEOSMappings();
        $mappings = array();
        foreach($mappings_obs as $obj){
            $mappings[$obj->program_educational_objective_id][$obj->university_objective_id] = 'checked';
        }
       // return $mappings;
        return view('programs.university_objectives_mappings')->with(compact('university_objectives','program','program_objectives','mappings','page_title'));
    }

    public function university_objectives_mappings_store(Request $request, $program_id)
    {
        $program = Program::find($program_id);
        $mappings_obs = $program->getuniversityObjectivesPEOSMappings();
        foreach($mappings_obs as $mapping)
            $mapping->delete();
        if(isset($request->mappings)){
            foreach($request->mappings as $program_educational_objective_id => $peos){
                foreach($peos as $university_objective_id=>$value){
                    $mapp = new UniversityProgramObjectiveMapping();
                    $mapp->university_objective_id = $university_objective_id;
                    $mapp->program_educational_objective_id = $program_educational_objective_id;
                    $mapp->save();
                }
            }
        }
        flash('Mappings Updated')->success()->important();
        return redirect(route('programs.university.objectives.mapping',$program_id));
    }
}
