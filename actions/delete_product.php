<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Product.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    include __DIR__ . '/../status-codes/401.html';
    exit;
}

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    http_response_code(404);
    include __DIR__ . '/../status-codes/404.html';
    exit;
}

$database = new Database();
$conn = $database->getConnection();
$product = new Product($conn);

$product->delete($id);

header('Location: ../?deleted=1');
exit;
