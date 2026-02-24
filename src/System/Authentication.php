<?php
namespace App\System;

use App\System\Session;
use App\System\Database;

class Authentication {

    private static $instance;
    private $authentication;

    /**
     * Constructor
     */
    private function __construct() {

    }

    /**
     * Get Authentication instance
     */
    public static function getInstance() {
        if (Authentication::$instance == null) {
            Authentication::$instance = new Authentication();
        }
        return Authentication::$instance;
    }

    /**
     * Login user
     */
    public function login($username, $password) {
        // First, get user from db
        $sql = "SELECT * FROM users WHERE username = '$username';";
        $data = Database::get()->query($sql);

        // Check if data exists
        if (count($data) != 1) return FALSE;
        $user = array_shift($data);

        // Check if password is correct
        if ($password == $user['password']) {
            Session::getInstance()->set('user', $user);
            return TRUE;
        }

        return FALSE;
    }
}