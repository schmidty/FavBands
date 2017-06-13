@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('content')
<div class='page-header'><h3>List of Bands</h3></div>
<table id="bands"  data-toggle="table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th data-field="name" data-sortable="true">Band Name</th>
                <th data-field="start_date" data-sortable="true">Start Date</th>
                <th data-field="website" data-sortable="true">Website</th>
                <th data-field="active" data-sortable="true">Band Is Still Active</th>
                <th data-field="album" data-sortable="true">Album</th>
            </tr>
        </thead>
        <tbody>
        @foreach($albums as $album)
            <tr>
                <td>
                    <center>
                        {{ Form::open(['method' => 'post', 'route' => ['bands.edit', $bands[$album->band_id]['id']]]) }}
                            {{ Form::hidden('id', $bands[$album->band_id]['id']) }}
                            {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                        {{ Form::close() }}
                    </center>
                </td>
                <td>
                    <center>
                        {{ Form::open(['method' => 'delete', 'route' => ['bands.destroy', $bands[$album->band_id]['id']]]) }}
                            {{ Form::hidden('id', $bands[$album->band_id]['id']) }}
                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </center>
                </td>
                <td>
                    {{ $bands[$album->band_id]['name'] }}
                </td>
                <td>
                    {{ $bands[$album->band_id]['start_date'] }}
                </td>
                <td>
                    {{ $bands[$album->band_id]['website'] }}
                </td>
                <td>
                    <?php echo ($bands[$album->band_id]['still_active']) ? "Yes" : "No"; ?>
                </td>
                <td>
                    {{ $album->name }}
                </td>
            </tr>
        @endforeach
</table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>
@stop
