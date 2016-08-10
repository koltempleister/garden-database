<?php
/**
 * Created by PhpStorm.
 * User: koltempleister
 * Date: 08.08.16
 * Time: 20:42
 */

namespace App\Transformers;


class SpeciesTreeTransformer extends Transformer
{
    public function transform($species)
    {
        return [
            'name' => $species['name'],
            'id' => $species['id'],
            'children' => $this->transformCollection($species['children'])
        ];
    }


}