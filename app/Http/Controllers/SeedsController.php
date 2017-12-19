<?php namespace App\Http\Controllers;

use App\Http\Requests\UpdateSeed;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\CreateSeed;
use App\Seed;
use App\Species;
use App\Handlers\SessionWatch\SessionWatcher;
use App\Handlers\SessionWatch\WatchedSession;
use \Session;

class SeedsController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(SessionWatcher $sessionWatcher)
    {
        $search = Request::get('q');

        $filter_on_species = Request::get('species');

        $sessionWatcher->watch(new WatchedSession('search', !is_null($search), $search));
        $sessionWatcher->watch(new WatchedSession('filter_on_species', $filter_on_species !== null , $filter_on_species));

        $seeds_query = null;

        if (Session::get('search') != false) {
            $has_session = true;
            $seeds_query = Seed::search(Session::get('search'));
        }

        if (Session::get('filter_on_species')) {
            if (!is_null($seeds_query)) {
                $seeds_query = $seeds_query->filterSpecies(Session::get('filter_on_species'));
            } else {
                $seeds_query = Seed::filterSpecies(Session::get('filter_on_species'));
                //dd($seeds_query->toSql());
            }
        }

        if ($sessionWatcher->watchedSessionIsRegistered()) {
//            $seeds = Seed::paginate(15); //show all seeds paginated
                $seeds=Seed::all();
        } else {
            //$seeds = $seeds_query->paginate(15);
            $seeds = $seeds_query->paginate(15);
        }

        $species = Species::get()->toTree();

        return $seeds;

     //   return view('seeds.index', compact('seeds', 'species'));
     }

    /**
     * fixes left and right based upon parent_id
     * @todo remove when no longer necessary
     */
    public function migrate_tree()
    {
        Species:: fixTree();
    }

    public function show($seed)
    {
        return $seed;
    }

    public function store(CreateSeed $request)
    {
        $request->persist();
    }

    public function update(UpdateSeed $request)
    {
        $request->persist();
    }
}
