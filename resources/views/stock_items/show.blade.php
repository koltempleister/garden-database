@extends('app')

@section('content')
<div class="container">
    <h1>Stock "<a href="/seeds/{{$stock_items[0]->seed->id}}">{{$stock_items[0]->seed->name}}</a>"</h1>
    <div>{{$stock_items->count()}} items in stock</div>
    <a href="create/{{$stock_items[0]->seed->id}}">[add]</a>
    @include('stock_items.table')
</div>
@endsection