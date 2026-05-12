<?php
class Product {
    private PDO $conn;
    private string $table = "products";

    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    public function read(): PDOStatement {
        $stmt = $this->conn->prepare("
            SELECT p.id, p.name, p.category_id, p.description, p.price, p.created, p.modified, c.name AS category_name
            FROM {$this->table} p
            LEFT JOIN categories c ON p.category_id = c.id
            ORDER BY p.created DESC
        ");
        $stmt->execute();
        return $stmt;
    }

    public function create(string $name, string $description, float $price, int $category_id): bool {
        $stmt = $this->conn->prepare("
            INSERT INTO {$this->table} (name, description, price, category_id, created)
            VALUES (:name, :description, :price, :category_id, NOW())
        ");
        return $stmt->execute([
            ':name'        => $name,
            ':description' => $description,
            ':price'       => $price,
            ':category_id' => $category_id,
        ]);
    }

    public function update(int $id, string $name, string $description, float $price, int $category_id): bool {
        $stmt = $this->conn->prepare("
            UPDATE {$this->table}
            SET name = :name, description = :description, price = :price, category_id = :category_id
            WHERE id = :id
        ");
        return $stmt->execute([
            ':id'          => $id,
            ':name'        => $name,
            ':description' => $description,
            ':price'       => $price,
            ':category_id' => $category_id,
        ]);
    }

    public function delete(int $id): bool {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}

$product  = new Product($conn);
$products = $product->read()->fetchAll();
