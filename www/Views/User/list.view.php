<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <?php $this->partial('back/topbar'); ?>
        <div class="container-fluid">
            <?php if ($rowsUser) : ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rowsUser as $user) : ?>
                        <tr>
                            <td><?= $user['firstname'] ?></td>
                            <td><?= $user['lastname'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['status'] ? 'Actif': 'Inactif' ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </div>
    <?php $this->partial('back/footer'); ?>
</div>