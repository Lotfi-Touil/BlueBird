<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <?php $this->partial('back/topbar'); ?>
        <div class="container-fluid">
            <?php if ($messages) : ?>
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between align-items-md-center">
                            <div>
                                <h4 class="mb-3"><strong>Object : </strong><?= $messages->getObject() ?></h4>
                                <p class="mb-3"><strong>De : </strong><?= $messages->getFirstname() ?> <?= $messages->getLastname() ?></p>
                                <p class="mb-3"><strong> avec l'email : </strong> <?= $messages->getEmail() ?> </p>
                                <p class="mb-3"><strong>Message envoyé le : </strong><?= date('d/m/Y', strtotime($messages->getCreatedAt())) ?></p>
                                <p class="mb-0"><strong>Corps du Message : </strong><?= $messages->getMessage() ?></p>
                                <p class="mb-0"><strong>Catégorie : </strong><?= $messages->getCategorie() ?></p>

                            </div>
                        </div>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
    <?php $this->partial('back/footer'); ?>
</div>