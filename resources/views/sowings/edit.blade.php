@extends('app')

@section('content')
<div class="container">
    <h2>Edit sowing </h2>
    {!! Form::model($sowing, ['method' => 'PATCH', 'action' => ['SowingsController@update', $sowing->id]]) !!}
           @include('sowings.form')
        <div class="form-group">
        	{!! Form::submit('update') !!}
        </div>      
    	{!!Form::hidden('seed_id', null) !!}
    {!! Form::close() !!}
</div>
@endsection