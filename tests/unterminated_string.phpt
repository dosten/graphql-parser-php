--TEST--
Unterminated string
--SKIPIF--
<?php if (!extension_loaded('graphql') echo 'skip'; ?>
--FILE--
<?php

use GraphQL\Error\ParseError;

$parser = new GraphQL\Parser();

try {
  $parser->parse("\"");
} catch (ParseError $e) {
  echo $e->getMessage()."\n";
}

try {
  $parser->parse("\"\n\"");
} catch (ParseError $e) {
  echo $e->getMessage();
}
?>
--EXPECT--
1.1: Unterminated string at EOF
1.1-2: Unterminated string
