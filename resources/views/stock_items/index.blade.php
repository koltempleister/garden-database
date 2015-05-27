@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Stock</div>

				<div class="panel-body">
					@foreach($stock_items as $stock_item)
                                            
                                            <article>
                                                <p>{{$stock_item->name}} - {{$stock_item->stock_items->count()}}</p>
                                            </article>
                                        @endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection