<?php

use Illuminate\Database\Seeder;
use App\Course;
use App\Student;
class StudentsTableSeeder extends Seeder
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
            $student1 = Student::firstOrCreate(
                ['registration_no' => 'CIIT/DDP-FA12-BCS-135/LHR'], ['name' => 'SYED ALI MUBASHAR KAZMI']
            );
            $student2 = Student::firstOrCreate(
                ['registration_no' => 'CIIT/DDP-FA12-BCS-165/LHR'], ['name' => 'ZEESHAN ARSHAD']
            );
            $student3 = Student::firstOrCreate(
                ['registration_no' => 'CIIT/DDP-FA13-BCS-001/LHR'], ['name' => 'AAMNA SHOUKAT']
            );$student4 = Student::firstOrCreate(
                ['registration_no' => 'CIIT/DDP-FA13-BCS-002/LHR'], ['name' => 'ABDUL HASEEB KHAN']
            );$student5 = Student::firstOrCreate(
                ['registration_no' => 'CIIT/DDP-FA13-BCS-023/LHR'], ['name' => 'AYAZ RAFIQUE BHATTI']
            );
            $course->students()->saveMany([$student1,$student2,$student3,$student4,$student5]);
        }
    }
}
