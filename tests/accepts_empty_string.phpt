--TEST--
Accepts empty string
--SKIPIF--
<?php if (!extension_loaded('graphql') echo 'skip'; ?>
--FILE--
<?php
$parser = new GraphQL\Parser();
$ast = $parser->parse('{ field(arg: "") }');
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
    int(19)
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
        int(19)
      }
      ["operation"]=>
      string(5) "query"
      ["name"]=>
      NULL
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
          int(1)
          ["end"]=>
          int(19)
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
              int(3)
              ["end"]=>
              int(17)
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
                int(3)
                ["end"]=>
                int(8)
              }
              ["value"]=>
              string(5) "field"
            }
            ["arguments"]=>
            array(1) {
              [0]=>
              array(4) {
                ["kind"]=>
                string(8) "Argument"
                ["loc"]=>
                array(2) {
                  ["start"]=>
                  int(9)
                  ["end"]=>
                  int(13)
                }
                ["name"]=>
                array(3) {
                  ["kind"]=>
                  string(4) "Name"
                  ["loc"]=>
                  array(2) {
                    ["start"]=>
                    int(9)
                    ["end"]=>
                    int(12)
                  }
                  ["value"]=>
                  string(3) "arg"
                }
                ["value"]=>
                array(3) {
                  ["kind"]=>
                  string(11) "StringValue"
                  ["loc"]=>
                  array(2) {
                    ["start"]=>
                    int(12)
                    ["end"]=>
                    int(13)
                  }
                  ["value"]=>
                  string(0) ""
                }
              }
            }
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
