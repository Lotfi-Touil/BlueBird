<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <?php $this->partial('back/topbar'); ?>
        <div class="container-fluid">
            <?php if ($message) : ?>
                <ul class="list-group">
                    <?php foreach ($message as $messages) : ?>
                        <li class="list-group-item">
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                                <div class="mb-4 mb-md-0" style="min-width: 240px">
                                    <p class="mb-0">
                                        <strong>Objet: </strong><?= $messages->object ?>
                                    </p>
                                    <p class="mb-0">
                                        <strong>De: </strong><?= $messages->firstname ?>
                                    </p>
                                    <p class="mb-0">
                                        <strong>Message envoyé le: </strong><?= date('d/m/Y', strtotime($messages->created_at)) ?>
                                    </p>
                                </div>
                                <div class="message-preview mb-4 mb-md-0 ml-md-5 mr-md-auto">
                                    <p class="mb-0"><strong>Corps du message :</strong></p>
                                    <p class="mb-0 truncated-message"><?= $messages->message ?></p>
                                    <p class="mb-0 truncated-message-og" hidden><?= $messages->message ?></p>
                                </div>
                                <a href="/admin/message/show/<?= $messages->id ?>" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i></a>

                                <a class="btn btn-primary" style="min-width: 130px" href="/admin/message/detail/<?= $messages->id ?>">Voir les détails</a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
    <?php $this->partial('back/footer'); ?>
</div>

<script>
    function truncateMessage(element, ogMessage, maxLength) {
        if (element.textContent.length > maxLength) {
            element.textContent = element.textContent.substring(0, maxLength) + '...';
        } else {
            element.textContent = ogMessage.textContent.substring(0, maxLength) + '...';
        }
    }

    function handleResize(truncatedMessages, ogMessages) {
        const maxWidth = window.innerWidth <= 1180 ? 30 : 48;

        truncatedMessages.forEach((truncatedMessage, key) => {
            truncateMessage(truncatedMessage, ogMessages[key], maxWidth);
        });
    }

    window.addEventListener('DOMContentLoaded', () => {
        const truncatedMessages = document.querySelectorAll('.truncated-message');
        const ogMessages = document.querySelectorAll('.truncated-message-og');
        handleResize(truncatedMessages, ogMessages);
    });

    window.addEventListener('resize', () => {
        const truncatedMessages = document.querySelectorAll('.truncated-message');
        const ogMessages = document.querySelectorAll('.truncated-message-og');
        handleResize(truncatedMessages, ogMessages);
    });
</script>