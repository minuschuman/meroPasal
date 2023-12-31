<?php

namespace App\Tests\Unit;

use App\Controller\AboutController;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AboutControllerTest extends TestCase
{
    public function testIndex()
    {
        $controller = new AboutController();

        $request = new Request([], [], [], [], [], [], [], json_encode(['name' => 'John']));

        $response = $controller->index($request);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals('Hello, John!', $response->getContent());
    }
}
