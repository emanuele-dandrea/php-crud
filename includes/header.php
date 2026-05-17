<?php

if (!defined('INCLUDED')) {
    http_response_code(404);
    include __DIR__ . '/../code-state/404.html';
    exit();
}
?>

<header>
    <div class="width padding d-flex align-items-center space-between justify-content-between">    
        <h1>Dummy CRUD</h1>
        <?php if (isset($_SESSION['user_id'])): ?>
        <a href="/actions/logout.php" class="btn btn-outline-secondary" title="End session">Logout <i class="bi bi-box-arrow-left"></i></a>
        <?php endif; ?>
    </div>
</header>
