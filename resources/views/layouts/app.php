<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Tienda' ?></title>
    <link rel="stylesheet" href="<?= BASE_URL . '/css/app.css'; ?>">
</head>
<body>

    <?php require __DIR__ . '/partials/header.php'; ?>

    <main>
        <?= $content ?? '' ?>
    </main>

    <?php require __DIR__ . '/partials/footer.php'; ?>

</body>
</html>
