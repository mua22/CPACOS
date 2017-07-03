<?php

Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));

});
Breadcrumbs::register('plos.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Program learning Outcomes', route('plos.index'));
});
Breadcrumbs::register('plos.create', function($breadcrumbs)
{
    $breadcrumbs->parent('plos.index');
    $breadcrumbs->push('Create', route('plos.create'));
});
?>