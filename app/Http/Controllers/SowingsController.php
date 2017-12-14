<?php namespace App\Http\Controllers;

use App\Http\Requests\CreateSowing;
use App\Http\Controllers\Controller;
use App\Sowing;
use App\Stock_item;
use App\Place;
use Illuminate\Http\Request;
use DB;

class SowingsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($year)
	{
		/**
		* get all places that have sowings in a specific year 
		*/
		$places =  Place :: whereHas('sowings', function($query) use ($year){
			$query->where('year','=',$year);
		})->get();

		$places->each(function($item) use($year){
			// var_dump($item);
			$item->sowings = $item->sowings->filter(function($item) use ($year){
				return $item->year == $year;
			})->all();
			
		});

		$years = Sowing :: distinct('year')->pluck('year');

		return view('sowings.index', compact('years','places'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$places = Place :: all() -> pluck('name','id');
		$stock_items_list = Stock_item :: available();

		$sowing = new Sowing();
		$sowing->year = date('Y');
 	
 		return view('sowings.create', compact('places', 'stock_items_list', 'sowing'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateSowing $request)
	{
		$sowing = new Sowing($request->all());


		$stock_item = Stock_item :: find($sowing->stock_item_id);
		$seed_id = $stock_item->seed->id;
		$sowing->seed_id = $seed_id;

		$sowing->save();

		return redirect('sowings/' . $sowing->year);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$places = Place :: all() -> pluck('name','id');
		$stock_items_list = Stock_item :: available();
		$sowing = Sowing :: find($id);
		
		return view('sowings.edit', compact('places', 'stock_items_list', 'sowing'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, CreateSowing $request)
	{
		$sowing = Sowing :: findOrFail($id);
		$sowing->update($request->all());
		
		return redirect('sowings/' . $sowing->year);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
