<?php
namespace App\System;
use App\System\Authentication;

class Loader {

    private Authentication $auth;

    public function __construct() {
        $this->auth = Authentication::getInstance();
    }

    /**
     * Load view
     */
    public function view($name, $args = []) {
        $content = $this->basic_view($name, $args);
        ob_clean();
        ob_start();
        require_once GLOBAL_PATH . "/src/templates/default.php";
        return ob_get_clean();
    }

    /**
     * Load view
     */
    public function basic_view($name, $args = []) {
        if (!is_array($args)) {
            return '';
        }

        // Prepare args
        extract($args);

        // Load default view
        ob_start();
        require VIEW_PATH . "/" . $name;
        return ob_get_clean();
    }
}