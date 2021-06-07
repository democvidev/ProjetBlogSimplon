<div class="card border-dark mb-3">
<?php if($post == true): ?>
  <div class="card-header">Ecrit par <?= htmlspecialchars($post['user']); ?>, le <?= $post['date'] ?></div>
  <div class="card-body">
    <h4 class="card-title"><?= htmlspecialchars($post['title']); ?></h4>
    <p class="card-text"><?= nl2br(htmlspecialchars($post['content'])); ?></p>
  </div>
  <?php endif; ?>
</div>
<p><a href="?page=post.home">Retour</a></p>