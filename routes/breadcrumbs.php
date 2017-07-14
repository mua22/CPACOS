<?php

Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));

});
Breadcrumbs::register('courses.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Courses', route('courses.index'));
});

Breadcrumbs::register('courses.show', function($breadcrumbs,$course)
{
    $breadcrumbs->parent('courses.index');
    $breadcrumbs->push(\App\Course::find($course)->title, route('courses.show',$course));
});

Breadcrumbs::register('clos.index', function($breadcrumbs,$course)
{
    $breadcrumbs->parent('courses.show',$course);
    $breadcrumbs->push('CLOs', route('courses.show',$course));
});

Breadcrumbs::register('clos.create', function($breadcrumbs,$course)
{
    $breadcrumbs->parent('clos.index',$course);
    $breadcrumbs->push('Create', route('clos.create',$course));
});

Breadcrumbs::register('clos.edit', function($breadcrumbs,$course)
{
    $breadcrumbs->parent('clos.index',$course);
    $breadcrumbs->push('Create', route('clos.create',$course));
});



Breadcrumbs::register('programs.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Programs', route('programs.index'));
});

Breadcrumbs::register('programs.create', function($breadcrumbs)
{
    $breadcrumbs->parent('programs.index');
    $breadcrumbs->push('Create', route('programs.create'));
});
Breadcrumbs::register('programs.edit', function($breadcrumbs,$program_id)
{
    $breadcrumbs->parent('programs.index');
    $breadcrumbs->push('Edit', route('programs.edit',$program_id));
});

Breadcrumbs::register('programs.show', function($breadcrumbs,$program_id)
{
    $breadcrumbs->parent('programs.index');
    $breadcrumbs->push(\App\Program::find($program_id)->title, route('programs.show',$program_id));
});
?>