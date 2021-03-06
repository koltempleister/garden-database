<?php namespace App\Http\Controllers;

use App\Http\Requests\CreateStockItem;
use App\Seed;
use App\Stock_item;
use App\Supplier;

class StockItemsController extends Controller {

    public function index()
    {
    	/**
    	 *@todo filtering  
    	 */
    	$seeds = Seed :: unavailable()->get();

    	$statuses = Stock_item::statuses();
    	return view('stock_items.index', compact('seeds', 'statuses'));
    }
    public function show($id)
    {
        $stock_items = Stock_item :: where('seed_id' , '=', $id)->orderBy('seed_id')->get();        
        
        return view('stock_items.show', compact('stock_items'));
    }

    public function create($id)
    {
    	$seed = Seed::findOrFail($id);
    	$statuses = Stock_item::statuses();
    	$supplier_list = Supplier::pluck('name', 'id');
    	$stock_item = new Stock_item(); //intitialise otherwise form fails!

		return view('stock_items.create', compact('seed','supplier_list', 'statuses', 'stock_item'));
    }

    public function store(CreateStockItem $request)
    {
    	Stock_item :: create($request->all());
		
		return redirect('stock/' . $request->seed_id);
    }

    public function edit($id)
    {
    	$stock_item = Stock_item::findOrFail($id);
    	$statuses = Stock_item::statuses();
    	$supplier_list = Supplier::pluck('name', 'id');

    	return view('stock_items.edit', compact('stock_item', 'statuses', 'supplier_list'));
    }

    public function update($id, CreateStockItem $request)
    {
    	$stock_item = Stock_item::findOrFail($id);
        $stock_item->update($request->all());

    	return redirect('stock/' . $request->seed_id);
    }
}
