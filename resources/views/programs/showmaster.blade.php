@extends('layouts.adminlte')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{$program->code.': '.$program->title}}</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-9">
                    @yield('programcontent')
                </div>
                <div class="col-md-3">
                    <div class="box-body">
                        <div class="navbar">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="{{route('peos.index',$program->id)}}"><i class="fa fa-link"></i><span>Edit Objectives</span></a></li>
                                <li><a href="{{route('programs.university.objectives.mapping',$program->id)}}"><i class="fa fa-link"></i><span>University objective-Program Objective Mappings </span></a></li>
                                <li><a href="{{route('plos.index',$program->id)}}"><i class="fa fa-link"></i><span>Program Learning Outcomes</span></a></li>
                                <li><a href="#work"><i class="fa fa-link"></i><span>Courses</span></a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection