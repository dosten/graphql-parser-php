--TEST--
Accepts simple query
--SKIPIF--
<?php if (!extension_loaded('graphql') echo 'skip'; ?>
--FILE--
<?php
$parser = new GraphQL\Parser();
$ast = $parser->parse('query MyQuery { myfield }');
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
    int(26)
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
        int(26)
      }
      ["operation"]=>
      string(5) "query"
      ["name"]=>
      array(3) {
        ["kind"]=>
        string(4) "Name"
        ["loc"]=>
        array(2) {
          ["start"]=>
          int(7)
          ["end"]=>
          int(14)
        }
        ["value"]=>
        string(7) "MyQuery"
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
          int(15)
          ["end"]=>
          int(26)
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
              int(17)
              ["end"]=>
              int(24)
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
                int(17)
                ["end"]=>
                int(24)
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
