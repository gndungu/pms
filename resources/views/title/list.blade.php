@extends('adminlte::page')

@section('title', 'Title')

@section('content_header')
    <h1>Title List</h1>

@stop

@section('content')
  <table class="table table-stripped">
    <tr>
      <th>Name</th>
    </tr>
    <tbody>
    @foreach($items as $item)
        <tr>
          <td>{{ $item->name }}</td>
          <td>
            <a class="btn btn-warning btn-sm" href="{{ route('title.edit', $item->id) }}">Edit</a>
            <a class="btn btn-default btn-sm" href="{{ route('title.show', $item->id) }}">Detail</a>
          </td>
        </tr>
        @endforeach
        </tbody>
  </table>
  <a href="{{ route('title.create') }}" class="btn btn-success btn-sm">Add Title</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
