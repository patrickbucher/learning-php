---
title: PHP
subtitle: Personal Notes
author: Patrick Bucher
---

# Setup and Tools

On Arch Linux:

    # pacman -S php composer

    $ php --version
    PHP 8.0.8 (cli) (built: Jun 29 2021 16:09:21) ( NTS )
    Copyright (c) The PHP Group
    Zend Engine v4.0.8, Copyright (c) Zend Technologies

    $ compose --version
    Composer version 2.1.3 2021-06-09 16:31:20

## PHP Command Line Interface

Run a local server:

    $ php -S localhost:8000

Show `phpinfo()` equivalent for the CLI:

    $ php -i
    phpinfo()
    PHP Version => 8.0.8
    ...

Run an interactive shell:

    $ php -a

Output arguments:

```php
<?php

$i = 0;
while ($i < $argc) {
    echo("Argument " . $i . " is " . $argv[$i] . PHP_EOL);
    $i++;
}

exit(0);
```

    $ php hello.php This is a test.
    Argument 0 is hello.php
    Argument 1 is This
    Argument 2 is is
    Argument 3 is a
    Argument 4 is test.
    $ echo $?
    0

## Helpful Development Tools

Install PHPUnit:

    $ composer require --dev phpunit/phpunit

Install and run PHP Code Sniffer:

    $ composer require --dev squizlabs/php_codesniffer
    $ vendor/bin/phpcs --standard=PSR1 hello.php   # Code Sniffer
    $ vendor/bin/phpcbf --standard=PSR1 hello.php  # Beautifier and Fixer

Install and run PHP Coding Standards Fixer:

    $ compser require --dev friendsofphp/php-cs-fixer
    $ vendor/bin/php-cs-fixer fix --rules=@PSR1 hello.php

Use dependencies installed with composer in PHP code:

```php
<?php
require 'vendor/autoload.php'
```

Install current dependencies from `composer.lock`:

    $ composer install

Update dependencies in `coposer.lock`:

    $ composer update

Use with `global` parameter to manage packages globally for the current user
(`~/composer`).

# Date and Time

Parse and format dates:

```php
$eu_date = '24.06.1987';
$date = DateTime::createFromFormat('d.m.Y', $eu_date);
$us_date = $date->format('Y-m-d');
echo($us_date . PHP_EOL);
```

Deal with date differences:

```php
<?php

$start = DateTime::createFromFormat('Y-m-d', '1970-01-01');
$later = clone $start;

// add a Period (P) of 12 years (12Y), 5 months (5M) and 3 days (3D)
$later->add(new DateInterval('P12Y5M3D')); // changes date in-place!
echo($later->format('Y-m-d') . PHP_EOL);

$diff = $later->diff($start);
echo($diff->format('is %y years, %m months, %d days (total: %a days) later') . PHP_EOL);

if ($later > $start) {
    echo($later->format('Y-m-d') . ' is later than ' . $start->format('Y-m-d'));
}
```

Iterate over dates by an interval:

```php
<?php

$start = DateTime::createFromFormat('Y-m-d', '2020-01-01');
$later = DateTime::createFromFormat('Y-m-d', '2020-02-01');
$periodInterval = DateInterval::createFromDateString('first thursday');
$periodIterator = new DatePeriod($start, $periodInterval, $later, DatePeriod::EXCLUDE_START_DATE);
foreach ($periodIterator as $date) {
    echo($date->format('Y-m-d') . PHP_EOL);
}
```

# Unicode

- Use `mb_`-prefixed counterpart of string functions when dealing with unicode:
  `mb_strpos()` instead of `strpos()`, `mb_strlen()` instead of `strlen()`.
  (`mb` stands for "multi-byte", see [Multibyte String
  Functions](https://www.php.net/ref.mbstring)).
- Call the `mb_internal_encoding()` at the top of every script (or in the global
  include script, respectively) and the `mb_http_output()` function right after
  that if outputting to a browser.
- If a function has an optional encoding parameter, pass `'UTF-8'` as an
  argument.
- Use the `utf8mb4` character set, (_not_ just `utf8`) in the PDO connection
  string when dealing with MySQL databases.
- Call `header('Content-Type: text/html; charset=UTF-8');` to tell the browser
  about UTF-8 encoding to be expected.

  Continue here: `https://phptherightway.com/#i18n_l10n`

# Links

- Coding Standards and Best Practices
    - [Standard PHP Skeleton](https://github.com/php-pds/skeleton/)
    - [PSR-1: Basic Coding Standard](https://www.php-fig.org/psr/psr-1/)
    - [PSR-12: Extended Coding Style](https://www.php-fig.org/psr/psr-12/)
    - [PSR-4: Autoloader](https://www.php-fig.org/psr/psr-4/)
    - [Clean Code PHP](https://github.com/jupeter/clean-code-php)
    - [Design Patterns](https://designpatternsphp.readthedocs.io/en/latest/README.html)
- Packaging
    - [Composer](https://getcomposer.org/)
    - [Packagist](https://packagist.org/)
- Documentation
    - [PHP Standard Library](https://www.php.net/book.spl)
