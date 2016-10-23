--TEST--
Rejects unicode escape with bad chars
--SKIPIF--
<?php if (!extension_loaded('graphql') echo 'skip'; ?>
--FILE--
<?php

use GraphQL\Error\ParseError;

$parser = new GraphQL\Parser();

try {
  $parser->parse("{ field(arg:\"\\u0XX1\") }");
} catch (ParseError $e) {
  echo $e->getMessage()."\n";
}

try {
  $parser->parse("{ field(arg:\"\\uXXXX\") }");
} catch (ParseError $e) {
  echo $e->getMessage()."\n";
}

try {
  $parser->parse("{ field(arg:\"\\uFXXX\") }");
} catch (ParseError $e) {
  echo $e->getMessage()."\n";
}

try {
  $parser->parse("{ field(arg:\"\\uXXXF\") }");
} catch (ParseError $e) {
  echo $e->getMessage()."\n";
}
?>
--EXPECT--
1.13-15: bad Unicode escape sequence
1.13-15: bad Unicode escape sequence
1.13-15: bad Unicode escape sequence
1.13-15: bad Unicode escape sequence
