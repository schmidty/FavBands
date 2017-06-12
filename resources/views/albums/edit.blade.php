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

{!! Form::model( $album, [
    'method'=> 'PATCH',
    'route' => ['albums.update', $album->id ]
]) !!}

@include('albums.fields')

{!! Form::submit('Save This Album Update', ['class' => 'btn btn-primary']) !!}

{!! Form::reset('Clear', ['class' => 'btn btn-danger']) !!}

<a href="{{ url('albums') }}" style="text-decoration: none;"><input type="button" value="Cancel" class="btn btn-basic"/></a>

{!! Form::close() !!}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>
@stop
