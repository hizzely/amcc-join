<?php
namespace App\Middlewares;

use Psr\Container\ContainerInterface;

/**
*
*/
class BaseMiddleware
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
}
