<?php

namespace Carc1n0gen\PhrontMatter;

/**
 * Document.
 */
class Document 
{
    
    /**
     * @var mixed
     */
    private $frontMatter;
         
    /**
     * @var string
     */
    private $content;
    
    public function __construct($frontMatter, $content) {
        $this->frontMatter = $frontMatter;
        $this->content = $content;
    }
    
    /**
     * Get $frontMatter
     */
    public function getFrontMatter()
    {
        return $this->frontMatter;
    }
    
    /**
     * Get $content
     */
    public function getContent()
    {
        return $this->content;
    }
    
}
