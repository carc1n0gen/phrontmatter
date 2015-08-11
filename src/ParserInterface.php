<?php

namespace Carc1n0gen\PhrontMatter;

/**
 * Describes a template for parsing strings.
 */
interface DocumentParserInterface 
{
    
    /**
     * Parse a string to another format.
     * 
     * @param string $str
     * 
     * @return mixed
     */
    public function parse($str);
    
}
