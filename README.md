# PhrontMatter

A PHP library for parsing documents with frontmatter.

By default, documents are parsed as markdown with YAML front matter.  The front 
matter begins and ends with "---" like <a href="http://jekyllrb.com/docs/frontmatter/" target="_blank">Jekyll</a>

## Install

$ `composer require carc1n0gen/phrontmatter`

## Example

```php
use \Carc1n0gen\PhrontMatter\Parser;

// Create a Parser instance with default options.
$parser = new Parser();

$document = $parser->parse(file_get_contents('path/to/markdown/file'));

// If the front matter contaned:
// ---
// author:
//   firstName: John
//   lastName: Smith
// ---
print_r($document->getFrontMatter());

// Returns:
// Array
// (
//     [author] => Array
//         (
//             [firstName] => John
//             [lastName] => Smith
//         )
// 
// )
```

The parsed document content can be accessed with `$document->getContent()`.

You can provide `false` as the second parameter to `$parser->parse` if you wish
to leave the document content as is with no parsing.  For example, if the document 
content is in HTML format and does not need parsing.

## Different Front Matter Formats

PhrontMatter allows you to write your front matter in any format you like, and comes with two built in
adapters for YAML, and JSON.  So you could also write the front matter in JSON.

### JSON Front Matter

```php
use \Carc1n0gen\PhrontMatter\Parser;
use \Carc1n0gen\PhrontMatter\Adapter\JSONAdapter;

// Create in instance of the JSON parser adapter.
$adapter = new JSONAdapter();

// Create a Parser instance with a custom front matter adapter.
$parser = new Parser($adapter);

$document = $parser->parse(file_get_contents('path/to/markdown/file'));

// If the front matter contaned:
// ---
// {
// 	   "author": {
//         "firstName": "John",
//         "lastName": "Smith"
//     }
// }
// ---
print_r($document->getFrontMatter());

// Returns:
// stdClass Object
// (
//     [author] => stdClass Object
//         (
//             [firstName] => John
//             [lastName] => Smith
//         )
// 
// )
```

### Custom Parser Adapters

The Parser class cunstructor signature is: 

```
public function __construct(ParserInterface $frontMatterParser = null,
                            ParserInterface $contentParser = null,
                            $startSep = '---',
                            $endSep = '---')
```  

You can supply the constructor with your own front matter parsing adapter in the case you want to use another format besides YAML or JSON, You could supply the consturctor with your own content
parsing adapter in the case you want to write the document content in a format other than markdown, and you can supply the constructor with custom begin/end separators for the front matter
section of your document.

When writing a custom parser adapter, one only needs to meet the `\Carc1n0gen\PhrontMatter\ParserInterface` interface.
