@extends('app')

@section('content')
<div class="container">
    <h1>Add new seed</h1>
    {!! Form::model($seed, ['method' => 'PATCH', 'action' => ['SeedsController@update', $seed->id]]) !!}
           @include('seeds.form')
        <div class="form-group">
            {!! Form::submit('update') !!}
        </div>      
    {!! Form::close() !!}
</div>
@endsection