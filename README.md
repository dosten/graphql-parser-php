# libgraphqlparser PHP bindings

[![Build Status](https://travis-ci.org/dosten/graphql-parser-php.svg?branch=master)](https://travis-ci.org/dosten/graphql-parser-php)

A PHP extension wrapping the [libgraphqlparser](https://github.com/graphql/libgraphqlparser) library for parsing [GraphQL](http://graphql.org).

## Installation

### Installing libgraphqlparser

You need to install libgraphqlparser before attempting to compile this extension.

```
$ cd deps/libgraphqlparser
$ cmake .
$ make
$ make install
```

### Compiling the extension

```
$ phpize
$ ./configure
$ make
$ make install
```

### Installing the extension

`make install` copies `graphql.so` to an appropriate location, but you still
need to enable the extension in the PHP config file. To do so, edit your
`php.ini` with the following contents: `extension=graphql.so`

## Usage

```php
<?php

use GraphQL\Parser;
use GraphQL\Error\ParseError;

$parser = new Parser();

try {
    $ast = $parser->parse('query { name }');
    print_r($ast);
} catch (ParseError $e) {
    echo sprintf('Parse error: %s', $e->getMessage());
}
```

The output will be:

```
Array
(
    [kind] => Document
    [loc] => Array
        (
            [start] => 1
            [end] => 15
        )

    [definitions] => Array
        (
            [0] => Array
                (
                    [kind] => OperationDefinition
                    [loc] => Array
                        (
                            [start] => 1
                            [end] => 15
                        )

                    [operation] => query
                    [name] =>
                    [variableDefinitions] =>
                    [directives] =>
                    [selectionSet] => Array
                        (
                            [kind] => SelectionSet
                            [loc] => Array
                                (
                                    [start] => 7
                                    [end] => 15
                                )

                            [selections] => Array
                                (
                                    [0] => Array
                                        (
                                            [kind] => Field
                                            [loc] => Array
                                                (
                                                    [start] => 9
                                                    [end] => 13
                                                )

                                            [alias] =>
                                            [name] => Array
                                                (
                                                    [kind] => Name
                                                    [loc] => Array
                                                        (
                                                            [start] => 9
                                                            [end] => 13
                                                        )

                                                    [value] => name
                                                )

                                            [arguments] =>
                                            [directives] =>
                                            [selectionSet] =>
                                        )

                                )

                        )

                )

        )

)
```

## License

This extension is licensed under the MIT License, see the LICENSE file for details.
