@extends('app')

@section('content')
<div class="container">
    <h1>Edit species</h1>
    {!! Form::open(['action' => ['SpeciesController@update', $species->id]]) !!}
           @include('species.form')
        <div class="form-group">
        	{!! Form::submit('create') !!}
        </div>      
    {!! Form::close() !!}
</div>
@endsection