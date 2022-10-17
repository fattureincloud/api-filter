# FattureInCloud API Filter

This PHP library makes possible to parse a string parameter and use it to initialize a Filter that can be used on REST APIs; the input string is based on a simplified SQL-like WHERE clause, making it easy to understand and use.

The library returns a class-based representation of the filter, that can be used to generate the actual filter to apply to your API requests.

## Install

Via Composer

``` bash
$ composer require fattureincloud/api-filter
```

## Usage
To parse a filter string, you can use the *FattureInCloud\ApiFilter\FilterFactory* class:

``` php
use FattureInCloud\ApiFilter\FilterFactory

$str = "id = 5";
$factory = new FilterFactory();

$filter = $factory->initFilter($str);
```

The returned filter will be a composition of the classes contained in the *FattureInCloud\ApiFilter\Filter* package.

The string is based on triplets:
```
field op value
```

The **field** is a lowercase string, with dots and underscores.

The **op** is one of the following (unquoted):
- _Equal_: '='
- _Greater than_: '>'
- _Greater than or equal to_: '>='
- _Less than_: '<'
- _Less than or equal to_: '<='
- _Not equal_: '<>', '!='

The **value** can be one of:
- _String_: 'value'
- _Booleam_: true, false
- _Int_: 46
- _Double_: 12.34

You can _escape the single quote_ in a string value by doubling it. The filter will take care of returning the expected string.


It is also possible to **match a String against a Pattern** using one of those operators:
- _Like_: 'like', 'LIKE'
- _Contains_: 'contains', 'CONTAINS'
- _Starts With_: 'starts with', 'STARTS WITH'
- _Ends With_: 'ends with', 'ENDS WITH'

Like and Contains can also be negated:
- _Not Like_: 'not like', 'NOT LIKE'
- _Not Contains_: 'not contains', 'NOT CONTAINS'

Additionally, it is possible to check if field has a value or not, using NULL:
- _Null field_: 'IS NULL', 'is null', '= null', '= NULL'
- _Not Null field_: 'IS NOT NULL', 'is not null', '<> null', '!= null', '<> NULL', '!= NULL'

It is possible to use the following operators:
- _Conjunction_: 'and', 'AND'
- _Disjunction_: 'or', 'OR'

Parenthesis can be used to compose complex expressions.

For example:
```
city = 'Bergamo' and (age < 30 or (dev = true and (name = 'Giorgio' and surname is not null) or employer starts with 'Fatture'))
```

## Testing

``` bash
$ composer test
```

# Parser generation
The parser was generated automatically using [ANTLR](https://www.antlr.org/) and the [PHP target](https://github.com/antlr/antlr4/blob/master/doc/php-target.md); it is placed in the *FattureInCloud\ApiFilter\Parser* repository.
Usually you should not directly manage the parser: the **FilterFactory** class is a wrapper that manages it for you.

The grammar is placed under the */grammar* folder, if needed you can trigger the parser generation using docker and composer:
``` bash
$ composer generate
```

If needed, you can generate a parser in another language changing the [ANTLR target](https://github.com/antlr/antlr4/blob/master/doc/targets.md) in the *entrypoint.sh* file.

## License

The MIT License (MIT).
