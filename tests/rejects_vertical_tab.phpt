--TEST--
Rejects vertical tab
--SKIPIF--
<?php if (!extension_loaded('graphql') echo 'skip'; ?>
--FILE--
<?php
$parser = new GraphQL\Parser();
try {
  $parser->parse("\v");
} catch (GraphQL\Error\ParseError $e) {
  echo $e->getMessage();
}
?>
--EXPECT--
1.1: unrecognized character \v
