<form method="<?= $config["config"]["method"] ?>"
      action="<?= $config["config"]["action"] ?>"
      enctype="<?= $config["config"]["enctype"] ?>"
      id="<?= $config["config"]["id"] ?>"
      class="<?= $config["config"]["class"] ?>">

    <?php foreach ($config["inputs"] as $name=>$configInput): ?>
        <label for="<?= $configInput["id"] ?>"><?= $configInput["label"] ?></label>

        <?php if($configInput["attribut"] == 'input') : ?>
            <input
                name="<?= $name ?>"
                placeholder="<?= $configInput["placeholder"] ?>"
                class="<?= $configInput["class"] ?>"
                id="<?= $configInput["id"] ?>"
                type="<?= $configInput["type"] ?>"
                <?= $configInput["required"] ? "required" : "" ?>
                <?= $configInput["readonly"] ? "readonly" : "" ?>
            >
        <?php elseif ($configInput["attribut"] == 'textarea'): ?>
            <textarea
                name="<?= $name ?>"
                placeholder="<?= $configInput["placeholder"] ?>"
                class="<?= $configInput["class"] ?>"
                id="<?= $configInput["id"] ?>"
                type="<?= $configInput["type"] ?>"
                <?= $configInput["required"] ? "required" : "" ?>
                <?= $configInput["readonly"] ? "readonly" : "" ?>
            ></textarea>
        <?php elseif ($configInput['attribut'] == 'select') :?>
            <select <?= $configInput["select"] == 'multiple' ? 'multiple' : '' ?> id="<?= $configInput["id"]?>" class="<?= $configInput["class"] ?>">
                <?php foreach ($configInput["options"] as $key => $value) : ?>
                    <option value="<?= $key ?>">
                        <?= $value ?>
                    </option>
                <?php endforeach; ?>
            </select>
        <?php endif ; ?>
        <br>
    <?php endforeach;?>
    <!-- Errors -->
    <?php foreach ($errors as $error): ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <?php endforeach;?>
    <!-- End Errors -->
    <br>

    <?php if ($config["config"]["disabled"] != 'disabled') : ?>
        <input type="<?= $config["config"]["type"] ?>" 
            class="btn btn-primary btn-user btn-block"
            name="<?= $config["config"]["name"] ?>" 
            value="<?= $config["config"]["submit"] ?>"
            <?= $config["config"]["disabled"] ? "disabled" : "" ?>
        >
    <?php endif;?>

</form>