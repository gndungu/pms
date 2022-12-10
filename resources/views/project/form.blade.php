@extends('adminlte::page')

@section('title', 'Project')

@section('content_header')
    <h1>Project Create</h1>

@stop

@section('content')
<div class="card">
        <div class="card-body register-card-body">
          @if(isset($object))
              {!!Form::open()->url('project/'.$object->id)->fill($object) !!}
              @method('PATCH')
          @else
            <form action="{{ url('project') }}" method="post">
          @endif

            {{ csrf_field() }}
            {!!Form::errors("")!!}
            {!! Form::text('name', 'Name') !!}
            {!! Form::text('description', 'Description') !!}

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
