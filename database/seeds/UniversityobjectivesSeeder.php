<?php

use Illuminate\Database\Seeder;
use App\UniversityObjective;
class UniversityobjectivesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objective = new UniversityObjective();
        $objective->title = "Be competent in the professional practice of electrical engineering with emphasis on telecommunications and related fields and have employment appropriate to their background, education and interests.";
        $objective->save();
        $objective = new UniversityObjective();
        $objective->title = "Fulfill the needs of society in identifying and solving new technical challenges in electrical/telecommunications engineering and related fields, using fundamental engineering principles with modern tools and practices, in an ethical and socially responsible manner.";
        $objective->save();
        $objective = new UniversityObjective();
        $objective->title = "Demonstrate an ability to function and communicate effectively as individuals or team-members and show management, leadership, and entrepreneurial potential.  ";
        $objective->save();
        $objective = new UniversityObjective();
        $objective->title = "Engage in life-long learning as demonstrated by advanced level education and professional development activities to continually enhance their professional capabilities for personal fulfillment and the betterment of society.";
        $objective->save();
        $objective = new UniversityObjective();
        $objective->title = "test";
        $objective->save();
    }
}
