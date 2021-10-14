# ekWateur-test-symfony

It's a project in order to check the promo code validity. 

## Test pass
[![Symfony](https://github.com/y4nn0ff/ekWateur-test-symfony/actions/workflows/symfony.yml/badge.svg)](https://github.com/y4nn0ff/ekWateur-test-symfony/actions/workflows/symfony.yml)

## Requirements
* php >= 7.4
* composer 

## Installation
Clone the project

```
git clone git@github.com:y4nn0ff/ekWateur-test-symfony.git
```

Move inside the project 
```
cd ekWateur-test-symfony
```

Launch composer install

```
composer install
```

## How to use it 
This project contains the folling commande : `bin/console promo-code:validate`, here how to use it : 
```
Usage:
  promo-code:validate <promo_code>

Arguments:
  promo_code            The code to check
```

The command will output those kinds of messages : 
* The promo_code is valid
* The promo_code is expired
* The promo_code is not available into an offer
* An issue has raised during the check (see the log)

## Testing 
here the command :
```
php ./vendor/bin/phpunit
```

