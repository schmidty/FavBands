<div class="form-group">
    {!!  Form::label('band', 'Band:', ['class' => 'control-label']) !!}
    {!!  Form::select('band_id', $bands, ['class' => 'form-control']); !!}
</div>

<div class="form-group">
    {!! Form::label('name', 'Album Name:', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('recorded_date', 'Recorded:', ['class' => 'control-label']) !!}
    {!! Form::text('recorded_date', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('release_date', 'Released:', ['class' => 'control-label']) !!}
    {!! Form::text('release_date', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('numberoftracks', 'Number of Tracks:', ['class' => 'control-label']) !!}
    {!! Form::text('numberoftracks', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('label', 'Label:', ['class' => 'control-label']) !!}
    {!! Form::text('label', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('producer', 'Producer:', ['class' => 'control-label']) !!}
    {!! Form::text('producer', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('genre', 'Genre:', ['class' => 'control-label']) !!}
    {!! Form::text('genre', null, ['class' => 'form-control']) !!}
</div>

