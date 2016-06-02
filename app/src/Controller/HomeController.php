<?php
namespace App\Controller;

use App\Controller;

// use Psr\Http\Message\ServerRequestInterface as Request;
// use Psr\Http\Message\ResponseInterface as Response;

class HomeController extends Controller
{
    public function indexAction($request, $response)
    {
    	$this->logger->info("Home Route");

        return $this->view->render($response, 'home.twig');
    }

    public function welcomeAction($request, $response)
    {
        return $this->view->render($response, 'welcome.twig');
    }
}