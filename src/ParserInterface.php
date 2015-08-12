<?php

/**
 * PhrontMatter
 *
 * @copyright Carson Evans http://carsonevans.ca/
 * @license http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.txt)
 */

namespace Carc1n0gen\PhrontMatter;

/**
 * Describes a template for parsing strings.
 */
interface ParserInterface
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
