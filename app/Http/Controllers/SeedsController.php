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

    public function index()
    {
        $seeds = Seed::all();

        return $seeds;
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
        return $request->persist();
    }

    public function update(UpdateSeed $request)
    {
        $request->persist();
    }
}
