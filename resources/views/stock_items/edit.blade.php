@extends('app')

@section('content')
<div class="container">
    <h1>Edit stock item for "<a href="/seeds/{{$stock_item->seed->id}}">{{$stock_item->seed->name}}</a>"</h1>
    {!! Form::model($stock_item, ['method' => 'PATCH', 'action' => ['StockItemsController@update', $stock_item->id]]) !!}
           @include('stock_items.form')
        <div class="form-group">
        	{!! Form::hidden('seed_id',$stock_item->seed_id)!!}
            {!! Form::submit('update') !!}
        </div>      
    {!! Form::close() !!}
</div>
@endsection