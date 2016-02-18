@extends('app')

@section('content')
<div class="container">
    <h1>{{$seed->name}}</h1>
    
    <h3>species: {{$seed->species->name}}</h3>

    <div>outside: {{$seed->outside_from['formatted']}} - {{$seed->outside_till['formatted']}}</div>
    <div>inside: {{$seed->inside_from['formatted']}} - {{$seed->inside_till['formatted']}}</div>
    <div>harvest: {{$seed->harvest_from['formatted']}} - {{$seed->harvest_till['formatted']}}</div>
    <div>plant out: {{$seed->plant_out_from['formatted']}} - {{$seed->plant_out_till['formatted']}}</div>
    <div>time till harvest: {{$seed->time_till_harvest}}</div>
    <div>row distance(cm):{{ $seed->row_distance_cm}}</div>
    <div>thin out (cm): {{ $seed->thin_out_cm}}</div>
    <div>replant possible?: {{ $seed->replant_possibel}}</div>
    
    <p>
    remarks : {{$seed->remarks}}
    </p>
</div>
@endsection
