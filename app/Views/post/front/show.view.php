<section>
    <a href="/post/list" class="btn btn-primary mb-4">
        <span class="icon text-white-50">
            <i class="fa fa-arrow-left"></i>
        </span>
        <span class="text">Revenir à la liste des posts</span>
    </a>
    <h1 class="mb-4"><?= $post->getTitle()?></h1>
    <?php $date = new DateTime($post->getCreatedAt());?>
    <div class="text-muted fst-italic mb-4">
        <img class="img-fluid rounded-circle" src="https://source.unsplash.com/featured/50x50" alt="" >
        <span class="ml-2">Posté le <?= $date->format('d F Y');?> par BlueBird</span>
    </div>
    <figure id="post-cover" class="mb-4">
        <img class="img-fluid rounded" id="post-image" src="https://source.unsplash.com/featured/1200x400" alt="...">
    </figure>
    <div class="text-justify lh-lg">
        <h2 class="mb-4">Lorem ipsum dolor sit amet</h2>
        <?= $post->getContent();?>
    </div>
</section>
