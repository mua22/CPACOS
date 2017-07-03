<?php

use Illuminate\Database\Seeder;
use App\Course;
use App\Assessment;
class AssessmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::all();
        foreach($courses as $course){
            $quiz = new Assessment();
            $quiz->title = 'Quiz 1';
            $quiz->type = 'Quiz';
            $assignment = new Assessment();
            $assignment->title = 'Assignment 1';
            $assignment->type = 'Assignment';
            $course->assessments()->saveMany([$quiz,$assignment]);
        }
    }
}
