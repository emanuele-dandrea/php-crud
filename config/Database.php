<?php
class Database {
    private $host = "mariadb"; // If you're using XAMPP you should use localhost instead of mariadb
    private $db_name = "crud";
    private $username = "root";
    private $password = "pass"; // By default XAMPP does not have a password set
    private $conn = null;
    
    public function getConnection(): PDO {

        if ($this->conn !== null) {
            return $this->conn;
        }

        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4",
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       
                    PDO::ATTR_EMULATE_PREPARES   => false,                  
                ]
            );
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new RuntimeException("Database connection error.");
        }

        return $this->conn;
    }
}

$database = new Database();
$conn = $database->getConnection();
