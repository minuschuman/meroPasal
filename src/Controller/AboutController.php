<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class AboutController
{
    public function index($params)
    {
        return new Response("Hello, $params->name!");
    }
}
