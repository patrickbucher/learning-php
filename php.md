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

# Links

- Coding Standards and Best Practices
    - [Standard PHP Skeleton](https://github.com/php-pds/skeleton/)
    - [PSR-1: Basic Coding Standard](https://www.php-fig.org/psr/psr-1/)
    - [PSR-12: Extended Coding Style](https://www.php-fig.org/psr/psr-12/)
    - [PSR-4: Autoloader](https://www.php-fig.org/psr/psr-4/)
    - [Clean Code PHP](https://github.com/jupeter/clean-code-php)
- Packaging
    - [Composer](https://getcomposer.org/)
    - [Packagist](https://packagist.org/)
- Documentation
    - [PHP Standard Library](https://www.php.net/book.spl)
