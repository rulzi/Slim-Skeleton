# Simple Slim Framework 3 skeleton application

### Requirements

- PHP 5.5.9 or newer.
- HTTP Server, Apache.
- MySQL Server 5.x or newer.

### Using

- [Slim Framework 3](http://www.slimframework.com/)
- [Laravel Database](https://github.com/illuminate/database)
- [Slim Twig View](https://github.com/slimphp/Twig-View)
- [Slim CSRF](https://github.com/slimphp/Slim-Csrf)
- [Slim Flash](https://github.com/slimphp/Slim-Csrf)
- [Monolog](https://github.com/Seldaek/monolog)
- [Robmorgan Phinx Migrations](https://phinx.org/)
- [Vlucas Valitron Validator](https://github.com/vlucas/valitron)
- [Vlucas phpdotenv](https://github.com/vlucas/phpdotenv)

### Instalasi

1) Clone repo
```
$ git clone https://github.com/choirulafandi/Slim-Skeleton [folder-name]
```
2) Masuk ke directory & install dependency

```
$ cd [folder-name] && composer install
```
3) Init phinx migration dan edit migrations config di phinx.yml file
```
$ php vendor/bin/phinx init
```
4) Buat .env di project root dan setting environment mu
```
$ cp .env.example .env
```
5) Gunakan PHP built in server dan arahkan ke folder web sebagai docroot.
```
$ php -S  localhost:8080 -t web/
```
6) Terakhir, buka url sesuai dengan konfigurasi lokal server anda.

### Key Directory

* `app`: Application code
* `app/src`: All class files within the `App` namespace
* `db`: Database migration and seeding
* `logs`: Log files
* `template`: Twig template files
* `public`: Webserver root
* `vendor`: Composer dependencies

### Key files

* `public/index.php`: Entry point to application
* `app/settings.php`: Configuration
* `app/dependencies.php`: Services for Pimple
* `app/middleware.php`: Application middleware
* `app/routes.php`: All application routes are here
* `app/database.php`: Setting database eloquent
