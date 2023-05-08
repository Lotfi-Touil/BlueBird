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
    <?php include PARTIALS_PATH.'/front/topbar.partial.php'; ?>

    <!-- Contenu de la page -->
    <div class="container mt-5">
        <?php include $this->view; ?>
    </div>

    <?php include PARTIALS_PATH.'/front/footer.partial.php'; ?>

    <!-- Inclusion des scripts -->
    <?php include PARTIALS_PATH.'/scripts.partial.php'; ?>
</body>
</html>