@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">	
			<h2>Seeds</h2>
			<ul class="nav nav-pills">
			  <li role="presentation"><a href="seeds/create">Create Seed</a></li>
			</ul>
			{!!$seeds->render()!!}
		</div>
	</div>
	@foreach($seeds as $seed)
	<div class="row">
		<div class="col-md-5 col-md-offset-1">		
			<h3>{{$seed->name}}</h3> 
        
        <ul class="nav nav-pills">
		  <li role="presentation"><a href="seeds/{{$seed->id}}">details</a></li>
		  <li role="presentation"><a href="seeds/{{$seed->id}}/edit">edit</a></li>
		  <li role="presentation"><a href="stock/{{$seed->id}}">stock ({{$seed->stock_items->count()}})</a></li>
		  <li role="presentation"><a href="">delete</a></li>
		</ul>
                
       </div>     
	</div>
	@endforeach
	{!!$seeds->render()!!}
</div>

@endsection
