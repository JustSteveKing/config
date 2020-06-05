# Config

A simple dot notation connfiguration package

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
