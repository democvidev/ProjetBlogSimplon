<?php

// remonte d'un cran dans le dossier parent
$path = dirname(__DIR__);

ob_start(); // buferiser le contenu de la page

try {
    // redirection sur la home page
    $page = isset($_GET['page']) ? $_GET['page'] : 'post.home';

    if ($page === 'post.home') {
        require $path . '/view/posts/home.php';
    } elseif ($page === 'post.show') {
        require $path . '/view/posts/show.php';
    } elseif ($page === 'user.connect') {
        require $path . '/view/users/connectionForm.php';
    } else {
        throw new Exception('404');
    }
} catch (Exception $e) {
    require 'view/errors/error' . $e->getMessage() . '.php';
}

$content = ob_get_clean();

require $path . '/view/base.php';
