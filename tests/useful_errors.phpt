--TEST--
Useful errors
--SKIPIF--
<?php if (!extension_loaded('graphql') echo 'skip'; ?>
--FILE--
<?php

use GraphQL\Error\ParseError;

$parser = new GraphQL\Parser();

try {
  $parser->parse("{ ...MissingOn }\nfragment MissingOn Type");
} catch (ParseError $e) {
  echo $e->getMessage()."\n";
}

try {
  $parser->parse('{ field: {} }');
} catch (ParseError $e) {
  echo $e->getMessage()."\n";
}

try {
  $parser->parse('notanoperation Foo { field }');
} catch (ParseError $e) {
  echo $e->getMessage()."\n";
}

try {
  $parser->parse('...');
} catch (ParseError $e) {
  echo $e->getMessage();
}
?>
--EXPECT--
2.20-23: syntax error, unexpected IDENTIFIER, expecting on
1.10: syntax error, unexpected {
1.1-14: syntax error, unexpected IDENTIFIER
1.1-3: syntax error, unexpected ...
