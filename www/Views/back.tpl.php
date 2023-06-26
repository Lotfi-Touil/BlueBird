<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?= $title ?? 'Blue bird' ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?= $description ?? 'Découvrez Blue Bird, une plateforme géniale !' ?>">
        <!-- Inclusion des assets -->
        <?php $this->partial('assets'); ?>
    </head>
    <body>

        <!-- Page Wrapper -->
        <div id="wrapper">
            <?php $this->partial('back/sidebar'); ?>

            <?php include $this->view; ?>
        </div>

        <?php $this->partial('logout-modal'); ?>

        <!-- Inclusion des scripts -->
        <?php $this->partial('scripts'); ?>
    </body>
</html>