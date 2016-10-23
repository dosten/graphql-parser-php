--TEST--
Accepts unicode BOM
--SKIPIF--
<?php if (!extension_loaded('graphql') echo 'skip'; ?>
--FILE--
<?php
$parser = new GraphQL\Parser();

$ast1 = $parser->parse("\xef\xbb\xbfquery myquery { field }");
$ast2 = $parser->parse("query myquery\xef\xbb\xbf{ field }");

var_dump($ast1, $ast2);
?>
--EXPECT--
array(3) {
  ["kind"]=>
  string(8) "Document"
  ["loc"]=>
  array(2) {
    ["start"]=>
    int(4)
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
        int(4)
        ["end"]=>
        int(27)
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
          int(10)
          ["end"]=>
          int(17)
        }
        ["value"]=>
        string(7) "myquery"
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
          int(18)
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
              int(20)
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
                int(20)
                ["end"]=>
                int(25)
              }
              ["value"]=>
              string(5) "field"
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
        string(7) "myquery"
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
          int(17)
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
              int(19)
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
                int(19)
                ["end"]=>
                int(24)
              }
              ["value"]=>
              string(5) "field"
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
