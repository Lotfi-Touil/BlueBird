<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Blue bird' ?></title>
    <meta name="description" content="<?= $description ?? 'Découvrez Blue Bird, une plateforme géniale !' ?>">
    <link rel="stylesheet" href="http://localhost:8081/assets/css/home/style.css">
    <!-- Inclusion des assets -->
    <?php $this->partial('assets'); ?>
</head>
<body>
    <?php $this->partial('front/topbar'); ?>

    <!-- Contenu de la page -->
    <div class="container">
        <?php include $this->view; ?>
    </div>

    <?php $this->partial('front/footer'); ?>

    <?php $this->partial('logout-modal'); ?>

    <!-- Inclusion des scripts -->
    <?php $this->partial('scripts'); ?>
</body>
</html>