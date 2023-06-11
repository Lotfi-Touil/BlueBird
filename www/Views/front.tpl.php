<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Blue bird' ?></title>
    <meta name="description" content="<?= $description ?? 'Découvrez Blue Bird, une plateforme géniale !' ?>">
    <!-- Inclusion des assets -->
    <?php $this->partial('assets'); ?>
</head>
<body>
<!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <?= $this->partial('front/topbar', ['firstname' => $firstname]) ?>
    </ul>
    <h1> <?= $firstname ?></h1>
    <!-- Contenu de la page -->
    <div class="container mt-5">
        <?php include $this->view; ?>
    </div>

    <?php $this->partial('front/footer'); ?>

    <?php $this->partial('logout-modal'); ?>

    <!-- Inclusion des scripts -->
    <?php $this->partial('scripts'); ?>
</body>
</html>