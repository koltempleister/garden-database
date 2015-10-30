@extends('app')

@section('content')
<div class="container">
    <h1>Add new seed</h1>
    {!! Form::open() !!}
           @include('seeds.form')
        <div class="form-group">
            {!! Form::button('send', null, ['class' => 'form-control']) !!}
        </div>      
    {!! Form::close() !!}
</div>
@endsection
