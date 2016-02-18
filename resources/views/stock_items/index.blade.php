@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10">
			<h1>Stock list</h1>
		</div>
	</div>
	<ul class="nav nav-pills">
	  @foreach($statuses as $status => $value)
	  <li role="presentation"><a href="{{$value}}">{{$value}}</a></li>
		@endforeach
	</ul>
	@foreach($seeds as $seed)
		
		<div class="row">
			<div class="col-md-2 col-md-offset-1">
						<?php 
							/** @todo find alternative for this */
							$stock_items = $seed->stock_items; 
						?>
						<h3><a href="/seeds/{{$seed->id}}">{{$seed->name}}</a></h3>
			</div><!--end column-->
			<div class="col-md-8">
						@include('stock_items.table')
					
			</div><!--end column-->
		</div><!--end row-->
		@endforeach	
	</div>
@endsection
