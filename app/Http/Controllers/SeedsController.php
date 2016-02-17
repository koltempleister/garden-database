<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSeed;
use App\Seed;
use App\Species;

class SeedsController extends Controller {

    public function __construct()
    {
            $this->middleware('auth');
    }
        
    public function index()
     {
         // $seeds = Seed::has('stock_items')->get();
         $seeds =  Seed::paginate(15);
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
        // dd($species); 
        return view('seeds.create', ['species' => $species,'sowing_periods' => $sowing_periods]);
     }

     public function store(CreateSeed $request)
     {
        //dd($request->all());
        Seed::create($request->all());
        
        return redirect('seeds');
     }
//     
//     public function get(){}
//     public function post(){}

}
