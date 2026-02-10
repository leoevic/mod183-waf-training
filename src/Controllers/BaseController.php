<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\System\Loader;

class BaseController {
    protected Loader $load;

    function __construct() {
        $this->load = new Loader();
    }
}