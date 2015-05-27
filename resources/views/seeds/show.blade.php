@extends('app')

@section('content')
<div class="container">
    <h1>{{$seed->name}}</h1>
    <p>{{$seed->remarks}}</p>
</div>
@endsection
