<?php

namespace Carc1n0gen\PhrontMatter\Adapter;

use Carc1n0gen\PhrontMatter\ParserInterface;
use Symfony\Component\Yaml\Parser;

/**
 * An adapter to the YAML parser from Symphony.
 */
class SymfonyYAMLParser implements ParserInterface
{
    
    /**
     * @var \Symfony\Component\Yaml\Parser
     */
    private $parser;
    
    public function __construct()
    {
        $this->parser = new Parser();
    }
    
    public function parse($yaml)
    {
        return $this->parser->parse($yaml);
    }
    
}
