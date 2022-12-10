@extends('adminlte::page')

@section('title', 'Lesson Learned')

@section('content_header')
    <h1>Lesson Learned List</h1>

@stop

@section('content')
<div class="card">
  <div class="card-body register-card-body">
  <table class="table">
    <tr><th>Country</th><td>{{ $lesson->country->name }}</td></tr>
    <tr><th>Project</th><td>{{ $lesson->project->name }}</td></tr>
    <tr><th>Thematic Area</th><td>{{ $lesson->thematic_area->name }}</td></tr>
    <tr><th>Busimess Unit</th><td>{{ $lesson->business_unit->name }}</td></tr>
    <tr><th>Staff with Lesson</th><td>{{ $lesson->staff_title->name }}</td></tr>
    <tr><th>Lesson Learned</th><td>{{ $lesson->lesson_learned }}</td></tr>
    <tr><th>Barriers</th><td>{{ $lesson->barriers }}</td></tr>
    <tr><th>Comment</th><td>{{ $lesson->comment }}</td></tr>
    <tr><th>Created By</th><td>{{ $lesson->user->name }}</td></tr>
    <tr><th>Create Date</th><td>{{ $lesson->created_at  }}</td></tr>
  </table>
</div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
