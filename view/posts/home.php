<div class="row">
    <?php foreach ($posts as $post): ?>
        <div class="col-3">
            <div class="card border-dark mb-3" style="max-width: 20rem;">
            <div class="card-header"><?= $post['user'] ?>, le <?= $post['date'] ?></div>
            <div class="card-body">
                <h4 class="card-title"><?= $post['title'] ?></h4>
                <p class="card-text"><?= $post['content'] . '...'?></p>
                <p><a href="?page=post.show&amp;id=<?= $post['id'] ?>">Voir plus ...</a></p>
            </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
