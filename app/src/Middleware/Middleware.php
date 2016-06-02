<?php

namespace App\Middleware;

abstract class Middleware
{
    protected $container;
    
    function __construct($container)
    {
        $this->container = $container;
    }
}
