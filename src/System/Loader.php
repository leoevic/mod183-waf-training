<?php
namespace App\System;

class Loader {
    /**
     * Load view
     */
    public function view($name, $args = []) {
        if (!is_array($args)) {
            return '';
        }

        // Prepare args
        extract($args);

        // Load default view
        ob_clean();
        ob_start();
        require_once __DIR__ . "/../templates/default.php";
        return ob_get_clean();
    }
}