@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
		<a href="seeds/create">Create Seed</a>

			<div class="panel panel-default">

				<div class="panel-heading">Seeds</div>

				<div class="panel-body">

					@foreach($seeds as $seed)
                        
                        <article>
                            <p>{{$seed->name}} - [stock] ({{count($seed->stock_items)}}) <a href="seeds/edit/{{$seed->id}}">[update]</a> <a href="seeds/{{$seed->id}}">[details]</a></p>
                        </article>
                    @endforeach
				</div>
			</div>
		</div>
		{!!$seeds->render()!!}
	</div>
</div>
@endsection
