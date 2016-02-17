@extends('app')

@section('content')
<div class="container">
    <h1>Add new seed</h1>
    {!! Form::open(array('action' => 'SeedsController@store')) !!}
           @include('seeds.form')
        <div class="form-group">
            {!! Form::submit('send') !!}
        </div>      
    {!! Form::close() !!}
</div>
@endsection
