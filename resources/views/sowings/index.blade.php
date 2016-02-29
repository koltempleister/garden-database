@extends('app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10">
			<h2>Sowings</h2>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-10">
			 <ul class="nav nav-pills">
			  @foreach($years as $year)
			  <li role="presentation"><a href="{{$year}}">{{$year}}</a></li>
			  @endforeach
			  	<li role="presentation"><a href="/sowings/create">Add sowing</a></li>
			</ul>
			
			@foreach($places as $place)
				<h3>{{$place->name}}</h3>
				<table class="table">
				
				@foreach($place->sowings as $sowing)
					@include('sowings.table')
				@endforeach
				</table>	
			@endforeach	
		</div>
	</div>
@endsection
