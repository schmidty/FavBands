@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

{!! Form::model( $band, [
    'method'=> 'PATCH',
    'route' => ['bands.update', $band->id ]
]) !!}

@include('bands.fields')

<div class="form-group">
    {!! Form::label('still_active', 'Still Active:', ['class' => 'control-label']) !!}
    {!! Form::checkbox('still_active', $band->still_active) !!}
</div>

{!! Form::submit('Save This Band Update', ['class' => 'btn btn-primary']) !!}

{!! Form::reset('Clear', ['class' => 'btn btn-danger']) !!}

<a href="{{ url('bands') }}" style="text-decoration: none;"><input type="button" value="Cancel" class="btn btn-basic"/></a>

{!! Form::close() !!}


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>
@stop
