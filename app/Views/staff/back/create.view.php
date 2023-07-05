<div class="card w-100 mb-3">
    <div class="card-header d-flex">
        <h4 class="card-title">Nouveau staff</h4>
        <a href="/admin/staff/list" class="btn btn-primary ml-auto">
            <span class="icon text-white-50">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">Revenir à la liste</span>
        </a>
    </div>
    <div class="container mt-5">
        <div class="w-75">
            <form action="/admin/staff/store" method="POST">
                <div class="form-group">
                    <label for="title">Nom</label>
                    <input type="text" id="lastname" name="lastname" class="form-control" value="<?= $old->lastname ?? '' ?>">
                    <?php if(isset($errors['lastname'])): ?>
                        <?php foreach($errors['lastname'] as $error): ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="title">Prénom</label>
                    <input type="text" id="firstname" name="firstname" class="form-control" value="<?= $old->firstname ?? '' ?>">
                    <?php if(isset($errors['firstname'])): ?>
                        <?php foreach($errors['firstname'] as $error): ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="title">Date de naissance</label>
                    <input type="date" id="birthdate" name="birthdate" class="form-control" value="<?= $old->birthdate ?? '' ?>">
                    <?php if(isset($errors['birthdate'])): ?>
                        <?php foreach($errors['birthdate'] as $error): ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="title">Lieu de naissance</label>
                    <input type="text" id="birthplace" name="birthplace" class="form-control" value="<?= $old->birthplace ?? '' ?>">
                    <?php if(isset($errors['birthplace'])): ?>
                        <?php foreach($errors['birthplace'] as $error): ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="title">Nationalité</label>
                    <input type="text" id="nationality" name="nationality" class="form-control" value="<?= $old->nationality ?? '' ?>">
                    <?php if(isset($errors['nationality'])): ?>
                        <?php foreach($errors['nationality'] as $error): ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="jobs">Métiers</label>
                    <select multiple name="jobs[]" id="jobs" class="form-control">
                        <option value="0">Sélectionner...</option>
                        <?php foreach($jobs as $job): ?>
                            <option value="<?= $job->id ?>"><?= $job->name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if(isset($errors['jobs'])): ?>
                        <?php foreach($errors['jobs'] as $error): ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="title">Biographie</label>
                    <input type="text" id="biography" name="biography" class="form-control" value="<?= $old->biography ?? '' ?>">
                    <?php if(isset($errors['biography'])): ?>
                        <?php foreach($errors['biography'] as $error): ?>
                            <div class="text-danger"><?= $error; ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
</div>
