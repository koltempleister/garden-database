<?php

namespace App\Http\Controllers;

use \Request;
use Response;
use App\Species;
use App\Http\Requests\CreateSpecies;
use App\Http\Requests\UpdateSpecies;
use App\Transformers\SpeciesTreeTransformer;


class SpeciesController extends Controller
{
    public function index(SpeciesTreeTransformer $transformer)
    {
        /**
         * https://github.com/jonmiles/react-bootstrap-treeview
         */
//
        $species = Species::get()->toTree();

        $species_transformed = $transformer->transformCollection($species);

        if (Request::get('format') != 'ajax') {
            return view('species.nodes', compact('species'));
        } else {
            $species_json = json_encode($species_transformed);
            //temp output view
            return view('species.vue', compact('species_json'));

        }

    }

    public function create(\Illuminate\Http\Request $request)
    {
        $parent_id = $request->get('parent_id');

        $species = new Species;
        $species->parent_id = $parent_id;

        $parents = Species::parentsTreeArray();

        return view('species.create', compact('species', 'parents'));
    }

    public function edit($species)
    {
        $parents = Species::parentsTreeArray();
        
        return view('species.edit',compact('species', 'parents'));
    }

    public function store(CreateSpecies $request)
    {
        $request->persist();

        return redirect('/seed');
    }

    public function update(UpdateSpecies $request)
    {
        $request->persist();

        return redirect('/seed');
    }


}
