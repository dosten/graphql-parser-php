--TEST--
Rejects variables in constant values
--SKIPIF--
<?php if (!extension_loaded('graphql') echo 'skip'; ?>
--FILE--
<?php
$parser = new GraphQL\Parser();
try {
  $parser->parse('query Foo($x: Complex = { a: { b: [$var] } }) { field }');
} catch (GraphQL\Error\ParseError $e) {
  echo $e->getMessage();
}
?>
--EXPECT--
1.36-39: syntax error, unexpected VARIABLE
