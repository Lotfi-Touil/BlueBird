<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <?php $this->partial('back/topbar'); ?>
        <div class="container-fluid">
            <div class="bg-white">
                <div class="d-flex justify-content-between align-items-center p-3">
                    <h4 class="h4 font-weight-bold text-primary">Staffs</h4>
                    <a href="/admin/staff/create" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i>
                        <span class="d-none d-sm-inline-block">Créer un nouveau staff</span>
                    </a>
                </div>
                <div class="table-responsive">
                    <?php if ($staffs) : ?>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th class="d-table-cell">ID</th>
                                    <th class="d-none d-sm-table-cell">Nom</th>
                                    <th class="d-none d-sm-table-cell">Date de naissance</th>
                                    <th class="d-none d-sm-table-cell">Lieu de naissance</th>
                                    <th class="d-none d-sm-table-cell">Nationalité</th>
                                    <th class="d-none d-sm-table-cell">Date de création</th>
                                    <th class="d-table-cell">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($staffs as $staff): ?>
                                <tr>
                                    <td class="d-table-cell"><?= $staff->id ?></td>
                                    <td class="d-none d-sm-table-cell"><?= $staff->firstname . ' ' . $staff->lastname ?></td>
                                    <td class="d-none d-sm-table-cell"><?= date('d/m/Y', strtotime($staff->birthdate)) ?></td>
                                    <td class="d-none d-sm-table-cell"><?= $staff->birthplace ?></td>
                                    <td class="d-none d-sm-table-cell"><?= $staff->nationality ?></td>
                                    <td class="d-none d-sm-table-cell"><?= date('d/m/Y', strtotime($staff->created_at)) ?></td>
                                    <td class="d-table-cell">
                                        <!-- Boutons d'action -->
                                        <a href="/admin/staff/show/<?= $staff->id ?>" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i></a>
                                        <a href="/admin/staff/edit/<?= $staff->id ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        <a href="/admin/staff/delete/<?= $staff->id ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
