<?php
namespace App\System;

use App\System\Session;
use App\System\Database;

class Authentication {

    private static $instance;
    private $authentication;
    private $session;
    private $db;

    /**
     * Constructor
     */
    private function __construct() {
        $this->session = Session::getInstance();
        $this->db = Database::get();
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
        $data = $this->db->query($sql);

        // Check if data exists
        if (count($data) != 1) return FALSE;
        $user = array_shift($data);

        // Check if password is correct
        if ($password == $user['password']) {
            $this->session->set('user', $user);
            return TRUE;
        }

        return FALSE;
    }
}