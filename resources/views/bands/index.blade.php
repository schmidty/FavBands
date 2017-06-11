@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('content')
<table id="bands"  data-toggle="table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>&nbsp;</th>
                <th data-field="name" data-sortable="true">Name</th>
                <th data-field="start_date" data-sortable="true">Start Date</th>
                <th data-field="website" data-sortable="true">Website</th>
                <th data-field="active" data-sortable="true">Band Is Still Active</th>
            </tr>
        </thead>
        <tbody>
        @foreach($bands as $band)
            <tr>
                <td>
                    <button id="edit">Edit</button>
                    <button id='delete'>Delete</button>
                </td>
                <td>
                    {{$band->name}}
                </td>
                <td>
                    {{$band->start_date}}
                </td>
                <td>
                    {{$band->website}}
                </td>
                <td>
                    <?php echo ($band->still_active) ? "Yes" : "No" ?>
                </td>
            </tr>
        @endforeach
</table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>
@stop
