<?php

if (!defined('INCLUDED')) {
    http_response_code(404);
    include __DIR__ . '/../status-codes/404.html';
    exit();
}
?>

<div class="table-responsive">
    <div class="d-flex justify-content-between align-items-center m-3">
        <p class="text-muted mb-0"><?= count($products) ?> products</p>
        <button
            type="button"
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#createProduct"
            title="Insert product to database"
        >
            <i class="bi bi-database-fill-add"></i> Add product
        </button>
    </div>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Created</th>
                <th>Modified</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $row): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td class="description"><?= htmlspecialchars($row['description']) ?></td>
                <td><?= number_format($row['price'], 2) ?> €</td>
                <td><?= htmlspecialchars($row['category_name']) ?></td>
                <td><?= date($row['created']) ?></td>
                <td><?= date($row['modified']) ?></td>
                <td class="text-center">
                    <button
                        type="button"
                        class="btn btn-sm btn-outline-secondary"
                        data-bs-toggle="modal"
                        data-bs-target="#editProduct"
                        title="Edit this entry"
                        data-id="<?= $row['id'] ?>"
                        data-name="<?= htmlspecialchars($row['name']) ?>"
                        data-description="<?= htmlspecialchars($row['description']) ?>"
                        data-price="<?= $row['price'] ?>"
                        data-category="<?= $row['category_id'] ?>"
                    >
                        <i class="bi bi-pen-fill"></i> Edit
                    </button>
                    <a href="./actions/delete_product.php?id=<?= $row['id'] ?>"
                        onclick="return confirm('Delete this entry?')"
                        class="btn btn-sm btn-outline-danger"
                        title="Delete this entry"
                    >
                        <i class="bi bi-trash-fill"></i>                       
                        Delete
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
