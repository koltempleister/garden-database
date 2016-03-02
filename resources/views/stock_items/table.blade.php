<table class="table">
    <thead>
    	<tr>
    		<th>supplier</th>
    		<th>date of purchase</th>
    		<th>fresh until</th>
    		<th>status</th>
    		
    	</tr>
    </thead>
    @foreach($stock_items as $stock_item)
    <tr>
    	<td>{{$stock_item->supplier->name}}</td>
    	<td>{{$stock_item->date_of_purchase}}</td>
    	<td>{{$stock_item->fresh_untill}}</td>
    	<td>{{$stock_item->status}}</td>
    	<td><a href="/stock/{{$stock_item->id}}/edit" class="btn btn-default btn-xs">edit</a><a href="" class="btn btn-default btn-xs">delete</a></td>
    	
	</tr>                   
    @endforeach
    </table>