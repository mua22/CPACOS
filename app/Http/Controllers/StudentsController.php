<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Student;


class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //create a variable and store all the students in it
        //$students = Student::all();
        $students = Student::orderBy('id','desc')->paginate(10);
        return view('students.index')->withStudents($students);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //displaying the create student form

        return view('students.create');
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
        //  dd($request);
        //First validate the data

        //Secondly store to the database
        $student=new Student();

        $student->registration_no=$request->registration_no;
        $student->name=$request->name;

        $student->save();

        //redirect to another page
      //  Session::flash('success','The student was successfully saved');
        return redirect()->route('students.index');
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
        //displaying the form for updating student

        $student=Student::find($id);
        return view('students.edit',$student)->withStudent($student);
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

        $student=Student::find($id);
        $student->registration_no=$request->registration_no;
        $student->name=$request->name;

        $student->save();

        //redirect to another page
        //  Session::flash('success','The student was successfully saved');
        return redirect()->route('students.index');
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
        $student=Student::find($id);

        $student->delete();

        return redirect()->route('students.index');

    }

    public function uploadExcel(Request $request,$course_id)
    {
        if($request->hasFile('file'))
        {
            $path = $request->file('file')->getRealPath();
            $data = Excel::load($path, function($reader) {})->get();
            $course = Course::find($course_id);
            foreach($data as $student){
                $studentRow = Student::firstOrCreate(
                    ['registration_no' => $student['registration_no']], ['name' => $student['name']]
                );
                if(!$course->students->contains($studentRow->id)){
                    $course->students()->save($studentRow);
                }
            }
            return redirect(route('courses.show',$course_id));
        }else {
            return "No File uploaded";
        }
    }
}
