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
    Route::get('/courses/assessments/{id}',['as'=>'assessments.edit','uses'=>'AssessmentsController@edit']);
    Route::get('/courses/assessments/{id}/show',['as'=>'assessments.show','uses'=>'AssessmentsController@show']);
    Route::post('/courses/assessments/massUpdate/{assessment_id}',['as'=>'assessments.massUpdate','uses'=>'AssessmentsController@massUpdate']);
    Route::post('/courses/{course_id}/uploadExcel',['as'=>'students.uploadExcel.course','uses'=>'StudentsController@uploadExcel']);

    Route::resource('peos', 'ProgramEducationalObjectivesController');
//    Route::resource('clos', 'CourseLearningOutcomesController');
    Route::resource('plos', 'ProgramLearningOutcomesController');
    Route::get('courses/{course_id}/clos','AssessmentsController@massUpdate')->name('clos.index');
});
