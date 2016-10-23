--TEST--
Simple error
--SKIPIF--
<?php if (!extension_loaded('graphql') echo 'skip'; ?>
--FILE--
<?php
$parser = new GraphQL\Parser();
try {
  $parser->parse('query myquery on type { field }');
} catch (GraphQL\Error\ParseError $e) {
  echo $e->getMessage();
}
?>
--EXPECT--
1.15-16: syntax error, unexpected on, expecting ( or @ or {
