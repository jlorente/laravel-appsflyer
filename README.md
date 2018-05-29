Appsflyer SDK for Laravel
=========================
This extension allows you to access the Appsflyer API by a comprehensive way.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

With Composer installed, you can then install the extension using the following commands:

```bash
$ php composer.phar require jlorente/appsflyer-laravel
```

or add 

```json
...
    "require": {
        "jlorente/appsflyer-laravel": "*"
    }
```

to the ```require``` section of your `composer.json` file.

## Configuration

1. Register the ServiceProvider in your config/app.php service provider list.

config/app.php
```php
return [
    //other stuff
    'providers' => [
        //other stuff
        \Jlorente\Laravel\Appsflyer\AppsflyerServiceProvider::class,
    ];
];
```

2. Add the following facade to the $aliases section.

config/app.php
```php
return [
    //other stuff
    'aliases' => [
        //other stuff
        'Appsflyer' => \Jlorente\Laravel\Appsflyer\Facades\Appsflyer::class,
    ];
];
```

3. Set the dev_key and api_token in the config/services.php in a new created appsflyer array.

config/services.php
```php
return [
    //other stuff
    'appsflyer' => [
        'dev_key' => 'YOUR_DEV_KEY',
        'api_token' => 'YOUR_API_TOKEN',
    ];
];
```

## Usage

You can use the facade alias Appsflyer to execute api calls.

```php
Appsflyer::inappevent()->create($data);
```
## License 
Copyright &copy; 2018 José Lorente Martín <jose.lorente.martin@gmail.com>.

Licensed under the BSD 3-Clause License. See LICENSE.txt for details.
