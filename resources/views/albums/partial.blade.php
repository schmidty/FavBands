<div id="response">
    <table id="album"  data-toggle="table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th data-field="name" data-sortable="true">Album</th>
                <th data-field="band" data-sortable="true">Band</th>
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
                    {{$album->name}}
                </td>
                <td>
                    {{$album->band_name}}
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
</div>
