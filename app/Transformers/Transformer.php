<?php
namespace App\Transformers;

abstract class Transformer
{
    public function transformCollection($collection)
    {
        return array_map([$this, 'transform'], $collection->all());
    }

    

    abstract public function transform($object);
}