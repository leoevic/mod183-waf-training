<?php
namespace App\System;

class Loader {
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
        ob_clean();
        ob_start();
        require_once VIEW_PATH . "/" . $name;
        return ob_get_clean();
    }
}