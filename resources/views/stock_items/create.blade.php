@extends('app')

@section('content')
<div class="container">
    <h1>Add new stock for "<a href="/seeds/{{$seed->id}}">{{$seed->name}}</a>"</h1>
    {!! Form::open(array('action' => 'StockItemsController@store')) !!}
           @include('stock_items.form')
        {!! Form::hidden('seed_id',$seed->id)!!}
        <div class="form-group">
            {!! Form::submit('send') !!}
        </div> 
    {!! Form::close() !!}
</div>
@endsection