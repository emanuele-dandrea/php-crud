<?php
class User {
    private PDO $conn;
    private string $table = "users";

    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    public function usernameExists(string $username): bool {
        $stmt = $this->conn->prepare("SELECT id FROM {$this->table} WHERE username = :username");
        $stmt->execute([':username' => $username]);
        return $stmt->fetch() !== false;
    }

    public function create(string $username, string $password): bool {
        $stmt = $this->conn->prepare("
            INSERT INTO {$this->table} (username, password)
            VALUES (:username, :password)
        ");
        return $stmt->execute([
            ':username' => $username,
            ':password' => $password,
        ]);
    }

    public function findByUsername(string $username): array|false {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE username = :username");
        $stmt->execute([':username' => $username]);
        return $stmt->fetch();
    }
}
