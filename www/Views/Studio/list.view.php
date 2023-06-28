<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <?php $this->partial('back/topbar'); ?>
        <div class="container-fluid mb-4">
            <div class="row flex-column flex-md-row gap-4 gap-md-0 justify-content-end">
                <div class="col-xs-12 col-md-6 d-flex justify-content-end">
                    <button class="btn btn-primary col-12 col-md-6" data-toggle="modal" data-target="#addStudio">
                        <i class="fa fa-plus fa-sm"></i>
                        <span>Ajouter un studio</span>
                    </button>
                </div>
            </div>
        </div>
            
        <div class="container-fluid">
            <?php if ($rowsStudio) : ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th class="d-flex ">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rowsStudio as $studio) : ?>
                            <tr data-studio="<?= $studio['name'] ?>">
                                <td><?= $studio['id'] ?></td>
                                <td><?= $studio['name'] ?></td>
                                <td>
                                    <div class="btn-group rounded" role="group" aria-label="actions">
                                        <a href="#" class="btn btn-secondary" title="Voir le studio : <?= $studio['name'] ?>">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-primary"  title="Modifier le studio : <?= $studio['name'] ?>">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger"  title="Supprimer le studio : <?= $studio['name'] ?>">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
    <?php $this->partial('back/footer'); ?>
</div>