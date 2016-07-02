@extends('app')

@section('content')
<div class="container">
    <h1>Edit species</h1>
    {!! Form::model($species, ['method' => 'PATCH', 'action' => ['SpeciesController@update', $species->id]]) !!}
           @include('species.form')
        <div class="form-group">
        	{!! Form::submit('update') !!}
        </div>      
    {!! Form::close() !!}
</div>
@endsection