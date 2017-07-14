<?php

use Illuminate\Database\Seeder;
use App\Program;
use App\ProgramEducationalObjective;
use App\ProgramLearningOutcome;
class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $obj = new ProgramEducationalObjective();
        $obj->title = "Program Objective 1";
        $obj1 = new ProgramEducationalObjective();
        $obj1->title = "Program Objective 2";
        $obj2 = new ProgramEducationalObjective();
        $obj2->title = "Program Objective 3";

        $outcome = new ProgramLearningOutcome();
        $outcome->title = "Engineering Knowledge: An ability to apply knowledge of mathematics, science, engineering fundamentals and an engineering specialization to the  solution of complex engineering problems.";

        $outcome1 = new ProgramLearningOutcome();
        $outcome1->title = "Problem Analysis: An ability to identify, formulate, research literature, and analyze complex engineering problems reaching substantiated conclusions using first principles of mathematics, natural sciences and engineering sciences.";

        $outcome2 = new ProgramLearningOutcome();
        $outcome2->title = "Design/Development  of  Solutions: An ability to design solutions for complex engineering problems and design systems, components or processes that meet specified needs with appropriate consideration for public health and safety, cultural, societal, and environmental considerations.";

        $program = new Program();
        $program->title = 'BS Computer Engineering ';
        $program->code = 'BS(CE)';
        $program->save();
        $program->plos()->saveMany([$obj,$obj1,$obj2]);
        $program->peos()->saveMany([$outcome,$outcome1,$outcome2]);

        $obj = new ProgramEducationalObjective();
        $obj->title = "Program Objective 1";
        $obj1 = new ProgramEducationalObjective();
        $obj1->title = "Program Objective 2";
        $obj2 = new ProgramEducationalObjective();
        $obj2->title = "Program Objective 3";
        $outcome = new ProgramLearningOutcome();
        $outcome->title = "Engineering Knowledge: An ability to apply knowledge of mathematics, science, engineering fundamentals and an engineering specialization to the  solution of complex engineering problems.";

        $outcome1 = new ProgramLearningOutcome();
        $outcome1->title = "Problem Analysis: An ability to identify, formulate, research literature, and analyze complex engineering problems reaching substantiated conclusions using first principles of mathematics, natural sciences and engineering sciences.";

        $outcome2 = new ProgramLearningOutcome();
        $outcome2->title = "Design/Development  of  Solutions: An ability to design solutions for complex engineering problems and design systems, components or processes that meet specified needs with appropriate consideration for public health and safety, cultural, societal, and environmental considerations.";

        $program = new Program();
        $program->title = 'BS Electrical Telecommunication Engineering';
        $program->code = 'BS(ETE)';
        $program->save();
        $program->plos()->saveMany([$obj,$obj1,$obj2]);
        $program->peos()->saveMany([$outcome,$outcome1,$outcome2]);

        $obj = new ProgramEducationalObjective();
        $obj->title = "Program Objective 1";
        $obj1 = new ProgramEducationalObjective();
        $obj1->title = "Program Objective 2";
        $obj2 = new ProgramEducationalObjective();
        $obj2->title = "Program Objective 3";
        $outcome = new ProgramLearningOutcome();
        $outcome->title = "Engineering Knowledge: An ability to apply knowledge of mathematics, science, engineering fundamentals and an engineering specialization to the  solution of complex engineering problems.";

        $outcome1 = new ProgramLearningOutcome();
        $outcome1->title = "Problem Analysis: An ability to identify, formulate, research literature, and analyze complex engineering problems reaching substantiated conclusions using first principles of mathematics, natural sciences and engineering sciences.";

        $outcome2 = new ProgramLearningOutcome();
        $outcome2->title = "Design/Development  of  Solutions: An ability to design solutions for complex engineering problems and design systems, components or processes that meet specified needs with appropriate consideration for public health and safety, cultural, societal, and environmental considerations.";

        $program = new Program();
        $program->title = 'BS Electrical (Electronics) Engineering';
        $program->code = 'BS(EEE)';
        $program->save();
        $program->plos()->saveMany([$obj,$obj1,$obj2]);
        $program->peos()->saveMany([$outcome,$outcome1,$outcome2]);

        $obj = new ProgramEducationalObjective();
        $obj->title = "Program Objective 1";
        $obj1 = new ProgramEducationalObjective();
        $obj1->title = "Program Objective 2";
        $obj2 = new ProgramEducationalObjective();
        $obj2->title = "Program Objective 3";
        $outcome = new ProgramLearningOutcome();
        $outcome->title = "Engineering Knowledge: An ability to apply knowledge of mathematics, science, engineering fundamentals and an engineering specialization to the  solution of complex engineering problems.";

        $outcome1 = new ProgramLearningOutcome();
        $outcome1->title = "Problem Analysis: An ability to identify, formulate, research literature, and analyze complex engineering problems reaching substantiated conclusions using first principles of mathematics, natural sciences and engineering sciences.";

        $outcome2 = new ProgramLearningOutcome();
        $outcome2->title = "Design/Development  of  Solutions: An ability to design solutions for complex engineering problems and design systems, components or processes that meet specified needs with appropriate consideration for public health and safety, cultural, societal, and environmental considerations.";

        $program = new Program();
        $program->title = 'Bachelor of Science in Chemical Engineering';
        $program->code = 'BS(CHE)';
        $program->save();
        $program->plos()->saveMany([$obj,$obj1,$obj2]);
        $program->peos()->saveMany([$outcome,$outcome1,$outcome2]);

    }
}
