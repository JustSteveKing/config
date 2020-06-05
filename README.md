# Config

<!-- BADGES_START -->
[![Latest Version][badge-release]][packagist]
[![Software License][badge-license]][license]
[![PHP Version][badge-php]][php]
![run-tests](https://github.com/JustSteveKing/config/workflows/run-tests/badge.svg)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/JustSteveKing/config/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/JustSteveKing/config/?branch=master)
[![Total Downloads][badge-downloads]][downloads]

[badge-release]: https://img.shields.io/packagist/v/juststeveking/config.svg?style=flat-square&label=release
[badge-license]: https://img.shields.io/packagist/l/juststeveking/config.svg?style=flat-square
[badge-php]: https://img.shields.io/packagist/php-v/juststeveking/config.svg?style=flat-square

[badge-downloads]: https://img.shields.io/packagist/dt/juststeveking/config.svg?style=flat-square&colorB=mediumvioletred

[packagist]: https://packagist.org/packages/juststeveking/config
[license]: https://github.com/JustSteveKing/config/blob/master/LICENSE
[php]: https://php.net
[downloads]: https://packagist.org/packages/juststeveking/config
<!-- BADGES_END -->


**Please note, this package is a work in progress. While there will be no breaking changes a stable release is not yet available**

A simple dot notation connfiguration package.


## Installing

Using composer:

```bash
$ composer require juststeveking/config
```

You are then to use this package however you need.


## Usage

```php
// app.php
return [
    'name' => 'super cool app',
    'version' => 'v1.0.0',
    'items' => [
        'router' => 'awesome php router'
    ]
];

$appConfig = require __DIR__ . '/../config/app.php'; // an array

$config = Repository::build($appConfig);

$config->all(); // returns all items in config
$config->has('name.version'); // returns a boolean for if the item is available
$config->get('items.router'); // will return "awesome php router"
$config->getMany(['name', 'version']); // will return ['name' => 'super cool app', 'version' => 'v1.0.0']
$config->set('items.database', 'pdo'); // will set 'database' => 'pdo' on the items array
$config->all(); // will reurn the entire config array

```

## Tests

There is a composer script available to run the tests:

```bash
$ composer run preflight:test
```

However, if you are unable to run this please use the following command:

```bash
$ ./vendor/bin/phpunit --testdox
```

## Security

If you discover any security related issues, please email juststevemcd@gmail.com instead of using the issue tracker.