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
	<table class="table">	
	@foreach($seeds as $seed)
	<tr>
		<td>{{$seed->name}}</td>		 
        <td>
    	  <a href="seeds/{{$seed->id}}" class="btn btn-default btn-xs">details</a>
		  <a href="seeds/{{$seed->id}}/edit" class="btn btn-default btn-xs">edit</a>
		  <a href="stock/{{$seed->id}}" class="btn btn-default btn-xs">stock ({{$seed->stock_items->count()}})</a>
		  <a href="" class="btn btn-default btn-xs">delete</a>
		</ul>
            </td>    
   </tr>     
	@endforeach
	</table>
	{!!$seeds->render()!!}
</div>
</div></div>
@endsection
