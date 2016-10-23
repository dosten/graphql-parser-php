--TEST--
Accepts simple mutation
--SKIPIF--
<?php if (!extension_loaded('graphql') echo 'skip'; ?>
--FILE--
<?php
$parser = new GraphQL\Parser();
$ast = $parser->parse('mutation MyMut { myfield }');
var_dump($ast);
?>
--EXPECT--
array(3) {
  ["kind"]=>
  string(8) "Document"
  ["loc"]=>
  array(2) {
    ["start"]=>
    int(1)
    ["end"]=>
    int(27)
  }
  ["definitions"]=>
  array(1) {
    [0]=>
    array(7) {
      ["kind"]=>
      string(19) "OperationDefinition"
      ["loc"]=>
      array(2) {
        ["start"]=>
        int(1)
        ["end"]=>
        int(27)
      }
      ["operation"]=>
      string(8) "mutation"
      ["name"]=>
      array(3) {
        ["kind"]=>
        string(4) "Name"
        ["loc"]=>
        array(2) {
          ["start"]=>
          int(10)
          ["end"]=>
          int(15)
        }
        ["value"]=>
        string(5) "MyMut"
      }
      ["variableDefinitions"]=>
      NULL
      ["directives"]=>
      NULL
      ["selectionSet"]=>
      array(3) {
        ["kind"]=>
        string(12) "SelectionSet"
        ["loc"]=>
        array(2) {
          ["start"]=>
          int(16)
          ["end"]=>
          int(27)
        }
        ["selections"]=>
        array(1) {
          [0]=>
          array(7) {
            ["kind"]=>
            string(5) "Field"
            ["loc"]=>
            array(2) {
              ["start"]=>
              int(18)
              ["end"]=>
              int(25)
            }
            ["alias"]=>
            NULL
            ["name"]=>
            array(3) {
              ["kind"]=>
              string(4) "Name"
              ["loc"]=>
              array(2) {
                ["start"]=>
                int(18)
                ["end"]=>
                int(25)
              }
              ["value"]=>
              string(7) "myfield"
            }
            ["arguments"]=>
            NULL
            ["directives"]=>
            NULL
            ["selectionSet"]=>
            NULL
          }
        }
      }
    }
  }
}
