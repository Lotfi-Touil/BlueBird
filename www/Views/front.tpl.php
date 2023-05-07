<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Blue bird' ?></title>
    <meta name="description" content="<?= $description ?? 'Découvrez Blue Bird, une plateforme géniale !' ?>">
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <h1>Template Front</h1>

    <?php include $this->view; ?>

    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>