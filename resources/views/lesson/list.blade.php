@extends('adminlte::page')
@section('plugins.Select2', true)
@section('plugins.Datatables', true)

@section('title', 'Lesson Learned')

@section('content_header')
<div class="row">
  <div class="col"><h1>Lesson Learned List</h1></div>
  <div class="col text-left"><a href="{{ route('lesson.export') }}" class="btn btn-success float-right">Download Excel</a></div>
</div>


@stop

@section('content')
<div class="card">
  <div class="card-body register-card-body">
    <table class="table table-striped table-hover" id="example1">
      <thead>
        <tr>
          <th>Country</th>
          <th>Project</th>
          <th>Thematic Area</th>
          <th>Business Unit</th>
          <th>Staff with Lesson</th>
          <th>Project /program Lesson learned</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      @foreach($items as $item)
          <tr>
            <td>{{ $item->country->name }}</td>
            <td>{{ $item->project->name }}</td>
            <td>{{ $item->thematic_area->name }}</td>
            <td>{{ $item->business_unit->name }}</td>
            <td>{{ $item->staff_title->name }}</td>
            <td>{{ $item->lesson_learned }}</td>
            <td>
              <a class="btn btn-warning btn-sm" href="{{ route('lesson.edit', $item->id) }}">Edit</a>
              <a class="btn btn-default btn-sm" href="{{ route('lesson.show', $item->id) }}">Detail</a>
            </td>
          </tr>
          @endforeach
          </tbody>
    </table>
  </div>
</div>
  <a href="{{ route('lesson.create') }}" class="btn btn-success btn-sm">Add Lesson Learned</a>
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/vendor/datatables-responsive/css/responsive.bootstrap4.min.css"> -->
@stop

@section('js')
    <!-- <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/vendor/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/vendor/datatables-responsive/js/responsive.bootstrap4.min.js"></script> -->

    <script>
    $(function () {
          $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            "pageLength": 100

          });
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
      });
    </script>
@stop
