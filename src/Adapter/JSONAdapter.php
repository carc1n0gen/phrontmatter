<?php

namespace Carc1n0gen\PhrontMatter\Adapter;

use Carc1n0gen\PhrontMatter\ParserInterface;

/**
 * An adapter to the built in json parser function.
 */
class JSONAdapter implements ParserInterface
{
    
    public function parse($json)
    {
        return json_decode($json);
    }
    
}
