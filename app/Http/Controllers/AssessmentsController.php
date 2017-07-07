<?php

namespace App\Http\Controllers;

use App\Assessment;
use App\Course;
use App\Mark;
use Illuminate\Http\Request;

class AssessmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($course_id)
    {
        $page_title = 'Create New Assessment';
        $course = Course::find($course_id);
        return view('assessments.create')->with(compact('course','page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($course_id,Request $request)
    {
        $course = Course::find($course_id);
        $clos = $request->clos;
        $assessment = new Assessment();
        $assessment->course_id = $course_id;
        $assessment->title = $request->title;
        $assessment->type = $request->type;

        $assessment->save();
        $assessment->clos()->attach(array_keys($clos));
        flash('Assessment for '.$course->title." Created Successfully")->success();
        return redirect(route('courses.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_title = 'Add Edit Assessment Marks';
        $assessment = Assessment::findOrFail($id);
        $marks = array();
        foreach ($assessment->course->students as $student){
            $mark = Mark::firstOrCreate(['student_id'=>$student->id],['assessment_id'=>$assessment->id]);
            array_push($marks,$mark);
        }
       // return $marks;
        return view('assessments.show')->with(compact('page_title','assessment','marks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function massUpdate(Request $request,$assessment_id)
    {
        foreach($request->marks as $key=>$value){
            $mark = Mark::find($key);
            $mark->numbers = $value;
            $mark->save();
        }
        return redirect(route('assessments.show',$assessment_id));
    }
}
