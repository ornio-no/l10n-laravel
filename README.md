L10N localization app Laravel package
======
**L10N Laravel is a simple package that fetches translations from [L10N localization app](https://l10n.app)**

## Requirements

 * PHP version 7.0 or higher
 * Laravel version 6.0 or higher

## Easy Installation

### Install with composer

To install with [Composer](https://getcomposer.org/), simply require the
latest version of this package.

```bash
composer require ornio/l10n-laravel
```

## Quick Start

First add your unique l10n application token to your .env file:

```php
L10N_TOKEN
```

Optionally you can add L10N_URL if it is different than default one:

```php
L10N_URL
```

\
Publish files:
```bash
php artisan vendor:publish --provider="Ornio\l10n\L10NServiceProvider"
```

\
Add your languages to l10n config file:
```php
    'languages' => [
        'en', 'nb',
    ]
```

\
Finally run the command that fetches translations and saves them to default language directory:
```bash
php artisan l10n:fetch-translations
```
