<div class="card border-dark mb-3">
<?php if ($post == true): ?>
  <div class="card-header">Ecrit par <?= htmlspecialchars($post['user']); ?>, le <?= $post['date'] ?></div>
  <div class="card-body">
    <h3 class="card-title"><?= htmlspecialchars($post['title']); ?></h3>
    <p class="card-text"><?= nl2br(htmlspecialchars($post['content'])); ?></p>
  </div>
  <?php endif; ?>
</div>
<div>
  <?php if (isset($comments)): ?>
    <h5>Commentaires : </h5>
      <?php foreach ($comments as $comment): ?>
        <div class="d-flex justify-content-between">
          <p><?= $comment['author'] ?></p>
          <p><?= $comment['content'] ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
<div>
  <form action="index.php?page=comment.post" method="POST">
    <fieldset>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Your name</label>
      <input type="text" name="author" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter name">
      <small id="" class="text-danger form-text">
        <?= isset($datas['name']) ? $datas['name'] : ''; ?>
      </small>
    </div>
      <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
      <textarea name="comment_content" id="" cols="30" rows="10" placeholder="Commenter"></textarea>
      <p>
        <input class="btn btn-success" type="submit" name="submit_comment" value="Envoyer">
      </p>
    </fieldset>
  </form>
</div>
<div class="d-flex justify-content-end">
  <p class="btn btn-info"><a href="?page=post.home">Retour</a></p>
</div>