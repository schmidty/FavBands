@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('content')

{!! Form::open([
    'route' => 'albums.store'
]) !!}
<div class="form-group">
    {!!  Form::label('band', 'Band:', ['class' => 'control-label']) !!}
    {!!  Form::select('band_id', $bands, ['class' => 'form-control']); !!}
</div>

<div class="form-group">
    {!! Form::label('name', 'Album:', ['class' => 'control-label']) !!}
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

{!! Form::submit('Create New Album Entry', ['class' => 'btn btn-primary']) !!}

{!! Form::reset('Clear', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>
@stop
