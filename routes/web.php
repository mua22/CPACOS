<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware(['auth'])->group(function () {
    Route::resource('courses', 'CoursesController');
    Route::get('/courses/{course_id}/assessments/create',['as'=>'assessments.create','uses'=>'AssessmentsController@create']);
    Route::post('/courses/{course_id}/assessments/create',['as'=>'assessments.store','uses'=>'AssessmentsController@store']);
    Route::get('/courses/assessments/{id}',['as'=>'assessments.edit','uses'=>'AssessmentsController@edit']);
    Route::get('/courses/assessments/{id}/show',['as'=>'assessments.show','uses'=>'AssessmentsController@show']);
    Route::post('/courses/assessments/massUpdate/{assessment_id}',['as'=>'assessments.massUpdate','uses'=>'AssessmentsController@massUpdate']);
    Route::post('/courses/{course_id}/uploadExcel',['as'=>'students.uploadExcel.course','uses'=>'StudentsController@uploadExcel']);


//    Route::resource('clos', 'CourseLearningOutcomesController');
    //Route::resource('plos', 'ProgramLearningOutcomesController');
    Route::get('courses/{course_id}/clos','CourseLearningOutcomesController@index')->name('clos.index');
    Route::get('courses/{course_id}/clos/create','CourseLearningOutcomesController@create')->name('clos.create');
    Route::delete('courses/{id}/clos/destroy','CourseLearningOutcomesController@destroy')->name('clos.destroy');
    Route::post('courses/{course_id}/clos/store','CourseLearningOutcomesController@store')->name('clos.store');


    Route::resource('programs', 'ProgramsController');
    Route::get('programs/{program_id}/university/objectives/mappings', 'ProgramsController@university_objectives_mappings')->name('programs.university.objectives.mapping');
    Route::post('programs/{program_id}/university/objectives/mappings', 'ProgramsController@university_objectives_mappings_store')->name('programs.university.objectives.mappings.store');
    Route::resource('university', 'UniversityObjectivesController');
    Route::get('university/up/{objective_id}', 'UniversityObjectivesController@up')->name('university.up');
    Route::get('university/down/{objective_id}', 'UniversityObjectivesController@down')->name('university.down');

    Route::get('/programs/{program_id}/peos','ProgramEducationalObjectivesController@index')->name('peos.index');
    Route::get('/programs/{program_id}/peos/create','ProgramEducationalObjectivesController@create')->name('peos.create');
    Route::post('/programs/{program_id}/peos/create','ProgramEducationalObjectivesController@store')->name('peos.store');
    Route::get('/programs/{program_id}/peos/{peo_id}/edit','ProgramEducationalObjectivesController@edit')->name('peos.edit');
    Route::put('/programs/{program_id}/peos/{peo_id}/edit','ProgramEducationalObjectivesController@update')->name('peos.update');
    Route::delete('/programs/{program_id}/peos/{peo_id}/delete','ProgramEducationalObjectivesController@destroy')->name('peos.destroy');
    Route::get('/programs/{program_id}/peos/{peo_id}/up', 'ProgramEducationalObjectivesController@up')->name('peos.up');
    Route::get('/programs/{program_id}/peos/{peo_id}/down', 'ProgramEducationalObjectivesController@down')->name('peos.down');Route::get('/programs/{program_id}/peos','ProgramEducationalObjectivesController@index')->name('peos.index');

    Route::get('/programs/{program_id}/plos','ProgramLearningOutcomesController@index')->name('plos.index');
    Route::get('/programs/{program_id}/plos/create','ProgramLearningOutcomesController@create')->name('plos.create');
    Route::post('/programs/{program_id}/plos/create','ProgramLearningOutcomesController@store')->name('plos.store');
    Route::get('/programs/{program_id}/plos/{plo_id}/edit','ProgramLearningOutcomesController@edit')->name('plos.edit');
    Route::put('/programs/{program_id}/plos/{plo_id}/edit','ProgramLearningOutcomesController@update')->name('plos.update');
    Route::delete('/programs/{program_id}/plos/{plo_id}/delete','ProgramLearningOutcomesController@destroy')->name('plos.destroy');
    Route::get('/programs/{program_id}/plos/{plo_id}/up', 'ProgramLearningOutcomesController@up')->name('plos.up');
    Route::get('/programs/{program_id}/plos/{plo_id}/down', 'ProgramLearningOutcomesController@down')->name('plos.down');
});
