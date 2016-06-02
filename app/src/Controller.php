<?php
namespace App;

use Slim\Container;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

abstract class Controller
{
    use ContainerAware;
    /**
     * Create Controller\Base instance
     *
     * @param Container $container
     */

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function validate(){
        if($this->validator->validate()) {
            return true;
        }

        $_SESSION['errors'] = $this->validator->errors();

        return false;
    }
}
