<div class="form-group">
    {!!  Form::label('band', 'Band:', ['class' => 'control-label']) !!}
    {!!  Form::select('band_id', $bands, ['class' => 'form-control']); !!}
</div>

<div class="form-group">
    {!! Form::label('name', 'Album:', ['class' => 'control-label']) !!}
    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('recorded_date', 'Recorded:', ['class' => 'control-label']) !!}
    {!! Form::text('recorded_date', old('recorded_date'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('release_date', 'Released:', ['class' => 'control-label']) !!}
    {!! Form::text('release_date', old('release_date'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('numberoftracks', 'Number of Tracks:', ['class' => 'control-label']) !!}
    {!! Form::text('numberoftracks', old('numberoftracks'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('label', 'Label:', ['class' => 'control-label']) !!}
    {!! Form::text('label', old('label'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('producer', 'Producer:', ['class' => 'control-label']) !!}
    {!! Form::text('producer', old('producer'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('genre', 'Genre:', ['class' => 'control-label']) !!}
    {!! Form::text('genre', old('genre'), ['class' => 'form-control']) !!}
</div>
