<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Product.php';

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    include __DIR__ . '/../status-codes/401.html';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(404);
    include __DIR__ . '/../status-codes/404.html';
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

header('Location: ../?created=1');
exit;
