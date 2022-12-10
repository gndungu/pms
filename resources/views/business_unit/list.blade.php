@extends('adminlte::page')

@section('title', 'Business Unit')

@section('content_header')
    <h1>Business Unit List</h1>

@stop

@section('content')
  <table class="table table-stripped">
    <tr>
      <th>Name</th>
      <th>Description</th>
    </tr>
    <tbody>
    @foreach($items as $item)
        <tr>
          <td>{{ $item->name }}</td>
          <td>{{ $item->description }}</td>
          <td>
            <a class="btn btn-warning btn-sm" href="{{ route('business_unit.edit', $item->id) }}">Edit</a>
            <a class="btn btn-default btn-sm" href="{{ route('business_unit.show', $item->id) }}">Detail</a>
          </td>
        </tr>
        @endforeach
        </tbody>
  </table>
  <a href="{{ route('business_unit.create') }}" class="btn btn-success btn-sm">Add Business Unit</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
