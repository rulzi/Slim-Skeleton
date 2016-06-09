<?php

use Slim\Handlers\Error as SlimError;

$container = $app->getContainer();

//Error Handle
$container['errorHandler'] = function ($c) {
    if ($c->get('settings')['mode'] !== 'development') {
        return function ($request, $response, $exception) use ($c) {
            return $c->get('view')->render('errors/500', [
                'message' => $exception->getMessage()
            ])->withStatus(500);
        };
    }
    return new SlimError(true);
};

$container['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        return $c->view->render($response, 'errors/404.twig')->withStatus(404);;
    };
};

//Logger
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], Monolog\Logger::DEBUG));
    return $logger;
};

//Csrf Guards
$container['csrf'] = function ($c) {
    $guard = new \Slim\Csrf\Guard();
    $guard->setFailureCallable(function ($request, $response, $next) {
        $request = $request->withAttribute("csrf_status", false);
        return $next($request, $response);
    });
    return $guard;
};

//Twig View
$container['view'] = function ($c) {
    $settings = $c->get('settings')['view'];
    $view = new \Slim\Views\Twig($settings['path'], [
        'cache' => false,
        'debug' => true,
    ]);
    $view->addExtension(new Twig_Extension_Debug());
    $view->addExtension(new \Slim\Views\TwigExtension(
        $c['router'],
        $c['request']->getUri()
    ));

    $asset = new Twig_SimpleFunction('asset', function ($path) use ($c) {
        return $c['request']->getUri()->getBaseUrl().'/'.$path;
    });

    $view->getEnvironment()->addFunction($asset);

    return $view;
};

//validator
$container['validator'] = function ($c) {
    $request = $c->get('request')->getParsedBody();
    return new Valitron\Validator($request);
};

//Flash
$container['flash'] = function () {
    return new \Slim\Flash\Messages();
};

//Auth
$container['auth'] = function ($c) {
    return new App\Auth\Auth();
};
