<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController extends BaseController {

    public function index(Request $request, Response $response, $args) {

        // Prepare view data
        $data = ['data' => 'test'];
        $response->getBody()->write($this->load->view('test', $data));
        return $response;
    }
}