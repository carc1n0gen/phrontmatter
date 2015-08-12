<?php

/**
 * PhrontMatter
 *
 * @copyright Carson Evans http://carsonevans.ca/
 * @license http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.txt)
 */

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
