<?php
class Database {
    private $host = "localhost";
    private $db_name = "taskmanager";
    private $username = "root";
    private $password = "";

    public $conn;

    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
        } catch(PDOException $e) {
            echo "Errore: " . $e->getMessage();
        }

        return $this->conn;
    }
}
?>