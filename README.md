Appsflyer SDK for Laravel
=========================
This extension allows you to access the Appsflyer API by a comprehensive way.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

With Composer installed, you can then install the extension using the following commands:

```bash
$ php composer.phar require jlorente/laravel-appsflyer
```

or add 

```json
...
    "require": {
        "jlorente/laravel-appsflyer": "*"
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
        'is_active' => true,
    ];
];
```


## Usage

You can use the facade alias Appsflyer to execute api calls. The authentication 
params will be automaticaly injected.

```php
Appsflyer::inappevent()->create($data);
```

## Notification Channel

A notification channel is included in this package and allows you to integrate 
the Appsflyer in app events service with the Laravel notifications.

### Formatting Notifications

If a notification should trigger an Appsflyer in app event, you should define a 
toAppsflyer method on the notification class. This method will receive a $notifiable 
entity and should return a Jlorente\Laravel\Appsflyer\Notifications\Messages\AppsflyerMessage 
instance:

```php
/**
 * Get the AppsflyerMessage that represents the notification.
 *
 * @param  mixed  $notifiable
 * @return \Jlorente\Laravel\Appsflyer\Notifications\Messages\AppsflyerMessage|string
 */
public function toAppsflyer($notifiable)
{
    return (new AppsflyerMessage)
                ->platform('com.mycompany.myapp')
                ->payload([
                    'eventName' => 'af_purchase'
                ]);
}
```

Once done, you must add the notification channel in the array of the via() method 
of the notification:

```php
/**
 * Get the notification channels.
 *
 * @param  mixed  $notifiable
 * @return array|string
 */
public function via($notifiable)
{
    return [AppsflyerChannel::class];
}
```

You can find more info about Laravel notifications in [this page](https://laravel.com/docs/5.6/notifications).

## License 
Copyright &copy; 2018 José Lorente Martín <jose.lorente.martin@gmail.com>.

Licensed under the BSD 3-Clause License. See LICENSE.txt for details.
