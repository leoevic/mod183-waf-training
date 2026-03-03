<?php
namespace App\Models;

use App\System\Database;
use App\System\Authentication;

class BaseModel {
    protected Database $db;
    protected Authentication $auth;

    /**
     * Constructor
     */
    function __construct() {
        $this->db = Database::get();
        $this->auth = Authentication::getInstance();
    }
}