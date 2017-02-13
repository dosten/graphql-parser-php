--TEST--
Accepts null value
--SKIPIF--
<?php if (!extension_loaded('graphql') echo 'skip'; ?>
--FILE--
<?php
$parser = new GraphQL\Parser();
$ast = $parser->parse('{ fieldWithNullableStringInput(input: null) }');
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
    int(46)
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
        int(46)
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
          int(46)
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
              int(44)
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
                int(31)
              }
              ["value"]=>
              string(28) "fieldWithNullableStringInput"
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
                  int(32)
                  ["end"]=>
                  int(43)
                }
                ["name"]=>
                array(3) {
                  ["kind"]=>
                  string(4) "Name"
                  ["loc"]=>
                  array(2) {
                    ["start"]=>
                    int(32)
                    ["end"]=>
                    int(37)
                  }
                  ["value"]=>
                  string(5) "input"
                }
                ["value"]=>
                array(2) {
                  ["kind"]=>
                  string(9) "NullValue"
                  ["loc"]=>
                  array(2) {
                    ["start"]=>
                    int(39)
                    ["end"]=>
                    int(43)
                  }
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
