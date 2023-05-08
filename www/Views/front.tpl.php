<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Blue bird' ?></title>
    <meta name="description" content="<?= $description ?? 'Découvrez Blue Bird, une plateforme géniale !' ?>">
    <!-- Inclusion des assets -->
    <?php include PARTIALS_PATH.'/assets.partial.php'; ?>
</head>
<body>
    <h1>Template Front</h1>

    <?php include $this->view; ?>

    <!-- Inclusion des scripts -->
    <?php include PARTIALS_PATH.'/scripts.partial.php'; ?>
</body>
</html>