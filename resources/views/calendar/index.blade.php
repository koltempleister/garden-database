@extends('app')
@section('content')
<h2>Sowing Calendar for {{$month}}</h2>
<div class="container">
	<div class="row">
		@foreach($places as $place)
			<h3>{{$place->name}}</h3>
			<ul>
				@foreach($sowings as $sowing)
					@if($sowing->place->id == $place->id)
					<li><a href="/seeds/{{$sowing->seed->id}}">{{$sowing->seed->name}}</a></li>
					@endif
				@endforeach
			</ul>
			@endforeach
	</div>
</div>
@endsection