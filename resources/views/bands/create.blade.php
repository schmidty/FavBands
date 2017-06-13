@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('content')
<div class='page-header'><h3>Create a Band</h3></div>

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

{!! Form::open([
    'route' => 'bands.store'
]) !!}

@include('bands.fields')

<div class="form-group">
    {!! Form::label('still_active', 'Still Active:', ['class' => 'control-label']) !!}
    {!! Form::checkbox('still_active', '1', ['checked'=>'checked']) !!}
</div>


{!! Form::submit('Create New Band Entry', ['class' => 'btn btn-primary']) !!}

{!! Form::reset('Clear', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script>
@stop
