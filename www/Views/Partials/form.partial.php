<form method="<?= $config["config"]["method"] ?>" 
    action="<?= $config["config"]["action"] ?>" 
    enctype="<?= $config["config"]["enctype"] ?>" 
    id="<?= $config["config"]["id"] ?>" 
    class="<?= $config["config"]["class"] ?>"
>
    <?php foreach ($config["inputs"] as $name => $configInput) : ?>
        <?php if ($configInput["tag"] === "select") : ?>
            <select name="<?= $name ?>" 
                class="<?= $configInput["class"] ?>" 
                <?= $configInput["required"] ? "required" : "" ?>
                <?= $configInput["disabled"]  ? "disabled" : "" ?>
            >
                <?php foreach ($configInput["options"] as $value => $label) : ?>
                    <option value="<?= $value ?>" <?= ($configInput["value"] == $value) ? "selected" : "" ?>>
                        <?= $label ?>
                    </option>
                <?php endforeach; ?>
            </select>
        <?php elseif ($configInput["tag"] === "textarea") : ?>
            <textarea name="<?= $name ?>"
                placeholder="<?= $configInput["placeholder"] ?>"
                class="<?= $configInput["class"] ?>" 
                <?= $configInput["required"] ? "required" : "" ?>
                <?= $configInput["disabled"]  ? "disabled" : "" ?>
            >  
                <?= $configInput["value"] ?>
            </textarea>

        <?php else : ?>
            <input name="<?= $name ?>" 
                placeholder="<?= $configInput["placeholder"] ?>" 
                class="<?= $configInput["class"] ?>" 
                id="<?= $configInput["placeholder"] ?>" 
                type="<?= $configInput["type"] ?>" 
                <?= $configInput["required"] ? "required" : "" ?>
                <?= $configInput["disabled"]  ? "disabled" : "" ?>
                value="<?= $configInput["value"] ?>"
            >
        <?php endif; ?>
        <br>
    <?php endforeach; ?>

    <!-- Errors -->
    <?php foreach ($errors as $error) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <?php endforeach; ?>
    <!-- End Errors -->

    <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="<?= $config["config"]["submit"] ?>">
</form>
