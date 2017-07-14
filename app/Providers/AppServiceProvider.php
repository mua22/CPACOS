<?php

namespace App\Providers;

use App\CourseLearningOutcome;
use App\Observers\CLOOrderBehaviour;
use App\Observers\ProgramOrderBehaviour;
use App\ProgramEducationalObjective;
use App\ProgramLearningOutcome;
use App\UniversityObjective;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Observers\OrderBehaviour;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        ProgramEducationalObjective::observe(ProgramOrderBehaviour::class);
        ProgramLearningOutcome::observe(ProgramOrderBehaviour::class);
        CourseLearningOutcome::observe(CLOOrderBehaviour::class);
        UniversityObjective::observe(OrderBehaviour::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
