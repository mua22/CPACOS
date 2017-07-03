<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use App\ProgramLearningOutcome;
class CourseLearningOutcomesController extends Controller
{
    public function index($course_id)
    {
        $course = Course::find($course_id);
        $plos = ProgramLearningOutcome::all();
        $page_title = "Course Learning Outcomes (clos)";

        return view('clos.index')->with(compact('plos','page_title'));
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
        flash('PEO Created successfully')->success()->important();
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
        $peo = ProgramLearningOutcome::find($id);
        $page_title = "Edit ".$peo->order." Program Learning Outcome (plos)";

        return view('plos.edit')->with(compact('peo','page_title'));
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
        $peo = ProgramLearningOutcome::find($id);
        $peo->title = $request->title;
        $peo->save();
        flash($peo->order.' updated successfully')->success()->important();
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
        $peo = ProgramLearningOutcome::find($id);
        $peo->delete();
        flash("PEO Deleted")->success()->important();
        return redirect(route('plos.index'));
    }
}
