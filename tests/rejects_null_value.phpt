--TEST--
Rejects null value
--SKIPIF--
<?php if (!extension_loaded('graphql') echo 'skip'; ?>
--FILE--
<?php
$parser = new GraphQL\Parser();
try {
  $parser->parse('{ fieldWithNullableStringInput(input: null) }');
} catch (GraphQL\Error\ParseError $e) {
  echo $e->getMessage();
}
?>
--EXPECT--
1.39-42: syntax error, unexpected null
