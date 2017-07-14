<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UniversityObjective;
class UniversityObjectivesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objectives = UniversityObjective::orderBy('order')->get();
        $page_title = "University Objectives";

        return view('university.index')->with(compact('objectives','page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "Create New Program Educationsl Objectives (PEOs)";

        return view('peos.create')->with(compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peo = new UniversityObjective();
        $peo->title = $request->title;
        $peo->save();
        flash('PEO Created successfully')->success()->important();
        return redirect(route('peos.index'));
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
    public function edit($id)
    {
        $peo = UniversityObjective::find($id);
        $page_title = "Edit ".$peo->order." Program Educationsl Objectives (PEOs)";

        return view('peos.edit')->with(compact('peo','page_title'));
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
        $peo = UniversityObjective::find($id);
        $peo->title = $request->title;
        $peo->save();
        flash($peo->order.' updated successfully')->success()->important();
        return redirect(route('peos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peo = UniversityObjective::find($id);
        $peo->delete();
        flash("PEO Deleted")->success()->important();
        //flash("PEO Deleted")->overlay();
        return redirect(route('peos.index'));
    }

    public function up($objective_id)
    {
        $objective = UniversityObjective::find($objective_id);
        $objective->up();
        flash('Objective Moved Up New Numbers are assigned accordingly')->important();
        return redirect(route('university.index'));
    }
    public function down($objective_id)
    {
        $objective = UniversityObjective::find($objective_id);
        $objective->down();
        flash('Objective Moved Down New Numbers are assigned accordingly')->important();
        return redirect(route('university.index'));
    }
}
