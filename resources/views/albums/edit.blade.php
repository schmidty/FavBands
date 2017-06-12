@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('content')

{!! Form::model( $album, [
    'method'=> 'PATCH',
    'route' => ['albums.update', $album->id]
]) !!}

@include('albums.fields')

{!! Form::submit('Edit An Album Entry', ['class' => 'btn btn-primary']) !!}

{!! Form::reset('Clear', ['class' => 'btn btn-danger']) !!}

<button href="{{ url('albums')" class="btn btn-basic">Cancel</button>

{!! Form::close() !!}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>
@stop
