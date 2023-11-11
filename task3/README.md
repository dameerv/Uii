## Start

```
docker-compose up -d
docker-compose exec app bash
    composer install
    bin/console doctrine:database:create
    bin/console doctrine:migrations:migrate
```
The application is now ready for use

```
http://localhost/orders
```