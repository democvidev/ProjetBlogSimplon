<?php

// remonte d'un cran dans le dossier parent
$path = dirname(__DIR__);

require $path . '/controller/postsController.php';
require $path . '/controller/usersController.php';
require $path . '/controller/errorsController.php';

try {
    // redirection sur la home page
    $page = isset($_GET['page']) ? $_GET['page'] : 'post.home';

    if ($page === 'post.home') {
        home();        
    } elseif ($page === 'post.show') {
        show();
    } elseif ($page === 'user.connect') {
        connect();
    } else {
        throw new Exception('404');
    }
} catch (Exception $e) {
    showErrors($e->getMessage());
}
