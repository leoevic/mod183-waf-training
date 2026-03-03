<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\System\Authentication;
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

    /**
     * Check login
     */
    public function checkLogin(Request $request, Response $response, $args) {

        // Get request data
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Login user
        $status = $this->auth->login($username, $password);
        if ($status) {
            $_SESSION['message'] = 'Sie wurden erfolgreich angemeldet.';
            $response = $response->withStatus(303);
            $response = $response->withHeader('Location', '/');
        }
        else {
            $_SESSION['message'] = 'Bei der Anmeldung ist ein Fehler aufgetreten.';
            $response = $response->withStatus(303);
            $response = $response->withHeader('Location', '/login');
        }

        return $response;
    }

    /**
     * Register index function
     */
    public function register(Request $request, Response $response, $args) {

        $response->getBody()->write($this->load->view('login/register.php', []));
        return $response;
    }

    /**
     * Check registration function
     */
    public function checkRegister(Request $request, Response $response, $args) {

        // Get request data
        $username = $_POST['username'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        // Register user
        $status = $this->auth->register($username, $email, $password, $name);

        // Check status
        if ($status) {
            $_SESSION['message'] = 'Sie haben sich erfolgreich registriert.';
            $response = $response->withStatus(303);
            $response = $response->withHeader('Location', '/');
        }
        else {
            $_SESSION['message'] = 'Die Registrierung ist leider fehlgeschlagen.';
            $response = $response->withStatus(303);
            $response = $response->withHeader('Locaiton', '/register');
        }

        return $response;
    }

    /**
     * Logout user
     */
    public function logout(Request $request, Response $response, $args) {
        $this->auth->logout();
        $_SESSION['message'] = 'Sie haben sich erfolgreich abgemeldet.';
        $response = $response->withStatus(303);
        $response = $response->withHeader('Location', '/');

        return $response;
    }
}