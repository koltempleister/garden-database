<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
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
         Species :: tree();
         return view('seeds.index', compact('seeds', $seeds));
     }

     public function migrate_tree()
     {

        /**
         * fixes left and right based upon parent_id
         */
        Species :: fixTree();
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
         $species = Species::lists('name','id');
         $sowing_periods = Seed::sowingPeriods(); 
         $seed = new Seed(); //initialise otherwise form fails!

        return view('seeds.create', compact('seed', 'species','sowing_periods'));
     }

     public function store(CreateSeed $request)
     {
        Seed::create($request->all());
        
        return redirect('seeds');
     }

     public function edit($id)
     {
         $seed = Seed::findOrFail($id); 
         $species = Species::lists('name','id');
         $sowing_periods = Seed::sowingPeriods();
         
         return view('seeds.edit', compact('seed', 'species', 'sowing_periods'));
     }

     public function update($id, CreateSeed $request)
     {
         $seed = Seed::findOrFail($id);
         $seed->update($request->all());

         return redirect('seeds');
     }

     

}
