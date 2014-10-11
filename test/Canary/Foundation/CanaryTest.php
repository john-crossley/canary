<?php

use Canary\Foundation\Canary;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Request;

class CanaryTest extends \PHPUnit_Framework_TestCase
{
    private $app;

    public function setUp()
    {
        $this->app = new Canary;
        $this->client = new Client();
    }

    public function testItCanMapIndexRoute()
    {
        $this->app->map('/', function () {
            return 'Hello Canary!';
        });

        $response = $this->app->handle(Request::createFromGlobals());

        $this->assertEquals(
            'Hello Canary!',
            $response->getContent()
        );
    }
}
