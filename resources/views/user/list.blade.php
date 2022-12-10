@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>User List</h1>

@stop

@section('content')
  <table class="table table-stripped">
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Is Active</th>
      <th>Is Admin</th>
    </tr>
    <tbody>
    @foreach($users as $user)
        <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ ($user->is_active) ? 'True' : 'False' }}</td>
          <td>{{ ($user->is_admin) ? 'True' : 'False' }}</td>
          <td>
            <a class="btn btn-warning btn-sm" href="{{ route('user.edit', $user->id) }}">Edit</a>
            <a class="btn btn-default btn-sm" href="{{ route('user.show', $user->id) }}">Detail</a>
          </td>
        </tr>
        @endforeach
        </tbody>
  </table>
  <a href="{{ route('user.create') }}" class="btn btn-success btn-sm">Add User</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
