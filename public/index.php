<?php

// remonte d'un cran dans le dossier parent
$path = dirname(__DIR__);

require $path . '/controller/postsController.php';

try {
    // redirection sur la home page
    $page = isset($_GET['page']) ? $_GET['page'] : 'post.home';

    if ($page === 'post.home') {
        home();        
    } elseif ($page === 'post.show') {
        show();
    } elseif ($page === 'user.connect') {
        require $path . '/view/users/connectionForm.php';
    } else {
        throw new Exception('404');
    }
} catch (Exception $e) {
    require $path . '/view/errors/error' . $e->getMessage() . '.php';
}
