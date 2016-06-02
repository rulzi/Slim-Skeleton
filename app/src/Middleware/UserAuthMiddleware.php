<?php

namespace App\Middleware;

class UserAuthMiddleware extends Middleware
{
    
    function __invoke($request, $response, $next)
    {
        if($this->container->auth->check()){
            $this->container->view->getEnvironment()->addGlobal(
                'getUser', 
                $this->container->auth->getUser()
            );
            $this->container->view->getEnvironment()->addGlobal(
                'checkUser', 
                $this->container->auth->check()
            );
        } else {
            return $response->withRedirect($this->container->router->pathFor('loginPage'));
        }

        $response = $next($request, $response);

        return $response;
    }
}