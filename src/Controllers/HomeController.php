<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController extends BaseController {

    public static function index(Request $request, Response $response, $args) {
        $response->getBody()->write("Hello world");
        return $response;
    }
}