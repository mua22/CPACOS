<?php

namespace App\Http\Controllers;

use App\Assessment;
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
