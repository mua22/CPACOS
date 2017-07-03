<?php

namespace App\Providers;

use App\CourseLearningOutcome;
use App\ProgramEducationalObjective;
use App\ProgramLearningOutcome;
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
        ProgramEducationalObjective::observe(OrderBehaviour::class);
        ProgramLearningOutcome::observe(OrderBehaviour::class);
        CourseLearningOutcome::observe(OrderBehaviour::class);
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
