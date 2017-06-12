@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('content')

{!! Form::open([
    'route' => 'albums.update'
]) !!}

@include('albums.fields')

{!! Form::submit('Edit An Album Entry', ['class' => 'btn btn-primary']) !!}

{!! Form::reset('Clear', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>
@stop
