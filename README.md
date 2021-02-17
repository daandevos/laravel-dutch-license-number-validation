# Dutch license plate number validation

Using Laravel's validator.

## Requirements

- PHP >= 7.1
- Laravel >= 5.5, 6.0, 7.0 or 8.0

## Installation

Install the package via Composer:

```bash
$ composer require daandevos/laravel-dutch-license-number-validation
```

## Usage

You can use the Dutch license number validation as any other validation rule:

```php
<?php

$request->validate([
    'license_number' => 'required|string|dutch_license_number',
]);
```

Optionally you can change the validation error message by adding an entry to the validation language file:
```php
'dutch_license_number' => 'The Dutch license number format is invalid.',

'uuid' => 'The :attribute must be a valid UUID.',

// ...
```

## Security Vulnerabilities

If you discover a security vulnerability within this package, please send an e-mail to Daan de Vos via [daan@devos.id](mailto:daan@devos.id). All security vulnerabilities will be promptly addressed.

## License

This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).