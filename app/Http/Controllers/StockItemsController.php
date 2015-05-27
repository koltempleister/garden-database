<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Seed;

class StockItemsController extends Controller {

    public function index()
    {
        $stock_items = Seed::has('stock_items')->get();
        //return $stock_items;
        return view('stock_items.index', compact('stock_items', $stock_items));
    }

}
