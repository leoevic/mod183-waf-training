<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\System\Loader;
use App\System\Database;
use App\System\Authentication;

class BaseController {
    protected Loader $load;
    protected Database $db;
    protected Authentication $auth;

    function __construct() {
        $this->load = new Loader();
        $this->db = Database::get();
        $this->auth = Authentication::getInstance();
    }
}