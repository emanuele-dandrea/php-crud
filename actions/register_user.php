<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/User.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(404);
    include __DIR__ . '/../status-codes/404.html';
    exit;
}

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if (empty($username) || empty($password)) {
    header('Location: ../register/?error=1');
    exit;
}

$database = new Database();
$conn     = $database->getConnection();
$user     = new User($conn);

if ($user->usernameExists($username)) {
    header('Location: ../register/?error=taken');
    exit;
}

$hashed = password_hash($password, PASSWORD_BCRYPT);
$user->create($username, $hashed);

header('Location: ../login/?registered=1');
exit;
