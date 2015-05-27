@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Seeds</div>

				<div class="panel-body">
					@foreach($seeds as $seed)
                                            
                                            <article>
                                                <p><a href="seeds/{{$seed->id}}">{{$seed->name}} - {{$seed->stock_items->count()}}</a></p>
                                            </article>
                                        @endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
