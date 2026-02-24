<?php
namespace App\System;

class Session {
    private static $instance;

    /**
     * Constructor
     */
    private function __construct() {
        session_start();
    }

    /**
     * Get session instance
     */
    public static function getInstance() {
        if (Session::$instance == null) {
            Session::$instance = new Session();
        }
        return Session::$instance;
    }

    /**
     * Set a session key
     */
    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    /**
     * Get a session key
     */
    public function get($key) {
        return $_SESSION[$key];
    }

    /**
     * Unset a session key
     */
    public function unset($key) {
        unset($_SESSION[$key]);
    }
}