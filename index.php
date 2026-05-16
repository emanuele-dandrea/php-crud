<?php
define('INCLUDED', true);

require_once __DIR__ . '/config/Database.php';
require_once __DIR__ . '/models/Product.php';
require_once __DIR__ . '/models/Category.php';

$database = new Database();
$conn = $database->getConnection();

$product  = new Product($conn);
$products = $product->read()->fetchAll();

$category   = new Category($conn);
$categories = $category->read()->fetchAll();
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dummy CRUD</title>

        <link rel="stylesheet" href="main.css">

        <!-- Bootstrap icons -->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        >

        <script>
            // Theme adapt to system
            function setTheme(isDark) {
                document.documentElement.dataset.bsTheme = isDark ? 'dark' : 'light';
            }

            const isDark = window.matchMedia('(prefers-color-scheme: dark)');
            isDark.addEventListener('change', (e) => setTheme(e.matches));
            setTheme(isDark.matches);

        </script>

        <!-- Bootstrap CSS minified -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        >
    </head>

    <body>
        <?php include __DIR__ . '/includes/header.php'; ?>

        <main>
            <div class="width">
                <?php include __DIR__ . '/includes/table.php' ?>
            </div>
        </main>

        <?php

        include __DIR__ . '/includes/modals/modal_create.php';
        include __DIR__ . '/includes/modals/modal_edit.php';

        include __DIR__ . '/includes/footer.php';
        ?>
       
        <!-- Bootstrap JS minified -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        >       
        </script>
        
        <?php include __DIR__ . '/includes/toasts.php' ?>

        <script>
            document.getElementById('editProduct').addEventListener('show.bs.modal', e => {
                const btn = e.relatedTarget;
                document.getElementById('edit_id').value          = btn.dataset.id;
                document.getElementById('edit_name').value        = btn.dataset.name;
                document.getElementById('edit_description').value = btn.dataset.description;
                document.getElementById('edit_price').value       = btn.dataset.price;
                document.getElementById('edit_category').value    = btn.dataset.category;
            });
        
            // Form validation
            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', e => {
                    if (!form.checkValidity()) {
                        e.preventDefault();
                        e.stopPropagation();
                    }                                               
                    form.classList.add('was-validated');
                });
            });
           
            // Popper tooltips
            const tooltipTriggerList = document.querySelectorAll('[title]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
        </script>
    </body>
</html>
