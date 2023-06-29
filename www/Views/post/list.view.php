<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <?php $this->partial('back/topbar'); ?>
        <div class="container-fluid">
            <div class="bg-white">
                <div class="d-flex justify-content-between align-items-center p-3">
                    <h4 class="h4 font-weight-bold text-primary">Articles</h4>
                    <a href="/admin/post/create" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i>
                        Créer un nouvel article
                    </a>
                </div>
                <?php if ($posts) : ?>
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Titre</th>
                                <th>Contenu</th>
                                <th>Date de création</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($posts as $post): ?>
                            <tr>
                                <td><?= $post->id ?></td>
                                <td><?= $post->title ?></td>
                                <td><?= $post->content ?></td>
                                <td><?= date('Y-m-d H:i:s', strtotime($post->created_at)) ?></td>
                                <td>
                                    <!-- Boutons d'action -->
                                    <a href="#" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i></a>
                                    <a href="/admin/post/edit/<?= $post->id ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="/admin/post/delete/<?= $post->id ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
