@extends('app')

@section('content')

@include('errors');

<div class="container">
    <h1>Add new Sowing</h1>
    {!! Form::open(array('action' => 'SowingsController@store')) !!}
           @include('sowings.form')
        <div class="form-group">
            {!! Form::submit('send') !!}
        </div> 
    {!! Form::close() !!}
</div>
@endsection