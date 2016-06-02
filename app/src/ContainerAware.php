<?php
namespace App;

use Slim\Container;

trait ContainerAware
{
    /**
     * Slim\Container instance
     *
     * @var \Slim\Container
     */
    private $container;
    /**
     * Create Controller\Base instance
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }
    /**
     * Get \Slim\Container name
     *
     * @param  string $name Container Name
     * @return mixed
     * @throws \Slim\Exception\ContainerValueNotFoundException
     */
    public function __get($name)
    {
        return $this->container->get($name);
    }

}