@extends('adminlte::page')

@section('title', 'Country')

@section('content_header')
    <h1>Country List</h1>

@stop

@section('content')
  <table class="table table-stripped">
    <tr>
      <th>Name</th>
      <th>Code</th>
    </tr>
    <tbody>
    @foreach($items as $item)
        <tr>
          <td>{{ $item->name }}</td>
          <td>{{ $item->code }}</td>
          <td>
            <a class="btn btn-warning btn-sm" href="{{ route('country.edit', $item->id) }}">Edit</a>
            <a class="btn btn-default btn-sm" href="{{ route('country.show', $item->id) }}">Detail</a>
          </td>
        </tr>
        @endforeach
        </tbody>
  </table>
  <a href="{{ route('country.create') }}" class="btn btn-success btn-sm">Add Country</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
