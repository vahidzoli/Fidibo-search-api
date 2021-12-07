
## About Fidibo Search API

Fidibo Search API is a simple API for searching through Fidibo's Book's Bank.
I used This API for developing this simple project:

https://search.fidibo.com

Thanks to[https://fidibo.com/](https://fidibo.com/).

## Installation

in project directory :

First use `docker-compose up -d`,

then use  `cp .env.example .env`,

use `docker-compose exec app bash`,

you are in `/var/www` path now :

use `composer install`,

use `php artisan key:generate`,

use `php artisan migrate`,

at last use `php artisan jwt:secret`