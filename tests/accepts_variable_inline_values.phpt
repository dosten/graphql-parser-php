--TEST--
Accepts variable inline values
--SKIPIF--
<?php if (!extension_loaded('graphql') echo 'skip'; ?>
--FILE--
<?php
$parser = new GraphQL\Parser();
$ast = $parser->parse('{ field(complex: { a: { b: [$var] } }) }');
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
    int(41)
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
        int(41)
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
          int(41)
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
              int(39)
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
                  int(38)
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
                    int(16)
                  }
                  ["value"]=>
                  string(7) "complex"
                }
                ["value"]=>
                array(3) {
                  ["kind"]=>
                  string(11) "ObjectValue"
                  ["loc"]=>
                  array(2) {
                    ["start"]=>
                    int(18)
                    ["end"]=>
                    int(38)
                  }
                  ["fields"]=>
                  array(1) {
                    [0]=>
                    array(4) {
                      ["kind"]=>
                      string(11) "ObjectField"
                      ["loc"]=>
                      array(2) {
                        ["start"]=>
                        int(20)
                        ["end"]=>
                        int(36)
                      }
                      ["name"]=>
                      array(3) {
                        ["kind"]=>
                        string(4) "Name"
                        ["loc"]=>
                        array(2) {
                          ["start"]=>
                          int(20)
                          ["end"]=>
                          int(21)
                        }
                        ["value"]=>
                        string(1) "a"
                      }
                      ["value"]=>
                      array(3) {
                        ["kind"]=>
                        string(11) "ObjectValue"
                        ["loc"]=>
                        array(2) {
                          ["start"]=>
                          int(23)
                          ["end"]=>
                          int(36)
                        }
                        ["fields"]=>
                        array(1) {
                          [0]=>
                          array(4) {
                            ["kind"]=>
                            string(11) "ObjectField"
                            ["loc"]=>
                            array(2) {
                              ["start"]=>
                              int(25)
                              ["end"]=>
                              int(34)
                            }
                            ["name"]=>
                            array(3) {
                              ["kind"]=>
                              string(4) "Name"
                              ["loc"]=>
                              array(2) {
                                ["start"]=>
                                int(25)
                                ["end"]=>
                                int(26)
                              }
                              ["value"]=>
                              string(1) "b"
                            }
                            ["value"]=>
                            array(3) {
                              ["kind"]=>
                              string(9) "ListValue"
                              ["loc"]=>
                              array(2) {
                                ["start"]=>
                                int(28)
                                ["end"]=>
                                int(34)
                              }
                              ["values"]=>
                              array(1) {
                                [0]=>
                                array(3) {
                                  ["kind"]=>
                                  string(8) "Variable"
                                  ["loc"]=>
                                  array(2) {
                                    ["start"]=>
                                    int(29)
                                    ["end"]=>
                                    int(33)
                                  }
                                  ["name"]=>
                                  array(3) {
                                    ["kind"]=>
                                    string(4) "Name"
                                    ["loc"]=>
                                    array(2) {
                                      ["start"]=>
                                      int(29)
                                      ["end"]=>
                                      int(33)
                                    }
                                    ["value"]=>
                                    string(3) "var"
                                  }
                                }
                              }
                            }
                          }
                        }
                      }
                    }
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
