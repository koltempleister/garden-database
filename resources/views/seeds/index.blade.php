@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-4">	
			@include('species.nodes')
		</div>
		<div class="col-md-6">	
			<h2>Seeds</h2>
			<ul class="nav nav-pills">
			  <li role="presentation"><a href="seeds/create">Create Seed</a></li>
			</ul>
			{!!$seeds->render()!!}
			@include('seeds.search')
			<table class="table">	
				@foreach($seeds as $seed)
					<tr>
						<td>{{$seed->name}}</td>		 
				        <td>
				    	  <a href="seeds/{{$seed->id}}" class="btn btn-default btn-xs">details</a>
						  <a href="seeds/{{$seed->id}}/edit" class="btn btn-default btn-xs">edit</a>
						  <a href="stock/{{$seed->id}}" class="btn btn-default btn-xs">stock ({{$seed->stock_items->count()}})</a>
						  <a href="" class="btn btn-default btn-xs">delete</a>
						</td>    
				   </tr>     
				@endforeach
			</table>
		{!!$seeds->render()!!}
		</div>
	</div>
</div>
@endsection
