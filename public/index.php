<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use App\Routing\Routes as MyRoutes;

$newRoutes = MyRoutes::getRoutes();

$requestContext = new RequestContext();

$newMatcher = new UrlMatcher($newRoutes, $requestContext);

$request = Request::createFromGlobals();

try {
    $parameters = $newMatcher->matchRequest($request);
    $controller = $parameters['_controller'];

    [$controllerClass, $controllerMethod] = explode('::', $controller);

    $controllerInstance = new $controllerClass();

    $response = $controllerInstance->$controllerMethod(...array_values($parameters));

} catch (\Symfony\Component\Routing\Exception\ResourceNotFoundException $e) {
    $path = $request->getPathInfo();

    if ($path === '/') {
        $path = '/login.php';
    }
    $oldFilePath = __DIR__  . $path;

    if (file_exists($oldFilePath)) {
        include $oldFilePath;
        exit;
    }

    $response = new Response('Page not found', 404);
}

$response->send();
