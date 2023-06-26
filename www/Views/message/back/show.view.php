<div class="card w-100 mb-3">
    <div class="card-header d-flex">
        <h4 class="card-title">Modifier le Message #<?= $message->getId() ?></h4>
        <a href="/admin/message/show" class="btn btn-primary ml-auto">
            <span class="icon text-white-50">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">Revenir à la liste</span>
        </a>
    </div>
    <div class="container mt-5">
        <div class="w-75" disable>
            <?= $this->partial('form', $form, []) ?>
        </div>
    </div>
</div>