<?php
//Middleware
$app->add($container->get('csrf'));

$app->add(function ($request, $response, $next) {
    $this->view->offsetSet('flash', $this->flash);
    return $next($request, $response);
});

$app->add(new \App\Middleware\OldInputMiddleware($container));
$app->add(new \App\Middleware\ValidationErrorsMiddleware($container));
