# PHPLocale

[![Build Status](http://travis-ci.org/RocketIP/PHPLocale.png)](http://travis-ci.org/RocketIP/PHPLocale)

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
