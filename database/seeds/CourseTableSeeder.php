<?php

use Illuminate\Database\Seeder;
use App\Course;
class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = new Course();
        $course->title = 'Web Technologies';
        $course->code = 'CSC337';
        $course->user_id = 1;
        $course->save();

        $course = new Course();
        $course->title = 'Web Technologies Lab';
        $course->code = 'CSC338';
        $course->user_id = 1;
        $course->save();
    }
}
