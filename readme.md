# ResuME app
## Requirements

* php5.6
* php_mbstring
* php_openssl
* php_pdo_mysql
* hp_pdo_sqlite
* composer

##Running
    php artisan serve

## Running backend unit tests

###windows
    .\vendor\bin\phpunit.bat --debug

###linux
    ./vendor/bin/phpunit --debug

##Dependencies
    composer install

##Migrations
    php artisan migrate
