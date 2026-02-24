<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\System\Loader;
use App\System\Database;

class BaseController {
    protected Loader $load;
    protected Database $db;

    function __construct() {
        $this->load = new Loader();
        $this->db = Database::get();
    }
}