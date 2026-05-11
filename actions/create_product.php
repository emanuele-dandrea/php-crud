<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Product.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../');
    exit;
}

$name        = trim($_POST['name'] ?? '');
$description = trim($_POST['description'] ?? '');
$price       = (float) ($_POST['price'] ?? 0);
$category_id = (int) ($_POST['category_id'] ?? 0);

if (empty($name) || empty($description) || $price <= 0 || $category_id <= 0) {
    header('Location: ../');
    exit;
}

$database = new Database();
$conn     = $database->getConnection();
$product  = new Product($conn);

$product->create($name, $description, $price, $category_id);

header('Location: ../');
exit;
