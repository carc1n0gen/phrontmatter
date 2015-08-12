<?php

namespace Carc1n0gen\PhrontMatter\Adapter;

use Carc1n0gen\PhrontMatter\ParserInterface;
use Symfony\Component\Yaml\Parser;

/**
 * An adapter to the YAML parser from Symphony.
 */
class SymfonyYAMLAdapter implements ParserInterface
{
    
    /**
     * @var \Symfony\Component\Yaml\Parser
     */
    private $parser;
    
    public function __construct(Parser $parser = null)
    {
        $this->parser = $parser ?: new Parser();
    }
    
    public function parse($yaml)
    {
        return $this->parser->parse($yaml);
    }
    
}
