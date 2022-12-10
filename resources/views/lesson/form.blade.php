@extends('adminlte::page')

@section('title', 'Lesson Learned')

@section('content_header')
    <h1>Lesson Learned</h1>

@stop

@section('content')
<div class="card">
        <div class="card-body register-card-body">
          @if(isset($object))
              {!!Form::open()->url('lesson/'.$object->id)->fill($object) !!}
              @method('PATCH')
          @else
            <form action="{{ url('lesson') }}" method="post">
          @endif

            {{ csrf_field() }}
            {!!Form::errors("")!!}
            {!!Form::select('country', 'Country')->options($country->prepend('Choose a Country', ''))!!}
            {!! Form::select('project', 'Project / Program')->options($project->prepend('Choose a Project', '')) !!}
            {!! Form::select('thematic_area', 'Thematic Area')->options($thematic_area->prepend('Choose a Thematic Area', '')) !!}
            {!! Form::select('business_unit', 'Business Unit')->options($business_unit->prepend('Choose a Business Unit', '')) !!}
            {!! Form::select('staff_title', 'Staff with Lesson')->options($staff_title->prepend('Choose a Staff with lesson', '')) !!}
            {!! Form::textarea('lesson_learned', 'Lesson Learned') !!}
            {!! Form::textarea('barriers', 'Barriers to implementation for others to learn from') !!}
            {!! Form::textarea('comment', 'Any other relevant comment') !!}

            <button type="submit" class="btn btn-primary btn-block btn-flat">
                SAVE
            </button>
        </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
