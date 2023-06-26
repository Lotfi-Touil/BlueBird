<div class="card w-75 mx-auto mb-3">
    <div class="container my-5 w-100 ">
        <div class="w-100">
            <h4 class="mb-4 text-center">Nous Contacter</h4>
            <form action="message/home/store" method="POST">
                <div class="form-group">
                    <label for="object">Object</label>
                    <input type="text" id="object" name="object" class="form-control" value="<?= $old['object'] ?? '' ?>">
                    <?php if (isset($errors['object'])) : ?>
                        <?php foreach ($errors['object'] as $error) : ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" class="form-control"><?= $old['message'] ?? '' ?></textarea>
                    <?php if (isset($errors['message'])) : ?>
                        <?php foreach ($errors['message'] as $error) : ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="firstname">Firstname</label>
                    <input type="text" id="firstname" name="firstname" class="form-control" value="<?= $old['firstname'] ?? '' ?>">
                    <?php if (isset($errors['firstname'])) : ?>
                        <?php foreach ($errors['firstname'] as $error) : ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <input type="text" id="lastname" name="lastname" class="form-control" value="<?= $old['lastname'] ?? '' ?>">
                    <?php if (isset($errors['lastname'])) : ?>
                        <?php foreach ($errors['lastname'] as $error) : ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" class="form-control" value="<?= $old['email'] ?? '' ?>">
                    <?php if (isset($errors['email'])) : ?>
                        <?php foreach ($errors['email'] as $error) : ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="id_categorie_message">Catégorie</label>
                    <select id="id_categorie_message" name="id_categorie_message" class="form-control">
                        <?php foreach ($categories as $categorie) : ?>
                            <option value="<?= $categorie->id ?>">
                                <?= $categorie->id ?> - <?= $categorie->description ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($errors['id_categorie_message'])) : ?>
                        <?php foreach ($errors['id_categorie_message'] as $error) : ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary float-right">Enregistrer</button>
            </form>
        </div>
    </div>
</div>