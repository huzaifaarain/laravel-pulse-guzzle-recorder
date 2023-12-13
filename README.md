# Laravel Pulse Guzzle Recorder

[![Latest Version on Packagist](https://img.shields.io/packagist/v/muhammadhuzaifa/laravel-pulse-guzzle-recorder.svg?style=flat-square)](https://packagist.org/packages/muhammadhuzaifa/laravel-pulse-guzzle-recorder)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/huzaifaarain/laravel-pulse-guzzle-recorder/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/huzaifaarain/laravel-pulse-guzzle-recorder/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/huzaifaarain/laravel-pulse-guzzle-recorder/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/huzaifaarain/laravel-pulse-guzzle-recorder/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/muhammadhuzaifa/laravel-pulse-guzzle-recorder.svg?style=flat-square)](https://packagist.org/packages/muhammadhuzaifa/laravel-pulse-guzzle-recorder)

Laravel Pulse Guzzle Recorder provide a custom recorder for intercepting http requests made via guzzlehttp/guzzle php library and log them into the Laravel Pulse Slow Outgoing Requests section.

## Installation

You can install the package via composer:

```bash
composer require muhammadhuzaifa/laravel-pulse-guzzle-recorder
```

## Usage

If you are using Laravel builtin Http facade, then you don't need this package. This package is useful when working with `guzzlehttp/guzzle` using the `Client` class. The `Client` class must be resolved using the service container `app`.

For example, if you are working with `hubspot/api-client` and would like to intercept the requests then you can create a custom `Client` provide it to the HubSpot `Factory` constructor.

```php
$client = app(\GuzzleHttp\Client::class);
$hubspot = \HubSpot\Factory::createWithAccessToken('access-token', $client);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Muhammad Huzaifa](https://github.com/huzaifaarain)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
