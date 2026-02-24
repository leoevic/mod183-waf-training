<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class LoginController extends BaseController {

    /**
     * Login index function
     */
    public function index(Request $request, Response $response, $args) {

        $response->getBody()->write($this->load->view('login/login.php', []));
        return $response;
    }

    public function checkLogin(Request $request, Response $response, $args) {

        // Get request data
        $username = $_POST['username'];
        $password = $_POST['password'];
        return $response;
    }
}