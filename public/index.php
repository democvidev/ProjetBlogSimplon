<?php

// remonte d'un cran dans le dossier parent
$path = dirname(__DIR__);

require $path . '/model/postsRepository.php';

ob_start(); // buferiser le contenu de la page

try {
    // redirection sur la home page
    $page = isset($_GET['page']) ? $_GET['page'] : 'post.home';

    if ($page === 'post.home') {
        $posts = showAllPosts();        
        require $path . '/view/posts/home.php';
    } elseif ($page === 'post.show') {
        $post = findOneById($_GET['id']);
        require $path . '/view/posts/show.php';
    } elseif ($page === 'user.connect') {
        require $path . '/view/users/connectionForm.php';
    } else {
        throw new Exception('404');
    }
} catch (Exception $e) {
    require $path . '/view/errors/error' . $e->getMessage() . '.php';
}

$content = ob_get_clean();

require $path . '/view/base.php';
