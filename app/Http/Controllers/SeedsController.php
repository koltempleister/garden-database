<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\CreateSeed;
use App\Seed;
use App\Species;
use Session;

class SeedsController extends Controller {

    public function __construct()
    {
            $this->middleware('auth');
    }
        
    public function index()
     {
        
        $search = Request::get('q'); 
        $filter_on_species = Request::get('species');       

        if(!is_null($search))
        {
            Session::put('search', $search);
        }
        else
        {
            Session::forget('search');
        }
        
        if ($filter_on_species !== 0)
        {
            Session::put('filter_on_species', $filter_on_species);
        }
        else
        {
            Session::forget('filter_on_species');
        }
        
        $has_session = false;
        $seeds_query = null;
        if(Session::get('search') != false)
        {
            $has_session = true;
            $seeds_query = Seed::search(Session::get('search')); 
        }
        var_Dump($filter_on_species);
        var_Dump(Session::get('filter_on_species'));
        var_Dump($search);
        var_Dump(Session::get('search'));
        if(Session::get('filter_on_species'))
        {
            $has_session = true;
            if(!is_null($seeds_query))
            {
                $seeds_query = $seeds_query->filterSpecies(Session::get('filter_on_species'));
            }
            else
            {
                $seeds_query = Seed::filterSpecies(Session::get('filter_on_species'));
            }            
        }
        
        if(!$has_session)
        {
            $seeds= Seed::paginate(15); //show all seeds paginated

        }
        else
        {
            //$seeds = $seeds_query->paginate(15);
            dd($seeds_query->toSql());
        }


         $species = Species::get()->toTree();
// dd($species);

         return view('seeds.index', compact('seeds', 'species'));
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
