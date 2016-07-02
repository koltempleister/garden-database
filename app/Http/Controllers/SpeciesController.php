<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateSpecies

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

        return view('species.create', compact('species'));
    }

    public function edit($id)
    {
        $species = Species::find($id);

        $species_tree = Species::get()->toTree();

        $traverse = function ($categories, $prefix = '-') use (&$traverse) {
            $out = [];
            foreach ($categories as $category) {
                $out[$category->id] = PHP_EOL.$prefix.' '.$category->name;

                $out = array_merge($out, $traverse($category->children, $prefix.'-'));
            }
            return $out;
        };

        $parents[0] = 'root';
        
        $parents = array_merge($parents, $traverse($species_tree))s;
        
        return view('species.edit',compact('species', 'parents'));
    }

    public function update($id, CreateSpecies $request)
    {
        $species == Species::find($id);

        $species->update($request->all());

        return redirect('seeds');
    }
}
