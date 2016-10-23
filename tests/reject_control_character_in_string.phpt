--TEST--
Reject control character in string
--SKIPIF--
<?php echo 'skip failing test'; ?>
--FILE--
<?php
$parser = new GraphQL\Parser();
try {
  echo $parser->parse('{ field(arg: "\b") }');
} catch (GraphQL\Error\ParseError $e) {
  echo $e->getMessage();
}
?>
--EXPECT--
1.13-14: unrecognized character \b
