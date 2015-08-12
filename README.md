# PhrontMatter

A PHP library for parsing documents with frontmatter.

By default, documents are parsed as markdown with YAML front matter.  The front 
matter begins and ends with "---" like [Jekyll](http://jekyllrb.com/docs/frontmatter/)

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