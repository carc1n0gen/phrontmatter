<?php

/**
 * PhrontMatter
 *
 * @copyright Carson Evans http://carsonevans.ca/
 * @license http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.txt)
 */

namespace Carc1n0gen\PhrontMatter\Adapter;

use Carc1n0gen\PhrontMatter\ParserInterface;
use Parsedown;

/**
 * An adapter to the Parsedown markdown parser.
 */
class ParsedownAdapter implements ParserInterface
{
    
    /**
     * @var Parsedown
     */
    private $parser;
    
    public function __construct(Parsedown $parser = null)
    {
        $this->parser = $parser ?: new Parsedown();
    }
    
    public function parse($markdown)
    {
        return $this->parser->parse($markdown);
    }
    
}
