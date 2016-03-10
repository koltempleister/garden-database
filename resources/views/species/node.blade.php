<li>{{$specie->name}}</li>
@if(count($specie->children) > 0)
<ul>
	@foreach($specie->children as $specie)
		@include('species.node', $specie)
	@endforeach
</ul>
@endif
