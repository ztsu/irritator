Ztsu\Irritator
==============

Schema-oriented assertion libary for PHP


## Requirements

- PHP 7.*

## Install

```
$ composer require ztsu/irritator
```

## Basic usage

```

use Ztsu\Irritator as Assert;

$schema = Assert\hashmap(
  [
    "name" => Assert\isString(),
  ]
);

$value = [
  "name" => "Test",
];

$schema->valid($value);

```

## Assertions

### Basic

- int
- number
- string
- boolean
- list
- hashmap
- same
- equal
- regexp

### Combinators

- one of
- null or

### Numbers

- less than
- greater than
- less or equal
- greater or equal

### Strings

- email
- url
- phone
- ip v4
- ip v6
- uuid

### Dates

- ISO 8601

### Hashmap

- required
- one of keys


## License

Irritator is licensed under the MIT License. For details see the LICENSE.md file.