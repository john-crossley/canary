<?php

$loader = require __DIR__ . '/../vendor/autoload.php';
$loader->register();

use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

$app = new Canary\Foundation\Canary();

$app->map('/', function () {
    return "Hello world!";
});

$app->map('/hello/{name}', function ($name) {
    return "Hello {$name}";
});


$response = $app->handle($request);
$response->send();
