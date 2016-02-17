@extends('app')

@section('content')
<div class="container">
    <h1>{{$seed->name}}</h1>
    
    <h3>species: {{$seed->species->name}}</h3>

    <div>outside: {{$seed->outside_from}} - {{$seed->outside_till}}</div>
    <div>inside: {{$seed->inside_from}} - {{$seed->inside_till}}</div>
    <div>harvest: {{$seed->harvest_from}} - {{$seed->harvest_till}}</div>
    <div>plant out: {{$seed->plant_out_from}} - {{$seed->plant_out_till}}</div>
    <div>time till harvest: {{$seed->time_till_harvest}}</div>
    <div>row distance(cm):{{ $seed->row_distance_cm}}</div>
    <div>thin out (cm): {{ $seed->thin_out_cm}}</div>
    <div>replant possible?: {{ $seed->replant_possibel}}</div>
    
    <p>
    remarks : {{$seed->remarks}}
    </p>
</div>
@endsection
