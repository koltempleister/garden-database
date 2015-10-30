<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Seed;
use App\Species;

class SeedsController extends Controller {

     public function index()
     {
         $seeds = Seed::has('stock_items')->get();
         
         return view('seeds.index', compact('seeds', $seeds));
     }

     public function show($id)
     {
         $seed = Seed::find($id); 
         
         if(is_null($seed))
         {
             abort(404);
         }
         
         return view('seeds.show', compact('seed'));
     }
     
     public function create()
     {
         $species = Species::lists('name');
         $sowing_periods = Seed::sowingPeriods(); 
        //dd($sowing_periods); 
        return view('seeds.create', compact('species', 'sowing_periods'));
     }

}
