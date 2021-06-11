<div class="alert alert-dismissible alert-warning">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <h4 class="alert-heading">Erreur 404</h4>
  <p class="mb-0"><?= isset($error) ? ($error === '404' ? 'Cette page n\'a pas été trouvé !' : $error) : ''; ?></p>
</div>