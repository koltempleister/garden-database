<?php

namespace App\Http\Controllers;

use App\Transformers\SpeciesTreeTransformer;
use Illuminate\Support\Facades\Redirect;
use \Request;
use Response;

use App\Http\Requests\CreateSpecies;

use App\Species;

class SpeciesController extends Controller
{
    public function index(SpeciesTreeTransformer $transformer)
    {
        /**
         * https://github.com/jonmiles/react-bootstrap-treeview
         */

        $species = Species::get()->toTree();

        $species_transformed = $transformer->transformCollection($species);

        if (Request::get('format') != 'ajax') {


            return view('species.nodes', compact('species'));
        } else {
            return Response::json(
                compact('species_transformed'),
                200
            );
        }

    }

    public function create()
    {
        $parent_id = Request::get('parent_id');

        $species = new Species;
        $species->parent_id = $parent_id;

        $parents = Species::parentsTreeArray();

        return view('species.create', compact('species', 'parents'));
    }

    public function edit($id)
    {
        $species = Species::find($id);

        $parents = Species::parentsTreeArray();
        
        return view('species.edit',compact('species', 'parents'));
    }

    public function store(CreateSpecies $request)
    {
        Species::create($request->all());

        return redirect('seeds');
    }

    public function update($id, CreateSpecies $request)
    {
        $species == Species::find($id);

        $species->update($request->all());

        return redirect('seeds');
    }


}
