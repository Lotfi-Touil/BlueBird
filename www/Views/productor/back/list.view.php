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
                        Créer une nouvelle maison de production
                    </a>
                </div>
                <?php if ($productors) : ?>
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productors as $productor): ?>
                                <?php 
                                    $description = $productor->description; 
                                    $words = preg_split('/\s+/', $description);
                                    $showDescription = implode(" ", array_slice($words, 0, 10)); 
                                ?>
                            <tr>
                                <td><?= $productor->id ?></td>
                                <td><?= $productor->name ?></td>
                                <td><?= !empty($showDescription) ? $showDescription.' ...' : ' ' ?></td>
                                <td>
                                    <!-- Boutons d'action -->
                                    <a href="/admin/productor/show/<?= $productor->id?>" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i></a>
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
    <?php $this->partial('back/footer'); ?>
</div>
