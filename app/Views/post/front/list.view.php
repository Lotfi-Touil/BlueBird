<section>
    <h1>Liste des Posts</h1>
    <nav class="mt-4">
        <ul class="list-unstyled">
            <?php foreach ($posts as $post) :?>
                <li class="border-bottom">
                    <a href="/post/<?= $post->id?>" class="d-flex flex-column pl-3 py-3 px-lg-4 align-items-lg-center justify-content-lg-between flex-lg-row">
                        <div class="mb-2 mb-lg-auto">
                            <img class="img-fluid rounded-circle mr-4" src="https://source.unsplash.com/featured/50x50" alt="">
                            <span><?= $post->title ?></span>
                        </div>
                        <?php $date = new DateTime($post->created_at);?>
                        <span>Posté le : <?= $date->format('d/m/Y');?></span>
                    </a>
                </li>
            <?php endforeach;?>
        </ul>
    </nav>
</section>
