<div class="card w-100 mb-3">
    <div class="card-header d-flex">
        <h4 class="card-title">Détails du staff #<?= $staff->getId() ?></h4>
        <a href="/admin/post/list" class="btn btn-primary ml-auto">
            <span class="icon text-white-50">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">Revenir à la liste</span>
        </a>
    </div>
    <div class="container mt-5">
        <div class="w-75">
            <form>
                <div class="form-group">
                    <label for="lastname">Nom</label>
                    <input type="text" id="lastname" name="lastname" class="form-control" value="<?= $staff->getLastname() ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="firstname">Prénom</label>
                    <input type="text" id="firstname" name="firstname" class="form-control" value="<?= $staff->getFirstname() ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="birthdate">Date de naissance</label>
                    <input type="text" id="birthdate" name="birthdate" class="form-control" value="<?= $staff->getBirthdate() ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="birthplace">Lieu de naissance</label>
                    <input type="text" id="birthplace" name="birthplace" class="form-control" value="<?= $staff->getBirthplace() ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nationality">Nationalité</label>
                    <input type="text" id="nationality" name="nationality" class="form-control" value="<?= $staff->getNationality() ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="jobs">Métiers</label>
                    <select multiple name="jobs[]" id="jobs" class="form-control" readonly>
                        <?php foreach($jobs as $job): ?>
                            <?php if (in_array($job->id, $staffJobs)): ?>
                                <option value="<?= $job->id ?>"><?= $job->name ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Biographie</label>
                    <input type="text" id="biography" name="biography" class="form-control" value="<?= $staff->getBiography() ?>" readonly>
                </div>
            </form>
        </div>
    </div>
</div>
