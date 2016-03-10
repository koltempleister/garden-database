<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

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
}
