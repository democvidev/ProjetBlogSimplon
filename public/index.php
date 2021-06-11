<?php

// remonte d'un cran dans le dossier parent
$path = dirname(__DIR__);


try {
    // redirection sur la home page
    $page = isset($_GET['page']) ? $_GET['page'] : 'post.home';

    if ($page === 'post.home') {
        require $path . '/controller/postsController.php';
        home();
    } elseif ($page === 'post.show') {
        require $path . '/controller/postsController.php';
        show();        
    } elseif ($page === 'post.delete') {
        require $path . '/controller/postsController.php';
        delete();
    } elseif ($page === 'user.connect') {
        require $path . '/controller/usersController.php';
        connect();
    } else {
        throw new Exception('404');
    }
} catch (Exception $e) {
    require $path . '/controller/errorsController.php';
    showErrors($e->getMessage());
}
