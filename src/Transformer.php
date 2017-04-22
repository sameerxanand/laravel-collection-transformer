<?php

namespace Spawned\Transformer;

abstract class Transformer
{
    /**
     * Transform a collection.
     *
     * @param $items
     * @return array
     */
    public function transformCollection($collection)
    {
        return $collection->transform(function($item, $key) {
            return $this->transform($item);
        });
    }
    
    public abstract function transform($item);
}
