<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Product.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: ../');
    exit;
}

$product = new Product($conn);
$product->delete($id);

header('Location: ../?deleted=1');
exit;
