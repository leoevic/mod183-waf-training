<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use App\Controllers\PostController;
use App\Controllers\LoginController;
use App\System\Database;
use Dotenv\Dotenv;

require(__DIR__ . "/../vendor/autoload.php");
require(__DIR__ . "/../src/Config/constants.php");

// Prepare env file
$dotenv = Dotenv::createImmutable(GLOBAL_PATH);
$dotenv->load();

// Toggle logs if environment is development
if ($_ENV['ENVIRONMENT'] == 'development') {
    ini_set('display_startup_errors', 'On');
    ini_set('display_errors', 'On');
    error_reporting(-1);
}

// Connect to database
Database::initialize(
    $_ENV['DATABASE_HOST'],
    $_ENV['DATABASE_USER'],
    $_ENV['DATABASE_PASSWORD'],
    $_ENV['DATABASE_SCHEMA']
);

$app = AppFactory::create();
$app->addRoutingMiddleware();

// Routes
$app->get('/', function (Request $request, Response $response, $args) {
    $cont = new PostController();
    return $cont->index($request, $response, $args);
});
$app->get('/login', function (Request $request, Response $response, $args) {
    $cont = new LoginController();
    return $cont->index($request, $response, $args);
});
$app->post('/login', function (Request $request, Response $response, $args) {
    $cont = new LoginController();
    return $cont->checkLogin($request, $response, $args);
});
$app->get('/register', function (Request $request, Response $response, $args) {
    $cont = new LoginController();
    return $cont->register($request, $response, $args);
});
$app->post('/register', function (Request $request, Response $response, $args) {
    $cont = new LoginController();
    return $cont->checkRegister($request, $response, $args);
});
$app->get('/logout', function(Request $request, Response $response, $args) {
    $cont = new LoginController();
    return $cont->logout($request, $response, $args);
});
$app->post('/post/create', function(Request $request, Response $response, $args) {
    $cont = new PostController();
    return $cont->createPost($request, $response, $args);
});

$app->run();