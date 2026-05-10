<?php require_once __DIR__ . '/config/Database.php';

$stmt = $conn->prepare("
    SELECT p.id, p.name, p.description, p.price, c.name AS category_name
    FROM products p
    LEFT JOIN categories c ON p.category_id = c.id
    ORDER BY p.created DESC
");

$stmt->execute();
$products = $stmt->fetchAll();


?>
 
<!DOCTYPE html>
<html lang="en">
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

        <?php include __DIR__ . '/includes/footer.php'; ?>

        <!-- Bootstrap JS minified -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        >
        </script>
    </body>
</html>
