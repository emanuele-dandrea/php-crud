<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Product.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(404);
    include __DIR__ . '/../404.html';
    exit;
}

$id          = (int) ($_POST['id'] ?? 0);
$name        = trim($_POST['name'] ?? '');
$description = trim($_POST['description'] ?? '');
$price       = (float) ($_POST['price'] ?? 0);
$category_id = (int) ($_POST['category_id'] ?? 0);

if ($id <= 0 || empty($name) || empty($description) || $price <= 0 || $price > 999999.99 || $category_id <= 0) {
    header('Location: ../');
    exit;
}

$database = new Database();
$conn     = $database->getConnection();
$product  = new Product($conn);

$product->update($id, $name, $description, $price, $category_id);

header('Location: ../?edited=1');
exit;
