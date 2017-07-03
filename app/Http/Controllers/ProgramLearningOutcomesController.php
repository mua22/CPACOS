<?php

namespace App\Http\Controllers;

use App\Http\Requests\PLORequest;
use Illuminate\Http\Request;
use App\ProgramLearningOutcome;
class ProgramLearningOutcomesController extends Controller
{
    public function index()
    {
        $plos = ProgramLearningOutcome::all();
        $page_title = "Program Learning Outcomes (plos)";

        return view('plos.index')->with(compact('plos','page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "Create New Program Learning Outcome (plos)";

        return view('plos.create')->with(compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peo = new ProgramLearningOutcome();
        $peo->title = $request->title;
        $peo->save();
        flash('PLO Created successfully')->success()->important();
        return redirect(route('plos.index'));
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
        $plo = ProgramLearningOutcome::find($id);
        $page_title = "Edit ".$plo->order." Program Learning Outcome (plos)";

        return view('plos.edit')->with(compact('plo','page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PLORequest $request, $id)
    {

        $plo = ProgramLearningOutcome::find($id);
        $plo->title = $request->title;
        $plo->save();
        flash($plo->order.' updated successfully')->success()->important();
        return redirect(route('plos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plo = ProgramLearningOutcome::find($id);
        $plo->delete();
        flash($plo->order." Deleted")->success()->important();
        return redirect(route('plos.index'));
    }
}
