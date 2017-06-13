@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('content')
<div>
    <?php // 'bands' select element here  ?>
</div>
<div class="form-group">
    {!!  Form::label('band', 'Band:', ['class' => 'control-label']) !!}
    {!!  Form::select('band_id', $bands, $selected, ['class' => 'form-control', 'id'=>'band_id']); !!}
</div>
<input type="hidden" id="token" value="{{ csrf_token() }}">
<table id="album"  data-toggle="table" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th data-field="band" data-sortable="true">Band</th>
            <th data-field="name" data-sortable="true">Album</th>
            <th data-field="recorded_date" data-sortable="true">Recorded</th>
            <th data-field="release_date" data-sortable="true">Released</th>
            <th data-field="numberoftracks" data-sortable="true">Number of Tracks</th>
            <th data-field="label" data-sortable="true">Label</th>
            <th data-field="producer" data-sortable="true">Producer</th>
            <th data-field="genre" data-sortable="true">Genre</th>
        </tr>
    </thead>
    <tbody>
    @foreach($albums as $album)
        <tr>
            <td>
                <center>
                    {{ Form::open(['method'=>'post', 'action' => ['AlbumController@edit', $album->id]]) }}
                        {{ Form::hidden('id', $album->id) }}
                        {{ Form::hidden('band_id', $album->band_id) }}
                        {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                    {{ Form::close() }}
                </center>
            </td>
            <td>
                <center>
                    {{ Form::open(['method' => 'delete', 'route' => ['albums.destroy', $album->id]]) }}
                        {{ Form::hidden('id', $album->id) }}
                        {{ Form::hidden('band_id', $album->band_id) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                </center>
            </td>
            <td>
                {{$album->band_name}}
            </td>
            <td>
                {{$album->name}}
            </td>
            <td>
                {{$album->recorded_date}}
            </td>
            <td>
                {{$album->release_date}}
            </td>
            <td>
                {{$album->numberoftracks}}
            </td>
            <td>
                {{$album->label}}
            </td>
            <td>
                {{$album->producer}}
            </td>
            <td>
                {{$album->genre}}
            </td>
        </tr>
    @endforeach
</table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>
<script>
    $(document).ready(function() {
        $("select").change(function() {
            var band_id = $(this).val();
            console.log("filtered: "+band_id);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

$.post("{{ url('albumsfiltered') }}",  { band_id:band_id, 'token': '{{ csrf_token() }}' }, function(data) {
     if ( data.status == 'ok' )
         window.location.replace(data.url);
});

/*
           $.ajax({
               type: "POST",
               url: "{{ url('albumsfiltered') }}",
               dataType: "json",
               data: { band_id:band_id, 'token': '{{ csrf_token() }}' },
               error: function(err) {
                      console.log('hit failure: '+JSON.stringify(err));
               },
               success: function(data) {
                      //data = $(data); // the HTML content your controller has produced
                      console.log('hit success');
                      $('#container-navbar').html(data.responseText);
               }
           });
     */
        });
     });
</script>
@stop
