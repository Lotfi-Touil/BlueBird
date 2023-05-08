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

        <!-- Page Wrapper -->
        <div id="wrapper">
            <?php include PARTIALS_PATH.'/back/sidebar.partial.php'; ?>

            <?php include $this->view; ?>
        </div>
        
        <!-- Inclusion des scripts -->
        <?php include PARTIALS_PATH.'/scripts.partial.php'; ?>
    </body>
</html>