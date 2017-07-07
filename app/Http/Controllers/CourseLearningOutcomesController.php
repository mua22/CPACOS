<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseLearningOutcome;
use Illuminate\Http\Request;
use App\ProgramLearningOutcome;
class CourseLearningOutcomesController extends Controller
{
    public function index($course_id)
    {
        $course = Course::find($course_id);
        $clos = $course->clos;
        $page_title = $course->title.": Course Learning Outcomes (clos)";

        return view('clos.index')->with(compact('clos','page_title','course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($course_id)
    {
        $course = Course::find($course_id);
        $page_title = "Create New CLO for ".$course->title;

        return view('clos.create')->with(compact('page_title','course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($course_id,Request $request)
    {
        $clo = new CourseLearningOutcome();
        $clo->title = $request->title;
        $clo->course_id = $course_id;
        $clo->save();
        flash('CLO Created successfully')->success()->important();
        return redirect(route('clos.index',$course_id));
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
        $clo = ProgramLearningOutcome::find($id);
        $page_title = "Edit ".$clo->order." Program Learning Outcome (plos)";

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
        $clo = ProgramLearningOutcome::find($id);
        $clo->title = $request->title;
        $clo->save();
        flash($clo->order.' updated successfully')->success()->important();
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
        //$course = Course::find($course_id);
        $clo = CourseLearningOutcome::find($id);
        $clo->delete();
        flash("CLO Deleted")->success()->important();
        return redirect(route('clos.index',$clo->course_id));
    }
}
