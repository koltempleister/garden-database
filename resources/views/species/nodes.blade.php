<ul>
@foreach($species as $specie)
	@include('species.node', $specie)
@endforeach
</ul>