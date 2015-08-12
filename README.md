# PhrontMatter

A PHP library for parsing documents with frontmatter.

By default, documents are parsed as markdown with YAML front matter.  The front 
matter begins and ends with "---" like <a href="http://jekyllrb.com/docs/frontmatter/" target="_blank">Jekyll</a>

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

## Different Front Matter Formats

PhrontMatter allows you to write your front matter in any format you like, and comes with two built in
parsers for YAML, and JSON.  So you could also write the front matter in JSON.

### JSON Front Matter

```php
use \Carc1n0gen\PhrontMatter\Parser;
use \Carc1n0gen\PhrontMatter\Adapter\JSONParser;

// Create in instance of the JSON parser adapter.
$adapter = new JSONParser();

// Create a Parser instance with a custom front matter parser.
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