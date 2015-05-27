@extends('app')

@section('content')
<div class="container">
    <h1>Add new seed</h1>
    {!! Form::open() !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('remarks', 'Remarks:') !!}
            {!! Form::textarea('remarks', null, ['class' => 'form-control']) !!}
        </div>
    {!! Form::close() !!}
</div>
@endsection
