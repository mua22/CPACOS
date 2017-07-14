<?php

namespace App\Http\Controllers;

use App\Http\Requests\PLORequest;
use Illuminate\Http\Request;
use App\ProgramLearningOutcome;
use App\Program;
class ProgramLearningOutcomesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($program_id)
    {
        $program = Program::find($program_id);
        $plos = ProgramLearningOutcome::where('program_id',$program_id)->orderBy('order')->get();
        $page_title = "Program Learning outcomes (PLOS)";

        return view('plos.index')->with(compact('plos','page_title','program'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($program_id)
    {
        $program = Program::find($program_id);
        $page_title = "Create New Program Learning Outcomes (plos)";

        return view('plos.create')->with(compact('page_title','program'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$program_id)
    {
        $plo = new ProgramLearningOutcome();
        $plo->title = $request->title;
        $plo->program_id = $program_id;
        $plo->save();
        flash('PLO Created successfully')->success()->important();
        return redirect(route('plos.index',$program_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($program_id,$plo_id)
    {
        $program = Program::find($program_id);
        $plo = ProgramLearningOutcome::find($plo_id);
        $page_title = "Edit ".$plo->order." Program Learning Outcomes (plos)";

        return view('plos.edit')->with(compact('plo','page_title','program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $program_id,$plo_id)
    {
        $plo = ProgramLearningOutcome::find($plo_id);
        $plo->title = $request->title;
        $plo->save();
        flash($plo->order.' updated successfully')->success()->important();
        return redirect(route('plos.index',$program_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($program_id,$plo_id)
    {
        $plo = ProgramLearningOutcome::find($plo_id);
        $plo->delete();
        flash("plo Deleted")->success()->important();
        //flash("plo Deleted")->overlay();
        return redirect(route('plos.index',$program_id));
    }

    public function up($program_id,$plo_id)
    {
        $plo = ProgramLearningOutcome::find($plo_id);
        $plo->up();
        flash('Objective Moved Up New Numbers are assigned accordingly')->important();
        return redirect(route('plos.index',$program_id));
    }
    public function down($program_id,$plo_id)
    {
        $plo = ProgramLearningOutcome::find($plo_id);
        $plo->down();
        flash('Objective Moved Down New Numbers are assigned accordingly')->important();
        return redirect(route('plos.index',$program_id));
    }
}
