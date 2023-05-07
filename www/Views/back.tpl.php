<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Blue bird' ?></title>
    <meta name="description" content="Ceci est ma super page">
</head>
<body>
    <h1>Template Back</h1>

    <?php include $this->view; ?>

</body>
</html>