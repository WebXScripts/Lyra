# Lyra

[![Latest Version on Packagist](https://img.shields.io/packagist/v/webxscripts/lyra.svg?style=flat-square)](https://packagist.org/packages/webxscripts/lyra)
[![Total Downloads](https://img.shields.io/packagist/dt/webxscripts/lyra.svg?style=flat-square)](https://packagist.org/packages/webxscripts/lyra)

Send notifications about Laravel exceptions to Slack.

This is my first package, so please let me know if you have any suggestions or feedback, I will be happy to hear them.

Also, I want to add more features to this package (like Discord support), so if you have any ideas, please let me know.

## Installation

You can install the package via composer:

```bash
composer require webxscripts/lyra
php artisan vendor:publish --provider="Webxscripts\Lyra\LyraServiceProvider" --tag="config"
php artisan vendor:publish --provider="Webxscripts\Lyra\LyraServiceProvider" --tag="lang"
```

*Remember to set your Slack webhook URL in the config file!*

*Add following line in ```app/Exceptions/Handler.php``` file:*

```php
private Lyra $lyra;

public function __construct(..., Lyra $lyra)
{
    //...,
    $this->lyra = $lyra;
}

public function report(Throwable $e): void
{
    $this->lyra->handle($e, Request::capture());
}
```

Now on error, you will get notification on your Slack channel:

![Slack Notification](https://i.imgur.com/aboaoq1.png)

You can modify the notification message as per your need.

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email nevobusiness@gmail.com instead of using the issue tracker.

## Credits

-   [Piotr WebX Paluszkievvicz](https://github.com/webxscripts)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Thanks to

-   [Laravel Package Boilerplate](https://laravelpackageboilerplate.com) for the great package boilerplate.
-   [Spatie](https://spatie.be/) for some code used in this package.

