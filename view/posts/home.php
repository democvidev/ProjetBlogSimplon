<div class="row">
    <?php foreach ($posts as $post): ?>
        <div class="col-3">
            <div class="card border-dark mb-3" style="max-width: 20rem;">
            <div class="card-header"><?= htmlspecialchars(
                $post['user']
            ) ?>, le <?= $post['date'] ?></div>
            <div class="card-body">
                <h4 class="card-title"><?= htmlspecialchars(
                    $post['art_title']
                ) ?></h4>
                <p class="card-text"><?= nl2br(
                    htmlspecialchars($post['description'])
                ) . '...' ?></p>
                <p class="d-flex justify-content-between">
                    <a href="?page=post.show&amp;id=<?= $post[
                        'id'
                    ] ?>">Voir plus ...</a>
                    <a href="?page=post.delete&amp;id=<?= $post[
                        'id'
                    ] ?>">Supprimer</a>
                </p>                
            </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
