<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use \Request;

use App\Http\Requests\CreateSpecies;

use App\Species;

class SpeciesController extends Controller
{
    public function index()
    {
    	$species = Species::get()->toTree();

        $traverse = function ($categories, $prefix = '-') use (&$traverse) {
            foreach ($categories as $category) {
                echo PHP_EOL.$prefix.' '.$category->name;

                $traverse($category->children, $prefix.'-');
            }
        };

        return view('species.nodes', compact('species'));
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
