<?php

namespace App\Http\Controllers;

use App\ProgramEducationalObjective;
use Illuminate\Http\Request;

class ProgramEducationalObjectivesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peos = ProgramEducationalObjective::all();
        $page_title = "Program Educationsl Objectives (PEOs)";

        return view('peos.index')->with(compact('peos','page_title'));
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
        $peo = new ProgramEducationalObjective();
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
        $peo = ProgramEducationalObjective::find($id);
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
        $peo = ProgramEducationalObjective::find($id);
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
        $peo = ProgramEducationalObjective::find($id);
        $peo->delete();
        flash("PEO Deleted")->success()->important();
        //flash("PEO Deleted")->overlay();
        return redirect(route('peos.index'));
    }
}
