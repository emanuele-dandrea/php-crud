<?php
class Category {
    private PDO $conn;
    private string $table = "categories";

    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    public function read(): PDOStatement {
        $stmt = $this->conn->prepare("SELECT id, name FROM {$this->table} ORDER BY name");
        $stmt->execute();
        return $stmt;
    }
}
