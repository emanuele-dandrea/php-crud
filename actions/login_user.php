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
    header('Location: ../login/');
    exit;
}

$database = new Database();
$conn     = $database->getConnection();
$user     = new User($conn);

$found = $user->findByUsername($username);

if (!$found || !password_verify($password, $found['password'])) {
    header('Location: ../login/?error=1');
    exit;
}

session_start();
$_SESSION['user_id']  = $found['id'];
$_SESSION['username'] = $found['username'];

header('Location: ../?login=1');
exit;
