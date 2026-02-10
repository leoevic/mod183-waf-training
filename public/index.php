<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use App\Controllers\HomeController;

require(__DIR__ . "/../vendor/autoload.php");

$app = AppFactory::create();
$app->addRoutingMiddleware();

// Routes
$app->get('/', function (Request $request, Response $response, $args) {
    $cont = new HomeController();
    return $cont->index($request, $response, $args);
});

$app->run();