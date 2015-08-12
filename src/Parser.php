<?php

namespace Carc1n0gen\PhrontMatter;

use Carc1n0gen\PhrontMatter\Adapter\ParsedownParser;
use Carc1n0gen\PhrontMatter\Adapter\SymfonyYAMLParser;

/**
 * A document parser implementation which defaults to YAML frontmatter, and
 * markdown content parsing.
 *
 * @author Carson
 */
class Parser implements ParserInterface 
{
    
    /**
     * @var string
     */
    private $startSep;
    
    /**
     * @var string
     */
    private $endSep;
    
    /**
     * @var \Carc1n0gen\PhrontMatter\ParserInterface
     */
    private $frontMatterParser;
    
    /**
     * @var \Carc1n0gen\PhrontMatter\ParserInterface 
     */
    private $contentParser;
    
    /**
     * @param \Carc1n0gen\PhrontMatter\ParserInterface $frontMatterParser
     * @param \Carc1n0gen\PhrontMatter\ParserInterface $contentParser
     * @param string $startSep
     * @param string $endSep
     */
    public function __construct(ParserInterface $frontMatterParser = null, ParserInterface $contentParser = null, $startSep = '---', $endSep = '---') {
        $this->frontMatterParser = $frontMatterParser ?: new SymfonyYAMLParser();
        $this->contentParser = $contentParser ?: new ParsedownParser();
        $this->startSep = array_filter((array) $startSep, 'is_string') ?: array('---');
        $this->endSep = array_filter((array) $endSep, 'is_string') ?: array('---');
    }
    
    /**
     * @param string $str - The raw string to parse.
     * @param boolean $parseContent - Should the content below the frontmatter be parsed?
     *
     * @return \Carc1n0gen\Phrontmatter\Document
     */
    public function parse($str, $parseContent = true)
    {
        $frontMatter = null;

        /**
         * BEGIN CREDIT: FrontYAML
         * https://github.com/mnapoli/FrontYAML
         *
         * @copyright Matthieu Napoli http://mnapoli.fr
         * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE file)
         */
        $regex = '~^('
            .implode('|', array_map('preg_quote', $this->startSep)) // $matches[1] start separator
            ."){1}[\r\n|\n]*(.*?)[\r\n|\n]+("                       // $matches[2] between separators
            .implode('|', array_map('preg_quote', $this->endSep))   // $matches[3] end separator
            ."){1}[\r\n|\n]*(.*)$~s";                               // $matches[4] document content
        
        if (preg_match($regex, $str, $matches) === 1) { // There is a Front matter
            $frontMatter = trim($matches[2]) !== '' ? $this->frontMatterParser->parse(trim($matches[2])) : null;
            $str = ltrim($matches[4]);
        }
        
        return new Document($frontMatter, $parseContent ? $this->contentParser->parse($str) : $str);
        /*
         * END CREDIT: FrontYAML
         **/
    }
    
}
