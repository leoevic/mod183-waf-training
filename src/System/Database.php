<?php
namespace App\System;

class Database {

    private static $instance;
    private $connection;

    /**
     * Constructor
     */
    private function __construct($host, $user, $password, $database) {
        $this->connection = new \mysqli($host, $user, $password, $database);
        if ($this->connection->connect_error) {
            throw new \Exception($this->connection->connect_error);
        }
    }

    /**
     * Initialize db
     */
    public static function initialize($host, $user, $password, $database) {
        if (Database::$instance == null) {
            Database::$instance = new Database($host, $user, $password, $database);
        }
        return Database::$instance;
    }

    /**
     * Get database instance
     */
    public static function get() {
        if (Database::$instance == null) {
            throw new \Exception("Database cannot be used before initialization");
        }
        return Database::$instance;
    }

    /**
     * Do a database query
     */
    public function query($query) {
        $result = $this->connection->query($query);
        if (!$result) {
            return FALSE;
        }

        // Get data
        if (isset($result->num_rows)) {
            if ($result->num_rows == 0) {
                return [];
            }
            else {
                $rows = [];
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }
                return $rows;
            }
        }

        // All ok
        return TRUE;
    }

    /**
     * Insert data into db
     */
    public function insert($table, $data) {
        // Start building query
        $query = "INSERT INTO $table (";

        // Columns
        $columns = array_keys($data);
        $columns = implode(", ", $columns);
        $query .= $columns . ') VALUES ("';

        // Values
        $values = implode('", "', $data);
        $query .= $values . '");';

        // Insert data
        return $this->query($query);
    }
}