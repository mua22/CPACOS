<?php

namespace App\Http\Controllers;

use App\Program;
use App\ProgramEducationalObjective;
use Illuminate\Http\Request;

class ProgramEducationalObjectivesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($program_id)
    {
        $program = Program::find($program_id);
        $peos = ProgramEducationalObjective::where('program_id',$program_id)->orderBy('order')->get();
        $page_title = "Program Educationsl Objectives (PEOs)";

        return view('peos.index')->with(compact('peos','page_title','program'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($program_id)
    {
        $program = Program::find($program_id);
        $page_title = "Create New Program Educationsl Objectives (PEOs)";

        return view('peos.create')->with(compact('page_title','program'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$program_id)
    {
        $peo = new ProgramEducationalObjective();
        $peo->title = $request->title;
        $peo->program_id = $program_id;
        $peo->save();
        flash('PEO Created successfully')->success()->important();
        return redirect(route('peos.index',$program_id));
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
    public function edit($program_id,$peo_id)
    {
        $program = Program::find($program_id);
        $peo = ProgramEducationalObjective::find($peo_id);
        $page_title = "Edit ".$peo->order." Program Educationsl Objectives (PEOs)";

        return view('peos.edit')->with(compact('peo','page_title','program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $program_id,$peo_id)
    {
        $peo = ProgramEducationalObjective::find($peo_id);
        $peo->title = $request->title;
        $peo->save();
        flash($peo->order.' updated successfully')->success()->important();
        return redirect(route('peos.index',$program_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($program_id,$peo_id)
    {
        $peo = ProgramEducationalObjective::find($peo_id);
        $peo->delete();
        flash("PEO Deleted")->success()->important();
        //flash("PEO Deleted")->overlay();
        return redirect(route('peos.index',$program_id));
    }

    public function up($program_id,$peo_id)
    {
        $peo = ProgramEducationalObjective::find($peo_id);
        $peo->up();
        flash('Objective Moved Up New Numbers are assigned accordingly')->important();
        return redirect(route('peos.index',$program_id));
    }
    public function down($program_id,$peo_id)
    {
        $peo = ProgramEducationalObjective::find($peo_id);
        $peo->down();
        flash('Objective Moved Down New Numbers are assigned accordingly')->important();
        return redirect(route('peos.index',$program_id));
    }
}
