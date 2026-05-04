<?php
class Task {
    private $conn;
    private $table = "tasks";

    public $id;
    public $title;
    public $description;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>