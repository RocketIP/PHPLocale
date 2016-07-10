# PHPLocale

[![StyleCI Status](https://styleci.io/repos/63001544/shield)](https://styleci.io/repos/63001544)
[![Build Status](http://travis-ci.org/RocketIP/PHPLocale.png)](http://travis-ci.org/RocketIP/PHPLocale)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)

PHPLocale: Get available locale based on HTTP "Accept-Language" header

## Methods

### getLanguage

```php
<?php
use PHPLocale\HttpAcceptLanguage;

// Force HTTP_ACCEPT_LANGUAGE with values: fr-BE,fr;q=0.8,en-us;q=0.5,en;q=0.4,es;q=0.3
$_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'fr-BE,fr;q=0.8,en-us;q=0.5,en;q=0.4,es;q=0.3';

$acceptLanguages = new HttpAcceptLanguage();
echo $acceptLanguages->getLanguage();
```

The above example will output:

```
fr-BE
```

### getLanguages

```php
<?php
use PHPLocale\HttpAcceptLanguage;

// Force HTTP_ACCEPT_LANGUAGE with values: fr-BE,fr;q=0.8,en-us;q=0.5,en;q=0.4,es;q=0.3
$_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'fr-BE,fr;q=0.8,en-us;q=0.5,en;q=0.4,es;q=0.3';

$acceptLanguages = new HttpAcceptLanguage();
print_r($acceptLanguages->getLanguages());
```

The above example will output:

```
Array
(
    [0] => fr-BE
    [1] => fr
    [2] => en-US
    [3] => en
    [4] => es
)
```

### getRawLanguages

```php
<?php
use PHPLocale\HttpAcceptLanguage;

// Force HTTP_ACCEPT_LANGUAGE with values: fr-BE,fr;q=0.8,en-us;q=0.5,en;q=0.4,es;q=0.3
$_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'fr-BE,fr;q=0.8,en-us;q=0.5,en;q=0.4,es;q=0.3';

$acceptLanguages = new HttpAcceptLanguage();
print_r($acceptLanguages->getRawLanguages());
```

The above example will output:

```
Array
(
    [0] => Array
        (
            [ISO639-1] => fr
            [ISO3166-1] => BE
            [RFC1766] => fr-BE
            [q] => 1
        )

    [1] => Array
        (
            [ISO639-1] => fr
            [q] => 0.8
        )

    [2] => Array
        (
            [ISO639-1] => en
            [ISO3166-1] => US
            [RFC1766] => en-US
            [q] => 0.5
        )

    [3] => Array
        (
            [ISO639-1] => en
            [q] => 0.4
        )

    [4] => Array
        (
            [ISO639-1] => es
            [q] => 0.3
        )

)
```

# Requirements

PHP 5 (>= 5.4.0)

# Coding Style

PHPLocale follows the PSR-2 coding standard and the PSR-4 autoloading standard.

## PHPDoc

Below is an example of a valid PHPLocale documentation block. Note that the @param attribute is followed by two spaces, the argument type, two more spaces, and finally the variable name:

```php
/**
 * Parse a language and return language like: 'fr' or 'fr-BE'.
 *
 * @param  array  $language
 *
 * @return string
 */
public function parseLanguage($language)
{
    //
}
```

## StyleCI

If your code style isn't perfect, don't worry! StyleCI will automatically merge any style fixes into the PHPLocale repository after any pull requests are merged. This allows us to focus on the content of the contribution and not the code style.

# Contributing

Thank you for considering contributing to PHPLocale
* To report an issue or a feature request use: [GitHub Issues](https://github.com/RocketIP/PHPLocale/issues).
* To make a [Pull Request](https://github.com/RocketIP/PHPLocale/pulls): check if the same pull request exist, fork this project, create a new branch for each issue or feature.

# License

PHPLocale is open-sourced software licensed under the MIT license.
