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

### Installation

1) Create Project
```
$ composer create-project -n -s dev choirulafandi/slim-skeleton my-app
```
2) Init phinx migration and edit migrations config at phinx.yml file
```
$ php vendor/bin/phinx init
```
3) Open .env in project root dan setting your environment
```
$ cp .env.example .env
```
4) chmod folder logs
```
$ sudo chmod -R 777 logs
```
5) use PHP built in server dan pointing to folder public as docroot.
```
$ php -S  localhost:8080 -t public/
```
6) Browse to http://localhost:8080

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
