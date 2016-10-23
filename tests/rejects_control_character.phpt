--TEST--
Rejects control character
--SKIPIF--
<?php echo 'skip failing test'; ?>
--FILE--
<?php
$parser = new GraphQL\Parser();
try {
  $parser->parse('query myQuery { \a }');
} catch (GraphQL\Error\ParseError $e) {
  echo $e->getMessage();
}
?>
--EXPECT--
1.17: unrecognized character \a
