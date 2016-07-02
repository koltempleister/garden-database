<h3>Species</h3>
<ul class="nav nav-pills">
  <li role="presentation"><a href="species/create">Create Species</a></li>
</ul>
<ul>
<li><a href="?species=0">root</a></li>
@foreach($species as $specie)
	@include('species.node', $specie)
@endforeach
</ul>