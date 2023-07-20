<div class="card w-100 mb-3">
    <div class="card-header d-flex">
        <h4 class="card-title">Nouvelle Page</h4>
        <a href="/admin/user/list" class="btn btn-primary ml-auto">
            <span class="icon text-white-50">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">Revenir à la liste</span>
        </a>
    </div>
    <div class="container mt-5">
        <div class="w-75">
            <form action="/admin/page/store" method="post" enctype="multipart/form-data">
                <!-- Section En-tête (Masthead) -->
                <div class="form-group">
                    <label for="title">Titre En-tête</label>
                    <input type="text" name="title" id="title" class="form-control" value="<?= $old['title'] ?? '' ?>" required>
                    <?php if(isset($errors['title'])): ?>
                        <?php foreach($errors['title'] as $error): ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="subtitle">Sous-titre En-tête</label>
                    <input type="text" name="subtitle" id="subtitle" class="form-control" value="<?= $old['subtitle'] ?? '' ?>" required>
                    <?php if(isset($errors['subtitle'])): ?>
                        <?php foreach($errors['subtitle'] as $error): ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- Section À Propos (About) -->
                <div class="form-group">
                    <label for="about_title">Titre À Propos</label>
                    <input type="text" name="about_title" id="about_title" class="form-control" value="<?= $old['about_title'] ?? '' ?>" required>
                    <?php if(isset($errors['about_title'])): ?>
                        <?php foreach($errors['about_title'] as $error): ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="about_desc">Description À Propos</label>
                    <textarea name="about_desc" id="about_desc" class="form-control" required><?= $old['about_desc'] ?? '' ?></textarea>
                    <?php if(isset($errors['about_desc'])): ?>
                        <?php foreach($errors['about_desc'] as $error): ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="about_img">Image À Propos</label>
                    <input type="file" name="about_img" id="about_img" class="form-control-file">
                    <?php if(isset($errors['about_img'])): ?>
                        <?php foreach($errors['about_img'] as $error): ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- Section Bloc Principal (Main Bloc) -->
                <div class="form-group">
                    <label for="main_bloc_title">Titre Bloc Principal</label>
                    <input type="text" name="main_bloc_title" id="main_bloc_title" class="form-control" value="<?= $old['main_bloc_title'] ?? '' ?>" required>
                    <?php if(isset($errors['main_bloc_title'])): ?>
                        <?php foreach($errors['main_bloc_title'] as $error): ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="main_bloc_desc">Description Bloc Principal</label>
                    <textarea name="main_bloc_desc" id="main_bloc_desc" class="form-control" required><?= $old['main_bloc_desc'] ?? '' ?></textarea>
                    <?php if(isset($errors['main_bloc_desc'])): ?>
                        <?php foreach($errors['main_bloc_desc'] as $error): ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="main_bloc_img">Image Bloc Principal</label>
                    <input type="file" name="main_bloc_img" id="main_bloc_img" class="form-control-file">
                    <?php if(isset($errors['main_bloc_img'])): ?>
                        <?php foreach($errors['main_bloc_img'] as $error): ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- Section Bloc Un (Bloc One) -->
                <div class="form-group">
                    <label for="bloc_one_title">Titre Bloc Un</label>
                    <input type="text" name="bloc_one_title" id="bloc_one_title" class="form-control" value="<?= $old['bloc_one_title'] ?? '' ?>" required>
                    <?php if(isset($errors['bloc_one_title'])): ?>
                        <?php foreach($errors['bloc_one_title'] as $error): ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="bloc_one_desc">Description Bloc Un</label>
                    <textarea name="bloc_one_desc" id="bloc_one_desc" class="form-control" required><?= $old['bloc_one_desc'] ?? '' ?></textarea>
                    <?php if(isset($errors['bloc_one_desc'])): ?>
                        <?php foreach($errors['bloc_one_desc'] as $error): ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="bloc_one_img">Image Bloc Un</label>
                    <input type="file" name="bloc_one_img" id="bloc_one_img" class="form-control-file">
                    <?php if(isset($errors['bloc_one_img'])): ?>
                        <?php foreach($errors['bloc_one_img'] as $error): ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- Section Bloc Deux (Bloc Two) -->
                <div class="form-group">
                    <label for="bloc_two_title">Titre Bloc Deux</label>
                    <input type="text" name="bloc_two_title" id="bloc_two_title" class="form-control" value="<?= $old['bloc_two_title'] ?? '' ?>" required>
                    <?php if(isset($errors['bloc_two_title'])): ?>
                        <?php foreach($errors['bloc_two_title'] as $error): ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="bloc_two_desc">Description Bloc Deux</label>
                    <textarea name="bloc_two_desc" id="bloc_two_desc" class="form-control" required><?= $old['bloc_two_desc'] ?? '' ?></textarea>
                    <?php if(isset($errors['bloc_two_desc'])): ?>
                        <?php foreach($errors['bloc_two_desc'] as $error): ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="bloc_two_img">Image Bloc Deux</label>
                    <input type="file" name="bloc_two_img" id="bloc_two_img" class="form-control-file">
                    <?php if(isset($errors['bloc_two_img'])): ?>
                        <?php foreach($errors['bloc_two_img'] as $error): ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- Section Contact -->
                <div class="form-group">
                    <label for="address">Adresse</label>
                    <input type="text" name="address" id="address" class="form-control" value="<?= $old['address'] ?? '' ?>" required>
                    <?php if(isset($errors['address'])): ?>
                        <?php foreach($errors['address'] as $error): ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= $old['email'] ?? '' ?>" required>
                    <?php if(isset($errors['email'])): ?>
                        <?php foreach($errors['email'] as $error): ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="phone">Téléphone</label>
                    <input type="tel" name="phone" id="phone" class="form-control" value="<?= $old['phone'] ?? '' ?>" required>
                    <?php if(isset($errors['phone'])): ?>
                        <?php foreach($errors['phone'] as $error): ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn btn-primary">Créer la Page</button>
            </form>
        </div>
    </div>
</div>
