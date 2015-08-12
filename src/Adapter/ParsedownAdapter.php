<?php

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
