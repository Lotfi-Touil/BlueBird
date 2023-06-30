<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <?php $this->partial('back/topbar'); ?>
        <div class="container-fluid">
            <div class="bg-white">
                <div class="d-flex justify-content-between align-items-center p-3">
                    <h4 class="h4 font-weight-bold text-primary">Maisons de production</h4>
                    <a href="/admin/productor/create" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i>
                        <span class="d-none d-sm-inline-block">Créer une nouvelle maison de production</span>
                    </a>
                </div>
                <div class="table-responsive">
                    <?php if ($productors) : ?>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th class="d-table-cell">ID</th>
                                    <th class="d-none d-sm-table-cell">Nom</th>
                                    <th class="d-none d-sm-table-cell">description</th>
                                    <th class="d-table-cell">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($productors as $productor): ?>
                                <tr>
                                    <td class="d-table-cell"><?= $productor->id ?></td>
                                    <td class="d-none d-sm-table-cell"><?= $productor->name ?></td>
                                    <td class="d-none d-sm-table-cell"><?= $productor->description ?></td>
                                    <td class="d-table-cell">
                                        <!-- Boutons d'action -->
                                        <a href="/admin/productor/show/<?= $productor->id ?>" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i></a>
                                        <a href="/admin/productor/edit/<?= $productor->id ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        <a href="/admin/productor/delete/<?= $productor->id ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php $this->partial('back/footer'); ?>
</div>
