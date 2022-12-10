@extends('adminlte::page')

@section('title', 'User')

@section('content_header')
    <h1>User Create</h1>

@stop

@section('content')
<div class="card">
        <div class="card-body register-card-body">
          @if(isset($user))
              {!!Form::open()->url('user/'.$user->id)->fill($user) !!}
              @method('PATCH')
          @else
            <form action="{{ url('user') }}" method="post">
          @endif

            {{ csrf_field() }}
            {!!Form::errors("")!!}
            {!! Form::text('name', 'Name') !!}
            {!! Form::text('email', 'Email') !!}
            {!! Form::checkbox('is_active', 'Is Active')->checked() !!}
            {!! Form::checkbox('is_admin', 'Is Admin')->checked() !!}
            @if(!isset($user))
              {!! Form::text('password', 'Password')->type('password') !!}
              {!! Form::text('password_confirmation', 'Confirm Password')->type('password') !!}
            @endif

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
