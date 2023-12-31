<?php

namespace App\Routing;

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class Routes
{
    public static function getRoutes(): RouteCollection
    {
        $routes = new RouteCollection();

        $routes->add('about', new Route('/about/{name}', [
            '_controller' => 'App\\Controller\\AboutController::index',
        ]));

        return $routes;
    }
}
